
<!-- BEGIN: main -->
{literal}
<script type="text/javascript">

function outfitters_validate_license()
{
	var licKey = document.getElementById('outfitters_license_key').value;
	if(!licKey) {
		return false;
	}
	document.getElementById('outfitters_licensed_users').innerHTML='';
	YUI().use('node', function(Y) {
		Y.one('#btn-outfitters-validate-license').hide();
		Y.one('#outfitters_validation_success').hide();
		Y.one('#outfitters_validation_fail').hide();
		Y.one('#outfitters_license_passed').hide();
		Y.one('#outfitters_license_increase').hide();
		Y.one('#outfitters_validating_license').show();
	});
	
	var callback = 
	{ 
		success:outfitters_validate_license_handleSuccess, 
		failure:outfitters_validate_license_handleFailure, 
		argument: [] 
	};
	var postData='method=validate&key='+licKey;
	var request = YAHOO.util.Connect.asyncRequest('POST', 'index.php?module={/literal}{$MODULE}{literal}&action=outfitterscontroller&to_pdf=1&sugar_body_only=true', callback, postData); 
	

	return false;
}
var outfitters_validate_license_handleSuccess = function(o){ 

	var response=JSON.parse(o.responseText);

	YUI().use('node', function(Y) {
		Y.one('#outfitters_validating_license').hide();
		Y.one('#btn-outfitters-validate-license').show();
		if (response){
			if(response.validated == true) {
				Y.one('#outfitters_validation_success').show();
			} else {
				document.getElementById('outfitters_fail_message').innerHTML='Invalid key';
				Y.one('#outfitters_validation_fail').show();
			}
			if(response.licensed_user_count != undefined) {
				document.getElementById('outfitters_licensed_users').innerHTML=response.licensed_user_count;

				if(response.validated_users == true) {
					Y.one('#outfitters_license_passed').show();
				} else {
					document.getElementById('btn-outfitters-increase').innerHTML='Increase to {/literal}{$current_users}{literal} users';
					Y.one('#outfitters_license_increase').show();
				}
			} else {
				//Assume unlimited license if nothing is returned as the add-on is configured to not verify user count
				document.getElementById('outfitters_licensed_users').innerHTML='Unlimited';
			}
		} else {
			alert('Unexpected data returned from the server.');
		}
	});
	
} 

var outfitters_validate_license_handleFailure = function(o){
	YUI().use('node', function(Y) {
		Y.one('#outfitters_validating_license').hide();
		Y.one('#btn-outfitters-validate-license').show();
		document.getElementById('outfitters_fail_message').innerHTML=o.responseText;
		Y.one('#outfitters_validation_fail').show();
		alert('Error: '+o.responseText);
	});	

}
function outfitters_increase_license()
{
	var licKey = document.getElementById('outfitters_license_key').value;
	if(!licKey) {
		return false;
	}
	var increase_to = '{/literal}{$current_users}{literal}';
	YUI().use('node', function(Y) {
		Y.one('#outfitters_increasing_license').show();
	});	
	
	var callback = 
	{ 
		success:outfitters_increase_license_handleSuccess, 
		failure: outfitters_increase_license_handleFailure, 
		argument: [] 
	};
	var postData='method=change&key='+licKey+'&user_count='+'{/literal}{$current_users}{literal}';
	var request = YAHOO.util.Connect.asyncRequest('POST', 'index.php?module={/literal}{$MODULE}{literal}&action=outfitterscontroller&to_pdf=1', callback, postData); 
	

	return false;
}

var outfitters_increase_license_handleSuccess = function(o){ 
	var response=JSON.parse(o.responseText);
	YUI().use('node', function(Y) {
		Y.one('#outfitters_increasing_license').hide();
		Y.one('#btn-outfitters-validate-license').show();
		if (response.licensed_user_count){
			Y.one('#outfitters_license_increase').hide();
			document.getElementById('outfitters_licensed_users').innerHTML=response.licensed_user_count;
			Y.one('#outfitters_license_passed').show();
		} else {
			alert('Unexpected data returned from the server.');
		}
	});	
} 
var outfitters_increase_license_handleFailure = function(o){
	YUI().use('node', function(Y) {
		Y.one('#outfitters_increasing_license').hide();
		alert('Error: '+o.responseText);
	});	
	
} 

