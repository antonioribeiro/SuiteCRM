<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once("Zend/Gdata/ClientLogin.php");
try
{
	if(!empty($GLOBALS['current_user']->gmail_pass) && $GLOBALS['current_user']->gmail_pass==$_REQUEST['gmailpass']){
		$_REQUEST['gmailpass']=blowfishDecode(blowfishGetKey('encrypt_field'), $_REQUEST['gmailpass']);
	}
	$calendar_client = Zend_Gdata_ClientLogin::getHttpClient($_REQUEST['gmailid'],$_REQUEST['gmailpass']);
	echo "successful";		
}
catch(Exception $e)
  {
    echo  $e->getMessage();
  }



?>