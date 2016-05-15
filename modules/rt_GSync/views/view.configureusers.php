<?php
if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
require_once("modules/Administration/Administration.php");

class ViewConfigureusers extends SugarView
{
    public function preDisplay()
    {
        global $current_user;
        global $sugar_config;
        if (!is_admin($current_user)) {
            sugar_die("Unauthorized access to administration.");
        }
		if(!$this->check_column_if_exist($sugar_config['dbconfig']['db_name'],"users","enable_gsync")){
			sugar_die("Do <a href='index.php?module=Administration&action=Upgrade' target='_blank'><span class='error' >Quick Repair and Rebuild </span></a>first and then <a href='index.php?module=rt_GSync&action=configureUsers'>refresh</a> this page");
		}
    }
    public function display()
    {
		require_once('custom/modules/Schedulers/license/config.php');
        global $mod_strings;
        global $app_list_strings;
        global $app_strings;
        global $sugar_config;
		$admin = new Administration();
        $admin->retrieveSettings();
        if (isset($admin->settings[$outfitters_config['shortname'].'_licensed_user_count']) 
		&& !empty($admin->settings[$outfitters_config['shortname'].'_licensed_user_count']) && isset($sugar_config['outfitters_licenses']) && isset($sugar_config['outfitters_licenses'][$outfitters_config['shortname']])) {
            $this->ss->assign('licensed_users', $admin->settings[$outfitters_config['shortname'].'_licensed_user_count']);
            $this->ss->assign('license_key', $sugar_config['outfitters_licenses'][$outfitters_config['shortname']]);
        } else {
            $this->ss->assign('licensed_users', 'unlimited');
			sugar_die("Do <a href='index.php?module=Schedulers&action=license' target='_blank'><span class='error' >Validate </span></a>first and then <a href='index.php?module=rt_GSync&action=configureUsers'>refresh</a> this page");
        }
        $this->ss->assign('APP', $GLOBALS['app_strings']);
        $this->ss->assign('MOD', $GLOBALS['mod_strings']);
        $this->ss->assign('title', $mod_strings['LBL_MODULE_NAME'] . " - Configure users");
		
        $enabled_active_users = get_user_array(FALSE, 'Active', '', false, '', " AND is_group=0 AND enable_gsync=1");
        $enabled              = array();
        foreach ($enabled_active_users as $userID => $Name) {
            $enabled[] = array(
                "user" => "" . $userID,
                "label" => $Name
            );
        }
        $disabled_active_users = get_user_array(FALSE, 'Active', '', false, '', " AND is_group=0 AND (enable_gsync!=1 OR enable_gsync is Null)");
        $disabled              = array();
        foreach ($disabled_active_users as $userID => $Name) {
            $disabled[] = array(
                "user" => "" . $userID,
                "label" => $Name
            );
        }
        $this->ss->assign('enabled_users', json_encode($enabled));
        $this->ss->assign('disabled_users', json_encode($disabled));
        
        if (isset($_REQUEST['sync_stopped'])) {
            $this->ss->assign('SYNC_STOPPED', true);
        }
		$this->ss->assign("ENABLE_USERS_COUNT",count($enabled));
		$this->ss->assign('USERS_LIMIT_EXCEEDED', "You have exceeded your user limit allowed by license .Please boost user count or remove some users from GSync enabled users section");
        echo $this->ss->fetch('modules/rt_GSync/tpls/ConfigureUsers.tpl');
    }
	private function check_column_if_exist($db_name,$table, $column){
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
