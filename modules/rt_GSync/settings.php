<?php

$ss = new Sugar_Smarty();
$rt_GSync = new rt_GSync();
$rt_GSync->retrieve($GLOBALS['current_user']->id);
$json = getJSONobj();
$prefrences=array();
if(!empty($rt_GSync->id) && !empty($rt_GSync->prefrences)){
	$prefrences=$json->decode(html_entity_decode(base64_decode($rt_GSync->prefrences)));
}
//default settings
if(!is_array($prefrences) || empty($prefrences)){
	$prefrences=
	array (
		"schedulers" => array (
			"calendar_google_to_sugar" => true,
			"calendar_sugar_to_google" => true,
			"contacts_google_to_sugar" => false,
			"contacts_sugar_to_google" => true,
			"documents_google_to_sugar" => true,
			"documents_sugar_to_google" => true,
		)
	);
}
if(!isset($prefrences['schedulers']['calendar_meetings'])){
	$prefrences['schedulers']['calendar_meetings']=true;
}
if(!isset($prefrences['schedulers']['calendar_calls'])){
	$prefrences['schedulers']['calendar_calls']=true;
}
if(!isset($prefrences['schedulers']['calendar_tasks'])){
	$prefrences['schedulers']['calendar_tasks']=true;
}
function toggleStatusText($input){
	$output="";
	switch ($input){
		case "Active":
		$output="Deactivate";
		break;
		case "Inactive":
		$output="Activate";
		break;
		default:
		$output="Activate";
		break;
	}
	return $output;
}
$prefrences['schedulers']['googleCalenderSync']['created']=false;
$prefrences['schedulers']['googleCalenderSync']['status']='Inactive';

$prefrences['schedulers']['googleContactsSync']['created']=false;
$prefrences['schedulers']['googleContactsSync']['status']='Inactive';

$prefrences['schedulers']['googleDriveSync']['created']=false;
$prefrences['schedulers']['googleDriveSync']['status']='Inactive';

$prefrences['schedulers']['importCacheEmails']['created']=false;
$prefrences['schedulers']['importCacheEmails']['status']='Inactive';

$prefrences['td_size']="37.5%";
//checking is admin
$prefrences['is_admin']=false;
if(is_admin($GLOBALS['current_user'])){
	$prefrences['td_size']="12.5%";
	$prefrences['is_admin']=true;
	//if schedulers created
	$scheduler = BeanFactory::getBean('Schedulers');
	//calendar
	
	$scheduler->retrieve_by_string_fields(array('job' => 'function::googleCalenderSync','deleted' => '0' ));

	if(!empty($scheduler->id)){
		$prefrences['schedulers']['googleCalenderSync']['created']=true;
		$prefrences['schedulers']['googleCalenderSync']['status']=toggleStatusText($scheduler->status);
	}
	//contacts
	$scheduler->id="";
	$scheduler->retrieve_by_string_fields(array('job' => 'function::googleContactsSync','deleted' => '0' ));

	if(!empty($scheduler->id)){
		$prefrences['schedulers']['googleContactsSync']['created']=true;
		$prefrences['schedulers']['googleContactsSync']['status']=toggleStatusText($scheduler->status);
	}
	//documents
	$scheduler->id="";
	$scheduler->retrieve_by_string_fields(array('job' => 'function::googleDriveSync','deleted' => '0' ));

	if(!empty($scheduler->id)){
		$prefrences['schedulers']['googleDriveSync']['created']=true;
		$prefrences['schedulers']['googleDriveSync']['status']=toggleStatusText($scheduler->status);
	}
	//archive emails
	$scheduler->id="";
	$scheduler->retrieve_by_string_fields(array('job' => 'function::importCacheEmails','deleted' => '0' ));
	if(!empty($scheduler->id)){
		$prefrences['schedulers']['importCacheEmails']['created']=true;
		$prefrences['schedulers']['importCacheEmails']['status']=toggleStatusText($scheduler->status);
	}
}
$ss->assign('PREFRENCES', $prefrences);
if(isset($GLOBALS['current_user']->enable_gsync) && $GLOBALS['current_user']->enable_gsync==true){
	$ss->assign('ENABLE_GSYNC', true);
}else{
	$ss->assign('ENABLE_GSYNC', false);
}

global $sugar_config;

if(isset($sugar_config['suitecrm_version']))
{
	$ss->assign('SUITECRM', true);
}
else
{
	$ss->assign('SUITECRM', false);
}

$html = $ss->fetch("modules/rt_GSync/tpls/settings.tpl");
echo $html;
?>