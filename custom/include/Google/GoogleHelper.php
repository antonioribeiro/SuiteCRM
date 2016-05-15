<?php
require_once("custom/include/Google/CalendarHelper.php");
require_once("custom/include/Google/ContactHelper.php");
require_once("Zend/Gdata/ClientLogin.php");
if (sugar_is_file('custom/include/Google/google-api-php-client/src/Google_Client.php')) {
	require_once 'custom/include/Google/google-api-php-client/src/Google_Client.php';
	require_once 'custom/include/Google/google-api-php-client/src/contrib/Google_CalendarService.php';
	require_once 'custom/include/Google/google-api-php-client/src/contrib/Google_DriveService.php';
	require_once 'custom/include/Google/DriveHelper.php';
	require_once 'custom/include/Google/lib/GoogleOauthHandler.php';
}
class GoogleHelper
{
    var $calendar_client;
    var $docs_client;
    var $contact_client;
    var $userID;
    var $user_email;
    var $google_client;
    var $auth_handler;
    var $drive_service;
    var $prefrences;
    function performSync($user = '', $pass = '', $id = '', $lastSync, $syncType = "calendar")
    {
        $this->userID     = $id;
        $this->user_email = $user;
        switch ($syncType) {
            case "calendar":
                    $this->init_sync();
					$this->syncCalendar($lastSync);
                break;
			case "calendarRecurring":
				// TODO
                // $this->calendar_client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, Zend_Gdata_Calendar::AUTH_SERVICE_NAME)->setConfig(array(
                    // "timeout" => 100
                // ));
                // $this->syncCalendarRecurring(date());//pass date object
                break;
            case "contacts":
                //$this->contact_client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, 'cp');
            $this->init_sync();
                $this->syncContacts($lastSync);
                break;
            case "drive":
                $this->init_sync();
                $this->syncGdrive($lastSync);
                break;
            default:
                $GLOBALS['log']->fatal('$syncType is required');
                break;
        }
    }
    function syncCalendar($lastSync)
    {
		$current_date = date($GLOBALS['timedate']->get_db_date_time_format());
		$dateAdded    = strtotime(date($GLOBALS['timedate']->get_db_date_time_format(), strtotime($current_date)) . "+03 seconds");
		$last_synch   = gmdate($GLOBALS['timedate']->get_db_date_time_format(), $dateAdded);
		
        $GLOBALS['log']->fatal('GOOGLE-TO-SUGAR');
		$jsonCredentials = $this->auth_handler->getStoredCredentials($this->userID);
        if ($jsonCredentials) {
            $oauthCredentials = $this->auth_handler->getOauth2Credentials($jsonCredentials);
            $this->google_client->setAccessToken($oauthCredentials->toJson());
            if ($this->google_client->getAccessToken()) {
                $this->calendar_client = new Google_CalendarService($this->google_client);
				$this->google_client->setUseObjects(true);
                $ids = array();
                $ids = CalendarHelper::updateFromGoogle($this->calendar_client, $this->userID, $this->user_email, $lastSync,false,$this->prefrences);
                
                $GLOBALS['log']->fatal('SUGAR-TO-GOOGLE');
				$beans = CalendarHelper::retrieveUpdatedFromSugar($this->calendar_client, $this->userID, $lastSync, $ids,$this->prefrences);
				CalendarHelper::sendUpdatedToGoogle($this->calendar_client, $beans, $this->userID);
				
				//last sync date saving to db
				$sql_update   = "UPDATE users set lastsync_calendar='" . $last_synch . "' WHERE id='" . $this->userID . "'";
				$res_update   = $GLOBALS['db']->query($sql_update);
            } else {
                $GLOBALS['log']->fatal("error occured while getting access token for userID: " . $this->userID);
            }
        } else {
            $GLOBALS['log']->fatal("No google auth credentials saved for userID : " . $this->userID);
			//die();
        }
    }
	function syncCalendarRecurring($lastSync)
    {
		$GLOBALS['log']->fatal('GOOGLE-TO-SUGAR: recurring events');
		$ids   = CalendarHelper::updateFromGoogle($this->calendar_client, $this->userID, $this->user_email, $lastSync,true);
    }
    function cleanCalendarSync()
    {
        $date_modified = gmdate($GLOBALS['timedate']->get_db_date_time_format());
        CalendarHelper::cleanCalendarSync($this->calendar_client, $this->userID, $date_modified);
    }
     function syncContacts($lastSync)
    {
            $jsonCredentials = $this->auth_handler->getStoredCredentials($this->userID);
        if ($jsonCredentials) {
            $oauthCredentials = $this->auth_handler->getOauth2Credentials($jsonCredentials);
            $this->google_client->setAccessToken($oauthCredentials->toJson());
            if ($this->google_client->getAccessToken()) {
                 $ids = array();
        if ($this->prefrences["schedulers"]["contacts_google_to_sugar"] === true) {
            $GLOBALS['log']->fatal('GOOGLE-TO-SUGAR');
            $ids = ContactHelper::updateFromGoogle($this->google_client, $this->userID, $lastSync,$this->user_email);
        }
         if ($this->prefrences["schedulers"]["contacts_sugar_to_google"] === true) {
            $GLOBALS['log']->fatal('SUGAR-TO-GOOGLE');
            $beans = ContactHelper::retrieveUpdatedFromSugar($this->google_client,$this->userID, $lastSync, $ids,$this->user_email);
            ContactHelper::sendUpdatedToGoogle($beans, $this->user_email,$this->google_client);
        }
            }
        }
        else
        {
            $GLOBALS['log']->fatal("Please Resave Gmail id and Password.");
        }
       
    }
    
