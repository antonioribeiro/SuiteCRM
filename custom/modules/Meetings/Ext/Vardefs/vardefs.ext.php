<?php 
 //WARNING: The contents of this file are auto-generated

	
//all day event
$dictionary["Meeting"]["fields"]['allday'] = array (
	'name'=>'allday',
	'vname' => 'LBL_IS_ALLDAY',
	'type' => 'bool',
	'default' => 0,
	'reportable'=>false,
	'massupdate' => false,
	'importable' => 'false',
	'studio' => false,
);
	
$dictionary["Meeting"]["fields"]['gevent_id'] = array (
	'name'=>'gevent_id',
	'rname'=>'name',
	'vname' => 'LBL_GEVENT_ID',
	'type' => 'varchar',
	'reportable'=>false,
	'massupdate' => false,
	'importable' => 'false',
	'studio' => false,
);
	
//added to handle invitees
$dictionary["Meeting"]["fields"]['invitee_email_addresses'] = array (
	'name'=>'invitee_email_addresses',
	'rname'=>'name',
	'vname' => 'LBL_INVITEE_EMAIL_ADDRESSES',
	'type' => 'text',
	'reportable'=>false,
	'massupdate' => false,
	'importable' => 'false',
	'studio' => false,
);
	
//added for cleanup process
$dictionary["Meeting"]["fields"]['is_gevent'] = array (
	'name'=>'is_gevent',
	'vname' => 'LBL_IS_GEVENT',
	'type' => 'bool',
	'default' => '0',
	'reportable'=>false,
	'massupdate' => false,
	'importable' => 'false',
	'studio' => false,
);

 // created: 2016-05-15 16:11:22
$dictionary['Meeting']['fields']['jjwg_maps_address_c']['inline_edit']=1;

 

 // created: 2016-05-15 16:11:22
$dictionary['Meeting']['fields']['jjwg_maps_geocode_status_c']['inline_edit']=1;

 

 // created: 2016-05-15 16:11:22
$dictionary['Meeting']['fields']['jjwg_maps_lat_c']['inline_edit']=1;

 

 // created: 2016-05-15 16:11:22
$dictionary['Meeting']['fields']['jjwg_maps_lng_c']['inline_edit']=1;

 
?>