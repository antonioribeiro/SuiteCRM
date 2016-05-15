<?php
 
$manifest =array(
    'acceptable_sugar_flavors' => array('CE','PRO','CORP','ENT','ULT'),
    'acceptable_sugar_versions' => array(
        'exact_matches' => array(),
        'regex_matches' => array (
			'6\.*',
		),
    ),
	'key' => 'rt',
    'author' => 'Rolustech',
    'description' => 'Automatically sync Emails, Calendars, Contacts between Google Apps and SugarCRM',
    'icon' => '',
    'is_uninstallable' => true,
    'name' => 'RT GSync',
    'published_date' => '2014-11-20 12:16:00',
    'type' => 'module',
    'version' => 'V3.1.03',
	'remove_tables' => 'prompt',
);
$installdefs =array(
	'id' => 'rt_google_sync',
	'beans' =>  
	array (
		0 => 
		array (
			'module' => 'rt_GSync',
			'class' => 'rt_GSync',
			'path' => 'modules/rt_GSync/rt_GSync.php',
			'tab' => true,
		),
	),
	'image_dir' => '<basepath>/Files/icons', 
	'language' =>
		array (
			array(
				'from'=> '<basepath>/Files/custom/license_admin/language/en_us.Schedulers.php',
				'to_module'=> 'Administration',
				'language'=>'en_us'
			),
			array (
				'from' => '<basepath>/Files/custom/Extension/modules/Users/Ext/Language/en_us.lang.php',
				'to_module' => 'Users',
				'language' => 'en_us',
			),
			array (
				'from' => '<basepath>/Files/custom/modules/Schedulers/language/en_us.lang.php',
				'to_module' => 'Schedulers',
				'language' => 'en_us',
			),
			array (
				'from' => '<basepath>/Files/SugarModules/language/application/en_us.lang.php', 
				'to_module' => 'application',
				'language' => 'en_us',
			),
		),
	//copy files
	'copy' => array(
		array (
			'from' => '<basepath>/Files/custom/modules/Schedulers/license',
			'to' => 'custom/modules/Schedulers',
		),
		array (
			'from' => '<basepath>/Files/custom/Extension/modules/Schedulers/',
			'to' => 'custom/Extension/modules/Schedulers/',
		),
		array(
			'from' => '<basepath>/Files/custom/include/',
			'to' => 'custom/include/',
		),
		array(
			'from' => '<basepath>/Files/custom/modules/Users/',
			'to' => 'custom/modules/Users/',
		),
		array(
			'from' => '<basepath>/Files/custom/modules/Contacts/AcceptDecline.php',
			'to' => 'custom/modules/Contacts/AcceptDecline.php',
		),
		array (
			'from' => '<basepath>/Files/SugarModules/modules/rt_GSync',
			'to' => 'modules/rt_GSync', 
		),
		//vardefs
		array(
            'from' => '<basepath>/Files/custom/Extension/modules/Calls/Ext/Vardefs/',
            'to' => 'custom/Extension/modules/Calls/Ext/Vardefs/',
        ),
		array(
            'from' => '<basepath>/Files/custom/Extension/modules/Meetings/Ext/Vardefs/',
            'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/',
        ),
		array(
            'from' => '<basepath>/Files/custom/Extension/modules/Tasks/Ext/Vardefs/',
            'to' => 'custom/Extension/modules/Tasks/Ext/Vardefs/',
        ),
		array(
            'from' => '<basepath>/Files/custom/Extension/modules/Documents/Ext/Vardefs/',
            'to' => 'custom/Extension/modules/Documents/Ext/Vardefs/',
        ),
		array(
            'from' => '<basepath>/Files/custom/Extension/modules/Users/Ext/Vardefs/',
            'to' => 'custom/Extension/modules/Users/Ext/Vardefs/',
        ),
		array(
            'from' => '<basepath>/Files/custom/Extension/modules/Contacts/Ext/Vardefs/',
            'to' => 'custom/Extension/modules/Contacts/Ext/Vardefs/',
        ),
		//LogicHooks
		array(
            'from' => '<basepath>/Files/custom/Extension/modules/Calls/Ext/LogicHooks/',
            'to' => 'custom/Extension/modules/Calls/Ext/LogicHooks/',
        ),
		array(
            'from' => '<basepath>/Files/custom/Extension/modules/Meetings/Ext/LogicHooks/',
            'to' => 'custom/Extension/modules/Meetings/Ext/LogicHooks/',
        ),
		array(
            'from' => '<basepath>/Files/custom/Extension/modules/Tasks/Ext/LogicHooks/',
            'to' => 'custom/Extension/modules/Tasks/Ext/LogicHooks/',
        ),
		array(
            'from' => '<basepath>/Files/custom/Extension/modules/Documents/Ext/LogicHooks/',
            'to' => 'custom/Extension/modules/Documents/Ext/LogicHooks/',
        ),
		array(
            'from' => '<basepath>/Files/custom/Extension/modules/Users/Ext/LogicHooks/',
            'to' => 'custom/Extension/modules/Users/Ext/LogicHooks/',
        ),
		array(
            'from' => '<basepath>/Files/custom/Extension/modules/Contacts/Ext/LogicHooks/',
            'to' => 'custom/Extension/modules/Contacts/Ext/LogicHooks/',
        ),
	),
	'administration' =>
	array(
		array(
			'from'=>'<basepath>/Files/custom/license_admin/menu/Schedulers_admin.php', 
			'to' => 'modules/Administration/Schedulers_admin.php',
		),
	),
	'action_view_map' =>
	array (
		array(
			'from'=> '<basepath>/Files/custom/license_admin/actionviewmap/Schedulers_actionviewmap.php',
			'to_module'=> 'Schedulers',
		),
	),
	'logic_hooks' => array(
		array(
			'module'  => 'DocumentRevisions',
			'hook'    => 'after_save',
			'order'   => 1,
			'description' => 'Handling date_modified for drive files:Google Drive Sync',
			'file'   => 'custom/include/Google/google_hook.php',
			'class'   => 'GoogleHook',
			'function'  => 'gdriveHandler',
		),
	),
	'post_uninstall' => 
		array(
			'<basepath>/scripts/post_uninstall.php',
		),
	'pre_uninstall' => 
		array(
			'<basepath>/scripts/pre_uninstall.php',
		),
	'entrypoints' => array (
        array (
			'from' => '<basepath>/Files/custom/Extension/application/Ext/EntryPointRegistry/acceptDecline.php',
			'to_module' => 'application',
		),
    ),
);
?>
