<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class FP_eventsViewDetail extends ViewDetail {
	var $currSymbol;
	function __construct(){
 		parent::__construct();
 	}

	function display(){
		$this->bean->email_templates();
		parent::display();
	}
}
?>
