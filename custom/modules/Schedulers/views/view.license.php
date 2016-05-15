<?php
if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2012 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/
/*********************************************************************************

* Description:  Includes generic helper functions used throughout the application.
* Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
* All Rights Reserved.
* Contributor(s): ______________________________________..
********************************************************************************/
require_once('include/MVC/View/SugarView.php');
class ViewLicense extends SugarView
{
    protected function _getModuleTitleParams($browserTitle = false)
    {
        global $mod_strings;
        return array(
            "<a href='index.php?module=Administration&action=index'>" . translate('LBL_MODULE_NAME', 'Administration') . "</a>",
            translate('LBL_GMAILLICENSEADDON', 'Administration') . ': ' . translate('LBL_GMAILLICENSEADDON_LICENSE_TITLE', 'Administration')
        );
    }
    public function preDisplay()
    {
        global $current_user;
        if (!is_admin($current_user)) {
            sugar_die("Unauthorized access to administration.");
        }
    }
    public function display()
    {
        global $current_user, $app_strings, $sugar_config, $currentModule;
        //load license validation config
        require_once('custom/modules/' . $currentModule . '/license/config.php');
        echo $this->getModuleTitle();
        $GLOBALS['log']->info("License Configuration");
        $this->ss->assign("GREDIRECT_URI", $sugar_config['GOOGLE']['REDIRECT_URI']);
        $this->ss->assign("SUPPORT_EMAIL_ID", 'support@rolustech.com');
        //$this->ss->assign("MOD", $mod_strings);
        //$this->ss->assign("APP", $app_strings);
        //todo: redirect appropriately
        $this->ss->assign("RETURN_MODULE", "Administration");
        $this->ss->assign("RETURN_ACTION", "index");
        $this->ss->assign("MODULE", $currentModule);
        $this->ss->assign("LICENSE", ViewLicense::loadLicenseStrings());
        if (!empty($sugar_config['outfitters_licenses']) && !empty($sugar_config['outfitters_licenses'][$outfitters_config['shortname']])) {
            $this->ss->assign("license_key", $sugar_config['outfitters_licenses'][$outfitters_config['shortname']]);
        }
        $this->ss->assign("continue_url", $outfitters_config['continue_url']);
        $this->ss->assign("file_path", getJSPath("custom/modules/" . $currentModule . "/license/lib/jquery-1.7.1.min.js"));
        if (isset($outfitters_config['validate_users']) && $outfitters_config['validate_users'] == true) {
            $this->ss->assign("validate_users", true);
            //get user count for all active, non-portal, non-group users
            // $active_users = get_user_array(FALSE);
            // $active_users = get_user_array(FALSE,'Active','',false,'',' AND is_group=0');
            $active_users=array();
			if($this->check_column_if_exist($sugar_config['dbconfig']['db_name'],"users","enable_gsync")){
				$active_users = get_user_array(FALSE, 'Active', '', false, '', ' AND is_group=0 AND enable_gsync=1');
			}
            $this->ss->assign("current_users", count($active_users));
            $this->ss->assign("user_count_param", "user_count: '" . (count($active_users) < 1 ? 1 : count($active_users)) . "'");
        } else {
            $this->ss->assign("validate_users", false);
            $this->ss->assign("current_users", '');
            $this->ss->assign("user_count_param", '');
        }
        $this->ss->display('custom/modules/' . $currentModule . '/license/tpls/license.tpl');
    }
    protected static function loadLicenseStrings()
    {
        global $sugar_config, $currentModule, $current_language;
        //load license config file....if it isn't broken don't fix it
        $default_language = $sugar_config['default_language'];
        $langs            = array();
        if ($current_language != 'en_us') {
            $langs[] = 'en_us';
        }
        if ($default_language != 'en_us' && $current_language != $default_language) {
            $langs[] = $default_language;
        }
        $langs[] = $current_language;
        foreach ($langs as $lang) {
            $license_strings = array();
            if (sugar_is_file("custom/modules/" . $currentModule . "/license/language/$lang.lang.php")) {
                include("custom/modules/" . $currentModule . "/license/language/$lang.lang.php");
            }
            $license_strings_array[] = $license_strings;
        }
        $license_strings = array();
        foreach ($license_strings_array as $license_strings_item) {
            $license_strings = sugarArrayMerge($license_strings, $license_strings_item);
        }
        return $license_strings;
    }
	private function check_column_if_exist($db_name,$table, $column){
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