</script>
<style type="text/css">
	.outfitters_license_key {
		background-color: #ffffff;
		border: 1px solid #4E8CCF;
		text-align: center;
		padding: 10px 30px;
		font-size: 1.2em;
		margin-right: 10px;
	}
	#outfitters_license_increase {
		color: red;
		font-weight: bold;
		font-size: 1.1em;
	}
	#outfitters_license_increase, #outfitters_license_passed, #outfitters_validation_fail, #outfitters_validation_success {
		padding-left: 10px;
	}
	
</style>
{/literal}

<form name="outfitters_license_form" id="outfitters_license_form" method="POST" >
	<input type="hidden" name="module" value="{$MODULE}">
	<input type="hidden" name="action">
	<input type="hidden" name="return_module" value="{$RETURN_MODULE}">
	<input type="hidden" name="return_action" value="{$RETURN_ACTION}">

<table width="100%" border="1" cellspacing="0" cellpadding="0" class="edit view">
	{if isset($smarty.request.email_sent)}
	<tr >
		<td align="left" scope="row" colspan="4" style="color: red;">
			{if $smarty.request.email_sent == 1}
			Note: An email has been sent to support team, Gmail Sync functionality will be active in an hour
			{else}
			Note: Unable to send email to support team, Please email <b>{$GREDIRECT_URI}</b> to {$SUPPORT_EMAIL_ID}.
			{/if}
		</td>
	</tr>
	{/if}
	<tr><th align="left" scope="row" colspan="4"><h4>{$LICENSE.LBL_STEPS_TO_LOCATE_KEY_TITLE}</h4></th></tr>
	<tr>
		<td align="left" scope="row" colspan="4">
			{$LICENSE.LBL_STEPS_TO_LOCATE_KEY}
		</td>
   </tr>
	<tr>
		<td width="20%" scope="row">{$LICENSE.LBL_LICENSE_KEY}</td>
		<td width="30%" colspan="3">
			<input id='outfitters_license_key' name='outfitters_license_key' class='outfitters_license_key' tabindex='1' size='50' maxlength='100' type="text" value="{$license_key}">
			<input title="{$LICENSE.LBL_VALIDATE_LABEL}" class="button primary" onclick="return outfitters_validate_license();" type="button" name="button" id="btn-outfitters-validate-license" value=" {$LICENSE.LBL_VALIDATE_LABEL} ">
			<span id="outfitters_validating_license" style="display: none"><img src="themes/default/images/img_loading.gif" alt="Loading"></img> Validating...</span>
			<span id="outfitters_validation_fail" style="display: none"><img src="themes/default/images/no.gif" alt="Failed"></img> Failed: <span id="outfitters_fail_message"></span></span>
			<span id="outfitters_validation_success" style="display: none"><img src="themes/default/images/yes.gif" alt="Success"></img> Success!</span>

		</td>
	</tr>
{if $validate_users == true}
	<tr>
		<td width="20%" scope="row">{$LICENSE.LBL_CURRENT_USERS}</td>
		<td width="30%" id="outfitters_current_users">{$current_users}</td>
		<td width="20%" scope="row"></td>
		<td width="30%"></td>
	</tr>
	<tr>
		<td width="20%" scope="row">{$LICENSE.LBL_LICENSED_USERS}</td>
		<td width="30%" colspan="3">
			<span id="outfitters_licensed_users"></span>
			<span id="outfitters_increasing_license" style="display: none"><img src="themes/default/images/img_loading.gif" alt="Loading"></img> Boosting...</span>
			<span id="outfitters_license_increase" style="display: none">
				<img src="themes/default/images/no.gif" alt="Warning"></img> Warning: Boost license to continue using this add-on
				<br/>
				<button id="btn-outfitters-increase" onclick="javascript:outfitters_increase_license(); return false;">Boost to # users</button>
			</span>
			<span id="outfitters_license_passed" style="display: none">
				<img src="themes/default/images/yes.gif" alt="Passed"></img> Verified!

				{if !empty($continue_url)}
					<br/><br/>
					<input title="Continue" class="button primary" onclick="window.location='{$continue_url}';" type="button" name="button" value=" Continue ">
				{/if}
			</span>
		</td>
	</tr>
{/if}
	<tr>
		<td width="20%" scope="row"></td>
		<td width="30%"></td>
		<td width="20%" scope="row"></td>
		<td width="30%"></td>
	</tr>

</table>
</form>
