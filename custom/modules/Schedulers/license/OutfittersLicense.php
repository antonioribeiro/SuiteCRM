<?php
require_once("modules/Administration/Administration.php");
require_once('modules/Configurator/Configurator.php');
class OutfittersLicense
{
    public static function validateModule()
    {
        global $sugar_config;
        //load license validation config
        require('custom/modules/Schedulers/license/config.php');
		$admin = new Administration();
        $admin->retrieveSettings();
		$frequency = $outfitters_config['validation_frequency'];
		$elapsed = (7 * 24 * 60 * 60); //default to weekly
		if($frequency == 'hourly') {
			$elapsed = (60 * 60);
		} else if($frequency == 'daily') {
			$elapsed = (24 * 60 * 60);
		}
        if (empty($_REQUEST['key'])) {
            if (isset($outfitters_config['shortname']) && isset($sugar_config['outfitters_licenses']) && isset($sugar_config['outfitters_licenses'][$outfitters_config['shortname']])) {
                $_REQUEST['key'] = $sugar_config['outfitters_licenses'][$outfitters_config['shortname']];
            }
        }
		//first day after validation
		$first_validation_date = $admin->settings[$outfitters_config['shortname'].'_first_validation_date'];
		if(isset($first_validation_date) && !empty($first_validation_date) && ($first_validation_date+$elapsed)>=time()){
			$GLOBALS['log']->debug('first_validation_date check');
			return true;
		}
        //added for frequency option 201-01-29JK
		$last_validation = $admin->settings['SugarOutfitters_'.$outfitters_config['shortname']];       
        $trimmed_last = trim($last_validation); //to be safe...
        //make sure serialized string is not empty
        if (!empty($trimmed_last)){
            $last_validation = base64_decode($last_validation);
            $last_validation = unserialize($last_validation);
            //if enough time hasn't passed then check from last result if success then return true else continue with validation
            
            if(($last_validation['last_ran'] + $elapsed) >= time()) {
                if($last_validation['last_result']['success'] === false) {
					$GLOBALS['log']->debug('validation done locally. false');
					return false;
                }else{
					$GLOBALS['log']->debug('validation done locally. true');
                    return true;
				}
            }
        }
		//continue with validation
        return OutfittersLicense::validate(false);
    }
    public static function validate($doOutput = true)
    {
        global $currentModule;
        global $sugar_config;
        if (empty($_REQUEST['key'])) {
            if ($doOutput) {
                header('HTTP/1.1 400 Bad Request');
                $response = "Key is required.";
                $json     = getJSONobj();
                echo $json->encode($response);
            }
            return false;
        }
		$admin = new Administration();
        $admin->retrieveSettings();
		$configurator = new Configurator();
        //load license validation config
        require('custom/modules/Schedulers/license/config.php');
        $post_fields = 'public_key=' . $outfitters_config['public_key'] . '&key=' . $_REQUEST['key'];
        if (isset($outfitters_config['validate_users']) && $outfitters_config['validate_users'] == true) {
			$active_users=array();
			if(OutfittersLicense::check_column_if_exist($sugar_config['dbconfig']['db_name'],"users","enable_gsync")){
				$active_users = get_user_array(FALSE, 'Active', '', false, '', ' AND is_group=0 AND enable_gsync=1');
			}
            $post_fields .= '&user_count=' . (count($active_users) < 1 ? 1 : count($active_users));
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $outfitters_config['api_url'] . '/key/validate?' . $post_fields);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $response = curl_exec($ch);
        $info     = curl_getinfo($ch);
        curl_close($ch);
        if (!$response && $info['http_code'] === 0) {
            if ($doOutput) {
                header('HTTP/1.1 400 Bad Request');
                $response = "Connection Problem.";
                $json     = getJSONobj();
                echo $json->encode($response);
            }
            return false;
        }
        if ($doOutput) {
			//setting first validation date.
			if(!isset($admin->settings[$outfitters_config['shortname'].'_first_validation_date'])){
				$admin->saveSetting($outfitters_config['shortname'],'first_validation_date',time());
			}
            echo $response;
        }
        //if it is not a 200 response assume a 400. Good enough for this purpose.
        if ($info['http_code'] != 200) {
            if ($doOutput) {
                header('HTTP/1.1 400 Bad Request');
            }
			//added for frequency option 2014-01-29JK
			$store = array(
				'last_ran' => time(),
				'last_result' => array(
					'success' => false,
                    'result' => $response
				),
			);
			$serialized = base64_encode(serialize($store));
			$admin->saveSetting('SugarOutfitters', $outfitters_config['shortname'], $serialized);
            return false;
        } else {
            require_once('modules/Administration/Administration.php');
            $config['outfitters_licenses'][$outfitters_config['shortname']] = $_REQUEST['key'];
            $configurator->config=array_merge($configurator->config, $config);
            $configurator->handleOverride();
            try {
                $response = json_decode($response, true);
            }
            catch (Exception $ex) {
            }
            if ($response && isset($response['licensed_user_count'])) {
                $admin->saveSetting($outfitters_config['shortname'], 'licensed_user_count', $response['licensed_user_count']);
            }
            if ($response && isset($response['validated_users'])) {
                $admin->saveSetting($outfitters_config['shortname'], 'validated_users', $response['validated_users']);
            }
			//added for frequency option 2014-01-29JK
			$store = array(
				'last_ran' => time(),
				'last_result' => array(
					'success' => true,
                    'result' => $response
				),
			);
			$serialized = base64_encode(serialize($store));
			$admin->saveSetting('SugarOutfitters', $outfitters_config['shortname'], $serialized);
			
            return true;
        }
    }
    public static function change()
    {
        if (empty($_REQUEST['key'])) {
            header('HTTP/1.1 400 Bad Request');
            $response = "Key is required.";
            $json     = getJSONobj();
            echo $json->encode($response);
        }
        if (empty($_REQUEST['user_count'])) {
            header('HTTP/1.1 400 Bad Request');
            $response = "User count is required.";
            $json     = getJSONobj();
            echo $json->encode($response);
        }
        global $currentModule;
        //load license validation config
        require('custom/modules/Schedulers/license/config.php');
        $post_fields = 'public_key=' . $outfitters_config['public_key'] . '&key=' . $_REQUEST['key'] . '&user_count=' . $_REQUEST['user_count'];
        $ch          = curl_init();
        curl_setopt($ch, CURLOPT_URL, $outfitters_config['api_url'] . '/key/change');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $response = curl_exec($ch);
        $info     = curl_getinfo($ch);
        curl_close($ch);
        //if it is not a 200 response assume a 400. Good enough for this purpose.
        if ($info['http_code'] != 200) {
            header('HTTP/1.1 400 Bad Request');
        } else {
            require_once('modules/Administration/Administration.php');
            $config['outfitters_licenses'][$outfitters_config['shortname']] = $_REQUEST['key'];
            $configurator                                                   = new Configurator();
            $configurator->config                                           = array_merge($configurator->config, $config);
            $configurator->handleOverride();
            //Setting date
            $admin = new Administration();
            $admin->retrieveSettings();
            //setting first validation date.
			$admin->saveSetting($outfitters_config['shortname'],'first_validation_date',time());
            try {
                $response1 = json_decode($response, true);
            }
            catch (Exception $ex) {
            }
            if ($response1 && isset($response1['licensed_user_count'])) {
                $admin->saveSetting($outfitters_config['shortname'], 'licensed_user_count', $response1['licensed_user_count']);
            }
            if ($response1 && isset($response1['validated_users'])) {
                $admin->saveSetting($outfitters_config['shortname'], 'validated_users', $response1['validated_users']);
            }
        }
        echo $response;
    }
	private static function check_column_if_exist($db_name,$table, $column){
		global $db;
        $cols =  $db->get_columns($table);
        if (is_array($cols))
        {
            if(isset($cols[$column])){
                    return true;
            }
            else
            {
                return false;
            }
        }
        else{
            return false;
        }
	}
}
