<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class rt_GSyncController extends SugarController {
	public function __construct() {

		parent::SugarController();

	}
	function process(){
		if($this->action!="savesettings" && $this->action!="activateSchedulers" && $this->action!="configureUsers"&& $this->action!="saveUsers"){
			$this->action="settings";
			$this->do_action="settings";
		}
		parent::process();
	}
	function action_savesettings(){
		if(isset($_POST['data']) && !empty($_POST['data'])){
			$rt_GSync = new rt_GSync();
			$rt_GSync->retrieve($GLOBALS['current_user']->id);
			if($rt_GSync->id){
				$rt_GSync->date_modified=$GLOBALS['timedate']->get_gmt_db_datetime();
				$rt_GSync->assigned_user_id=$GLOBALS['current_user']->id?$GLOBALS['current_user']->id:'1';
				$rt_GSync->modified_user_id=$GLOBALS['current_user']->id?$GLOBALS['current_user']->id:'1';
				$rt_GSync->prefrences=base64_encode($_POST['data']);
				if($rt_GSync->save(false)){
					echo "1";
				}else{
					echo "0";
				}
			}else{
				$rt_GSync->id=$GLOBALS['current_user']->id?$GLOBALS['current_user']->id:'1';
				$rt_GSync->new_with_id=1;
				$rt_GSync->date_modified=$GLOBALS['timedate']->get_gmt_db_datetime();
				$rt_GSync->date_entered=$GLOBALS['timedate']->get_gmt_db_datetime();
				$rt_GSync->assigned_user_id=$GLOBALS['current_user']->id?$GLOBALS['current_user']->id:'1';
				$rt_GSync->modified_user_id=$GLOBALS['current_user']->id?$GLOBALS['current_user']->id:'1';
				$rt_GSync->prefrences=base64_encode($_POST['data']);
				if($rt_GSync->save(false)){
					echo "1";
				}else{
					echo "0";
				}
			}
			
		}else{
			return "0";
		}
	}
	function action_activateSchedulers(){
		if(isset($_POST['data']) && !empty($_POST['data']) && is_admin($GLOBALS['current_user'])){
			$data=getJSONobj()->decode(html_entity_decode($_POST['data']));
			$scheduler = BeanFactory::getBean('Schedulers');
			$scheduler->retrieve_by_string_fields(array('job' => "function::".$data['name'],'deleted' => '0' ));
			if(!empty($scheduler->id)){
				$scheduler->status = $data['status'];
				if($scheduler->save(false)){
					echo "1";
				}else{
					echo "0";
				}
			}else{
				echo "0";
			}
			
			
		}else{
			echo "0";
		}
	}
	function action_saveUsers(){
        
	    if (!is_admin($GLOBALS['current_user'])) {
	        sugar_die("Unauthorized access to administration.");
        }
		$enabled = html_entity_decode(rtrim(ltrim ($_POST['enabled_tabs'],'['),']'));
		//for sql server
        $enabled=str_replace('"', "'", $enabled);
		$disabled = html_entity_decode(rtrim(ltrim ($_POST['disabled_tabs'],'['),']'));
		//for sql server
        $disabled=str_replace('"', "'", $disabled);
		$update_enabled_users_query="";
		$update_disabled_users_query="";
		if(!empty($enabled)){
			$update_enabled_users_query="UPDATE users SET enable_gsync=1 WHERE id IN ($enabled)";
		}
		if(!empty($disabled)){
			$update_disabled_users_query="UPDATE users SET enable_gsync=0 WHERE id IN ($disabled)";
		}
		if(!empty($update_enabled_users_query)){
			$GLOBALS['db']->query($update_enabled_users_query);
		}
		if(!empty($update_disabled_users_query)){
			$GLOBALS['db']->query($update_disabled_users_query);
		}
		SugarApplication::redirect("index.php?module=rt_GSync&action=configureUsers");
	}
	function action_configureUsers(){
		$this->view="configureusers";
	}
}
?>
