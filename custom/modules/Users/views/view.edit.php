<?php
/*
custom edit view for users module
it is extended to include custom js in edit view
*/
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('modules/Users/views/view.edit.php');


class CustomUsersViewEdit extends UsersViewEdit {

	function display()
	{
		echo("<script src='custom/include/javascript/testGmailConnection.js' type='text/javascript'></script>");
		parent::display();
	}
	
}