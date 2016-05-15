<?php 
 //WARNING: The contents of this file are auto-generated


//added for cleanup process
$dictionary["User"]["fields"]['enable_gsync'] = array (
	'name'=>'enable_gsync',
	'vname' => 'LBL_ENABLE_GSYNC',
	'type' => 'bool',
	'default' => false,
	'reportable'=>false,
	'massupdate' => false,
	'importable' => 'false',
	'studio' => false,
);

$dictionary["User"]["fields"]["gdrive_access_code"] = array (
	'name' => 'gdrive_access_code',
	'vname' => 'LBL_GDRIVE_ACCESS_CODE',
	'type' => 'varchar',
	'len' => 300,
	'reportable'=>false,
	'massupdate' => false,
	'importable' => 'false',
	'studio' => false,
);

$dictionary["User"]["fields"]["gdrive_auth_code"] = array (
	'name' => 'gdrive_auth_code',
	'vname' => 'LBL_GDRIVE_AUTH_CODE',
	'type' => 'varchar',
	'len' => 300,
	'reportable'=>false,
	'massupdate' => false,
	'importable' => 'false',
	'studio' => false,
);

$dictionary["User"]["fields"]["gdrive_auth_created"] = array (
	'name' => 'gdrive_auth_created',
	'vname' => 'LBL_GDRIVE_AUTH_CREATED',
	'type' => 'int',
	'reportable'=>false,
	'massupdate' => false,
	'importable' => 'false',
	'studio' => false,
);

$dictionary["User"]["fields"]["gdrive_auth_expires_in"] = array (
	'name' => 'gdrive_auth_expires_in',
	'vname' => 'LBL_GDRIVE_AUTH_EXPIRES_IN',
	'type' => 'int',
	'reportable'=>false,
	'massupdate' => false,
	'importable' => 'false',
	'studio' => false,
);

$dictionary["User"]["fields"]["gdrive_refresh_code"] = array (
	'name' => 'gdrive_refresh_code',
	'vname' => 'LBL_GDRIVE_REFRESH_CODE',
	'type' => 'varchar',
	'len' => 300,
	'reportable'=>false,
	'massupdate' => false,
	'importable' => 'false',
	'studio' => false,
);

$dictionary["User"]["fields"]["gmail_id"] = array (
	'name' => 'gmail_id',
	'vname' => 'LBL_GMAIL_ID',
	'type' => 'varchar',
	'len' => 200,
	'reportable'=>false,
	'massupdate' => false,
	'importable' => 'false',
);

$dictionary["User"]["fields"]["gmail_pass"] = array (
	'name' => 'gmail_pass',
	'vname' => 'LBL_GMAIL_PASS',
	'dbType' => 'varchar',
	'type'=> 'password',
	'len' => 200,
	'reportable'=>false,
	'massupdate' => false,
	'importable' => 'false',
);

$dictionary["User"]["fields"]['lastsync_calendar'] = array(
	'name' => 'lastsync_calendar',
	'vname' => 'LBL_LASTSYNC_CALENDAR',
	'type' => 'datetime',
	'reportable'=>false,
	// 'massupdate' => false,
	'importable' => 'false',
	'studio' => false,
	'default'=> '2013-01-01 01:01:01',
);

$dictionary["User"]["fields"]['lastsync_contacts'] = array(
	'name' => 'lastsync_contacts',
	'vname' => 'LBL_LASTSYNC_CONTACTS',
	'type' => 'datetime',
	'reportable'=>false,
	// 'massupdate' => false,
	'importable' => 'false',
	'studio' => false,
	'default'=> '2013-01-01 01:01:01',   
);

$dictionary["User"]["fields"]['lastsync_drive'] = array(
	'name' => 'lastsync_drive',
	'vname' => 'LBL_LASTSYNC_DRIVE',
	'type' => 'datetime',
	'reportable'=>false,
	// 'massupdate' => false,
	'importable' => 'false',
	'studio' => false,
	'default'=> '2013-01-01 01:01:01',   
);
?>