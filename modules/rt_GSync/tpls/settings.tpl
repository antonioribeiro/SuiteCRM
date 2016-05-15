{if $ENABLE_GSYNC===true}
<div class="moduleTitle">
<h2> RT GSync Preferences </h2>
<div class="clear"></div></div>
<form id="EditView" action="" method="POST" enctype="multipart/form-data" name="EditView">
<table width="100%" cellspacing="0" cellpadding="0" border="0" class="actionsContainer">
<tbody>
<tr>
	<td>
		<div class="action_buttons">
			<input type="button" value="Save" name="button" onclick="savesettings()" class="button primary" accesskey="a" title="Save" id="SAVE_HEADER">
			<div class="clear">
			</div>
		</div>
	</td>
</tr>
</tbody>
</table>
<div class="yui-navset yui-navset-top" id="EditView_tabs">
	<ul class="yui-nav">
		<li title="active" class="selected">
		<a href="#tab1" id="tab1"><em>Schedulers</em></a>
		</li>
	</ul>
	<div class="yui-content">
		<div>
			<div id="EditView_tabs">
				<div>
					<div class="edit508 expanded" id="detailpanel_1" >
						<h4><a onclick="collapsePanel(1);" class="collapseLink" href="javascript:void(0)">
						{if $SUITECRM===true}
						<img border="0" src="themes/default/images/basic_search.gif" id="detailpanel_1_img_hide"></a>
						{else}
						<img border="0" src="themes/Sugar5/images/basic_search.gif" id="detailpanel_1_img_hide"></a>
						{/if}
						
						<a onclick="expandPanel(1);" class="expandLink" href="javascript:void(0)">
						{if $SUITECRM===true}
						<img border="0" src="themes/default/images/advanced_search.gif" id="detailpanel_1_img_show"></a>
						{else}
						<img border="0" src="themes/Sugar5/images/advanced_search.gif" id="detailpanel_1_img_show"></a>
						{/if}
						Calendar Sync 
                        {if $PREFRENCES.is_admin===true }
                        
                        {if $PREFRENCES.schedulers.googleCalenderSync.created===true} 
                            <a name="googleCalenderSync" id="googleCalenderSync" href="#" onclick="activateSchedulers(this)" 
                            job_status="{$PREFRENCES.schedulers.googleCalenderSync.status}" style="float:right;">{$PREFRENCES.schedulers.googleCalenderSync.status}</a>
                            {else} <font color="red" style="float:right;"> Job is not created yet</font>
                            {/if}
                            
                        {/if}
                        </h4>
						<table width="100%" cellspacing="1" cellpadding="0" border="0" class="yui3-skin-sam edit view panelContainer" id="LBL_USER_INFORMATION">
						<tbody>
						<tr>
							<td width="20%" valign="top" scope="col" id="user_name_label">
								Google To Sugar
							</td>
							<td width="80%" valign="top">
								<input readonly=true disabled="true" type="checkbox" name="calendar_google_to_sugar" value="Active" {if $PREFRENCES.schedulers.calendar_google_to_sugar === true } checked="checked" {/if} />
							</td>
						</tr>
                            <td width="20%" valign="top" scope="col" id="status_label">
                                Sugar To Google
                            </td>
                            <td width="80%" valign="top">
								<input readonly=true disabled="true" type="checkbox" name="calendar_sugar_to_google" value="Active" {if $PREFRENCES.schedulers.calendar_sugar_to_google === true } checked="checked" {/if} />
							</td>
                        </tr>
						<tr>
						<th colspan="2" style="text-align:left;">
						<h2 style="font-size:16px; line-height:22px;">Activities</h2>
						</th>
						</tr>
						<tr>
						<td width="20%" valign="top" scope="col" id="">
						<label for="calendar_meetings">Meetings&nbsp;&nbsp;</label>
                        </td>
                        <td width="80%" valign="top">
						<input readonly=true disabled="true" type="checkbox" name="calendar_meetings" id="calendar_meetings" value="Active" checked="checked"/>
						</td>
                        </tr>
                        <tr>
						<td width="20%" valign="top" scope="col" id="">
						<label for="calendar_calls">Calls&nbsp;&nbsp;</label>
                        </td>
                        <td width="80%" valign="top">
						<input type="checkbox" name="calendar_calls" id="calendar_calls" value="Active" {if $PREFRENCES.schedulers.calendar_calls === true } checked="checked" {/if} />
						</td>
                        </tr>
                        <tr>
						<td width="20%" valign="top" scope="col" id="">
						<label for="calendar_tasks">Tasks&nbsp;&nbsp;</label>
                        </td>
                        <td width="80%" valign="top">
						<input type="checkbox" name="calendar_tasks" id="calendar_tasks" value="Active" {if $PREFRENCES.schedulers.calendar_tasks === true } checked="checked" {/if} />
						</td>
						</tr>
                        </tbody>
						</table>
					</div>
					<div class="edit508 expanded" id="detailpanel_2" >
						<h4><a onclick="collapsePanel(2);" class="collapseLink" href="javascript:void(0)">
						{if $SUITECRM===true}
						<img border="0" src="themes/default/images/basic_search.gif" id="detailpanel_2_img_hide"></a>
						{else}
						<img border="0" src="themes/Sugar5/images/basic_search.gif" id="detailpanel_2_img_hide"></a>
						{/if}
						
						<a onclick="expandPanel(2);" class="expandLink" href="javascript:void(0)">
						{if $SUITECRM===true}
						<img border="0" src="themes/default/images/advanced_search.gif" id="detailpanel_2_img_show"></a>
						{else}
						<img border="0" src="themes/Sugar5/images/advanced_search.gif" id="detailpanel_2_img_show"></a>
						{/if}
						Contacts Sync {if $PREFRENCES.is_admin===true}
							{if $PREFRENCES.schedulers.googleContactsSync.created===true}
								<a name="googleContactsSync" id="googleContactsSync" href="#" onclick="activateSchedulers(this)" 
								value="{$PREFRENCES.schedulers.googleContactsSync.status}" style="float:right;">{$PREFRENCES.schedulers.googleContactsSync.status}</a>
								{else} <font color="red" style="float:right;"> Job is not created yet</font>
								{/if}
								
							{/if}</h4>
						<table width="100%" cellspacing="1" cellpadding="0" border="0" class="yui3-skin-sam edit view panelContainer" id="LBL_USER_INFORMATION">
						<tbody>
						<tr>
							<td width="20%" valign="top" scope="col" id="user_name_label">
								Google To Sugar
							</td>
							<td width="80%" valign="top">
								<input type="checkbox" name="contacts_google_to_sugar" {if $PREFRENCES.schedulers.contacts_google_to_sugar === true } checked="checked" {/if} />
							</td>
                        </tr>
                        <tr>
							<td width="20%" valign="top" scope="col" id="status_label">
								Sugar To Google
							</td>
							<td width="80%" valign="top">
								<input type="checkbox" name="contacts_sugar_to_google" {if $PREFRENCES.schedulers.contacts_sugar_to_google === true } checked="checked" {/if} />
							</td>
							
						</tr>
						</tbody>
						</table>
					</div>
					
					<div class="edit508 expanded" id="detailpanel_3" >
						<h4><a onclick="collapsePanel(3);" class="collapseLink" href="javascript:void(0)">
						{if $SUITECRM===true}
						<img border="0" src="themes/default/images/basic_search.gif" id="detailpanel_3_img_hide"></a>
						{else}
						<img border="0" src="themes/Sugar5/images/basic_search.gif" id="detailpanel_3_img_hide"></a>
						{/if}
						<a onclick="expandPanel(3);" class="expandLink" href="javascript:void(0)">
						{if $SUITECRM===true}
						<img border="0" src="themes/default/images/advanced_search.gif" id="detailpanel_3_img_show"></a>
						{else}
						<img border="0" src="themes/Sugar5/images/advanced_search.gif" id="detailpanel_3_img_show"></a>
						{/if}
						Documents Sync 							{if $PREFRENCES.is_admin===true }
							{if $PREFRENCES.schedulers.googleDriveSync.created===true} 
								<a name="googleDriveSync" id="googleDriveSync" href="#" 
								onclick="activateSchedulers(this)" 
								job_status="{$PREFRENCES.schedulers.googleDriveSync.status}" style="float:right;">{$PREFRENCES.schedulers.googleDriveSync.status}
								</a>
								{else} <font color="red" style="float:right;"> Job is not created yet</font>
								{/if}
							{/if}</h4>
						<table width="100%" cellspacing="1" cellpadding="0" border="0" class="yui3-skin-sam edit view panelContainer" id="LBL_USER_INFORMATION">
						<tbody>
						<tr>
							<td width="20%" valign="top" scope="col" id="user_name_label">
								Google To Sugar
							</td>
							<td width="80%" valign="top">
								<input type="checkbox" name="documents_google_to_sugar" {if $PREFRENCES.schedulers.documents_google_to_sugar === true } checked="checked" {/if} />
							</td>
						</tr>	
						<tr>
							<td width="20%" valign="top" scope="col" id="status_label">
								Sugar To Google
							</td>
							<td width="80%" valign="top">
								<input type="checkbox" name="documents_sugar_to_google" {if $PREFRENCES.schedulers.documents_sugar_to_google === true } checked="checked" {/if} />
							</td>

						</tr>
						</tbody>
						</table>
					</div>
					{if $PREFRENCES.is_admin===true}
					<div class="edit508 expanded" id="detailpanel_4" >
						<h4><a onclick="collapsePanel(4);" class="collapseLink" href="javascript:void(0)">
						{if $SUITECRM===true}
						<img border="0" src="themes/default/images/basic_search.gif" id="detailpanel_4_img_hide"></a>
						{else}
						<img border="0" src="themes/Sugar5/images/basic_search.gif" id="detailpanel_4_img_hide"></a>
						{/if}
						<a onclick="expandPanel(4);" class="expandLink" href="javascript:void(0)">
						{if $SUITECRM===true}
						<img border="0" src="themes/default/images/advanced_search.gif" id="detailpanel_4_img_show"></a>
						{else}
						<img border="0" src="themes/Sugar5/images/advanced_search.gif" id="detailpanel_4_img_show"></a>
						{/if}
						Archive Emails {if $PREFRENCES.schedulers.importCacheEmails.created===true}
								<a name="importCacheEmails" id="importCacheEmails" href="#" 
								onclick="activateSchedulers(this)" 
								value="{$PREFRENCES.schedulers.importCacheEmails.status}" style="float:right;">{$PREFRENCES.schedulers.importCacheEmails.status}</a>
								{else} <font color="red" style="float:right;"> Job is not created yet</font>
								{/if}</h4>
						<table width="100%" cellspacing="1" cellpadding="0" border="0" class="yui3-skin-sam edit view panelContainer" id="LBL_USER_INFORMATION">
						<tbody>
						<tr>
							<td width="20%" valign="top" scope="col" id="user_name_label">
								
							</td>
							<td width="80" valign="top">
								
							</td>
							
						</tr>
                        <tr>
							<td width="20%" valign="top" scope="col" id="status_label">
								
							</td>
							<td width="80" valign="top">
								
							</td>
							
						</tr>
						</tbody>
						</table>
					</div>
					{/if}
				</div>
			</div>
		</div>
	</div>
	 {literal}
	<style>
