<?php 
 //WARNING: The contents of this file are auto-generated



$hook_array['after_login'][] = Array(2, 'Gmail Sync License Validation', 'custom/include/Google/google_hook.php','GoogleHook', 'validateLicense'); 

$hook_array['before_save'][] = Array(100, 'Handling Gmail ID for Users:Google Sync', 'custom/include/Google/google_hook.php','GoogleHook', 'geventHandler'); 

$hook_array['after_save'][] = Array(100, 'Handling Gmail ID/Access Codes for Users:Google Drive Sync', 'custom/include/Google/google_hook.php','GoogleHook', 'gdriveHandler');


?>