    function init_sync()
    {
        global $sugar_config;
        $this->google_client = new Google_Client();
        $this->auth_handler  = new GoogleOauthHandler();
        $this->google_client->setClientId($sugar_config['GOOGLE']['CLIENT_ID']);
        $this->google_client->setClientSecret($sugar_config['GOOGLE']['CLIENT_SECRET']);
        $this->google_client->setRedirectUri($sugar_config['GOOGLE']['REDIRECT_URI']);
        $this->google_client->setScopes($sugar_config['GOOGLE']['SCOPES']);
    }
    function syncGdrive($lastSync)
    {
        $jsonCredentials = $this->auth_handler->getStoredCredentials($this->userID);
        if ($jsonCredentials) {
            $oauthCredentials = $this->auth_handler->getOauth2Credentials($jsonCredentials);
            $this->google_client->setAccessToken($oauthCredentials->toJson());
            if ($this->google_client->getAccessToken()) {
                $this->drive_service = new Google_DriveService($this->google_client);
                $this->google_client->setUseObjects(true);
                $ids = array();
                if ($this->prefrences["schedulers"]["documents_google_to_sugar"] === true) {
                    $GLOBALS['log']->fatal('GOOGLE-TO-SUGAR');
                    $ids = DriveHelper::updateFromGoogle($this->drive_service, $this->userID, $lastSync);
                }
                if ($this->prefrences["schedulers"]["documents_sugar_to_google"] === true) {
                    $GLOBALS['log']->fatal('SUGAR-TO-GOOGLE');
                    $beans = DriveHelper::retrieveUpdatedFromSugar($this->userID, $lastSync, $ids);
                    DriveHelper::sendUpdatedToGoogle($this->drive_service, $beans);
                }
            } else {
                $GLOBALS['log']->fatal("error occured while getting access token for userID: " . $this->userID);
            }
        } else {
            $GLOBALS['log']->fatal("No google auth credentials saved for userID : " . $this->userID);
        }
    }
    function cleanSync($user = '', $pass = '', $id = '')
    {
        set_time_limit(0);
        ini_set('memory_limit', '2048M'); //blacklist while package scan
        $this->userID     = $id;
        $this->user_email = $user;
        try {
            $GLOBALS['log']->fatal('Started: Clean Google Sync');
            $GLOBALS['log']->fatal('Initializing login process');
            $this->init_sync();
			$jsonCredentials = $this->auth_handler->getStoredCredentials($this->userID);
			if ($jsonCredentials) {
				$oauthCredentials = $this->auth_handler->getOauth2Credentials($jsonCredentials);
				$this->google_client->setAccessToken($oauthCredentials->toJson());
				if ($this->google_client->getAccessToken()) {
					$this->calendar_client = new Google_CalendarService($this->google_client);
					$this->google_client->setUseObjects(true);
				}
			}
        }
        catch (Exception $e) {
            $GLOBALS['log']->fatal($e->getMessage());
        }
        $GLOBALS['log']->fatal('Started: Clean Calendar Sync');
        $this->cleanCalendarSync();
        $GLOBALS['log']->fatal('Completed: Clean Google Sync');
    }
	public static function check_column_if_exist($db_name,$table, $column){
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
?>