.actionsContainer.footer td {
height:120px;
vertical-align: top;
}
	</style>
	 {/literal}
	<table width="100%" cellspacing="0" cellpadding="0" border="0" class="actionsContainer footer">
	<tbody>
	<tr>
		<td>
			<div class="action_buttons">
				<input type="button" value="Save" name="button" onclick="savesettings()" class="button primary" accesskey="a" title="Save" id="SAVE_FOOTER">
				<div class="clear">
				</div>
			</div>
		</td>
	</tr>
	</tbody>
	</table>
</div>
</form>
{literal}
<script type="text/javascript" >
var $ajaxInProcess=false;
function savesettings(){
	if($ajaxInProcess===false){
		$ajaxInProcess=true;
		$form=document.EditView;
		$saveData={};
		$saveData.schedulers={};
		
		$saveData.schedulers.calendar_google_to_sugar=true;
		$saveData.schedulers.calendar_sugar_to_google=true;
		
		$saveData.schedulers.calendar_meetings=true;
		$saveData.schedulers.calendar_calls=$form.calendar_calls.checked;
		$saveData.schedulers.calendar_tasks=$form.calendar_tasks.checked;
		
		$saveData.schedulers.contacts_google_to_sugar=$form.contacts_google_to_sugar.checked;
		$saveData.schedulers.contacts_sugar_to_google=$form.contacts_sugar_to_google.checked;

		$saveData.schedulers.documents_google_to_sugar=$form.documents_google_to_sugar.checked;
		$saveData.schedulers.documents_sugar_to_google=$form.documents_sugar_to_google.checked;
		
		if(ajaxStatus && ajaxStatus.showStatus && ajaxStatus.hideStatus)
		ajaxStatus.showStatus('Saving...');
		YAHOO.util.Connect.asyncRequest('POST','index.php',{'success':save_callback,'failure':save_callback},
		'module=rt_GSync&action=savesettings&data='+JSON.stringify($saveData)+'&sugar_body_only=true');
	}
}
function save_callback (response){
	$ajaxInProcess=false;
	if(ajaxStatus && ajaxStatus.hideStatus)
	ajaxStatus.hideStatus();
	if(response && response.responseText && response.responseText=="1"){
		//saved successfully
	}else{
		alert("Unable to save");
	}
}
function activateSchedulers(el){
	if($ajaxInProcess===false){
		$ajaxInProcess=true;
		$Data={};
		$Data.name=el.id;
		$Data.status=el.innerHTML=='Activate'?'Active':'Inactive';
		if(ajaxStatus && ajaxStatus.showStatus && ajaxStatus.hideStatus)
		ajaxStatus.showStatus('Saving...');
		YAHOO.util.Connect.asyncRequest('POST','index.php',{'success':activateSchedulers_callback,'failure':activateSchedulers_callback,argument:$Data},
		'module=rt_GSync&action=activateSchedulers&data='+JSON.stringify($Data)+'&sugar_body_only=true');
	}
}
function activateSchedulers_callback(response){
	$ajaxInProcess=false;
	if(ajaxStatus && ajaxStatus.hideStatus)
	ajaxStatus.hideStatus();
	if(response && response.responseText && response.responseText=="1"){
		if(response.argument){
			document.getElementById(response.argument.name).innerHTML=response.argument.status=='Active'?'Deactivate':'Activate';
		}
	}else{
		alert("Unable to save");
	}
}

YAHOO.util.Event.onDOMReady(function(){
	
});

</script>
{/literal}
{else}
<div class="moduleTitle">
<h2 class="error"> Administrator has disabled GSync for this user, contact administrator to enable it.</h2>
<div class="clear"></div></div>
{/if}