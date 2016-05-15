<link rel="stylesheet" type="text/css" href="{sugar_getjspath file='modules/Connectors/tpls/tabs.css'}"/>
<script type="text/javascript" src="cache/include/javascript/sugar_grp_yui_widgets.js"></script>

<form name="ConfigureTabs" id="ConfigureTabs" method="POST" action="index.php">
<input type="hidden" id="enabled_tabs" name="enabled_tabs" value="">
<input type="hidden" id="disabled_tabs" name="disabled_tabs" value="">
<input type="hidden" id="module" name="module" value="rt_GSync">
<input type="hidden" id="action" name="action" value="saveUsers">
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
<tr><td colspan='100'><h2>{$title}</h2></td></tr>
<tr><td><br></td></tr>
<tr><td colspan='100'>
	<table border="0" cellspacing="1" cellpadding="1" class="actionsContainer">
		<tr>
			<td>
				<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button primary" onclick="SUGAR.saveConfigureTabs();" type="button" name="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}" > 
				<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.cancelConfigureTabs();" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}">
			</td>
		</tr>
	</table>
	<div class='add_subpanels' style='margin-bottom:5px'>
		<table id="ConfigureSubPanels" class="themeSettings edit view" style='margin-bottom:0px;' border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td scope="row" width="100%" colspan="100">
					<a class="button" style="cursor: pointer;" onclick="SUGAR.dragAllToRight();" >Enable all users</a>
				</td>
				
			</tr>
			<tr>
				<td width='1%' >
					<div id="disabled_subpanels_div"></div>
				</td>
				<td width='1%'>
					<div id="enabled_subpanels_div"></div>	
				</td>
				<td>
				
				<div>
					<table id="table_boost_license" cellspacing="10" width="100%">
						<tr>
							<td colspan="3" width="100%">
								{if $SYNC_STOPPED === true}
								<span class="error" id="USERS_LIMIT_EXCEEDED">
								{else}
								<span class="error" id="USERS_LIMIT_EXCEEDED" style="display: none;"  >
								{/if}
									{$USERS_LIMIT_EXCEEDED}
								</span>
								
							</td>
						</tr>
						<tr id="tr_enabled_users_count">
							<td width="25%">
								<b>GSync enabled users: </b>
							</td>
							<td width="5%">
								<span id="enabled_users_count">{$ENABLE_USERS_COUNT}</span>
							</td>
							<td width="70%">
							</td>
						</tr>
						<tr id="tr_licensed_users_count">
							<td width="25%">
								<b>GSync licensed users: </b>
							</td>
							<td width="5%">
								<span id="licensed_users_count">{$licensed_users}</span>
							</td>
							<td width="70%">
							</td>
						</tr>
						<tr id="tr_boost_users_count" style="display: none;">
							<td  colspan="3" width="30%">
								<input type="text" name="boost_users_count" id="boost_users_count" />
								<input type="button" name="outfitters_license_increase" id="outfitters_license_increase" class="button" value="Boost user count" onclick="SUGAR.outfitters_increase_license();" />
								
								<span id="outfitters_increasing_license" style="display: none;">
									Processing...
								</span>
							</td>
						</tr>
						
					</table>
					<table id="table_boost_users_license_key" style="display: none;" cellspacing="10" width="100%">
						<tr >
							<td colspan="4" width="100%">
								<input type="text" name="outfitters_license_key" id="outfitters_license_key" value="{$license_key}"/>
								
							</td>
						</tr>
					</table>
				</div>
				</td>
			</tr>
		</table>
	</div>
	<table border="0" cellspacing="1" cellpadding="1" class="actionsContainer">
		<tr>
			<td>
				<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" class="button primary" onclick="SUGAR.saveConfigureTabs();this.form.action.value='SaveTabs'; " type="button" name="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}" >
				<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" class="button" onclick="SUGAR.cancelConfigureTabs();" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}">
			</td>
		</tr>
	</table>
</td></tr>
</table>	
</form>
<script type="text/javascript">
	SUGAR.enabled_users_count=0;
	SUGAR.boost_users_count=0;
	
	SUGAR.AJAXINPROGRESS = false;
	var enabled_users = {$enabled_users};
	var disabled_users = {$disabled_users};
	var licensed_users = '{$licensed_users}';
	var lblenabled_users = '{sugar_translate label="LBL_ENABLED_USERS"}';
	var lbldisabled_users = '{sugar_translate label="LBL_DISABLED_USERS"}';
	{literal}
	
	SUGAR.userEnabledTable = new YAHOO.SUGAR.DragDropTable(
		"enabled_subpanels_div",
		[{key:"label",  label: lblenabled_users, width: 200, sortable: false},
		 {key:"user", label: lblenabled_users, hidden:true}],
		new YAHOO.util.LocalDataSource(enabled_users, {
			responseSchema: {
			   fields : [{key : "user"}, {key : "label"}]
			}
		}),  
		{
		 	height: "300px",
		 	group: ["enabled_subpanels_div", "disabled_subpanels_div"]
		}
	);
	SUGAR.updateGSynUserCountHTML = function(){
		
		SUGAR.enabled_users_count=SUGAR.userEnabledTable.getRecordSet().getLength()-1;
		document.getElementById("enabled_users_count").innerHTML=SUGAR.enabled_users_count;
		SUGAR.toggleBoostOption();
	}
	SUGAR.toggleBoostOption = function(){
		if(SUGAR.AJAXINPROGRESS && SUGAR.AJAXINPROGRESS === true){
			return ;
		}
		if(!isNumber(document.getElementById("boost_users_count").value)){
			document.getElementById("boost_users_count").value="";
		}
		if(document.getElementById("boost_users_count").value == "" ||  SUGAR.enabled_users_count > document.getElementById("boost_users_count").value){
			document.getElementById("boost_users_count").value = SUGAR.enabled_users_count;
		}
		
		if(SUGAR.enabled_users_count > licensed_users){
			document.getElementById("tr_boost_users_count").style.display="";
			document.getElementById("USERS_LIMIT_EXCEEDED").style.display="";
			
		}else{
			document.getElementById("tr_boost_users_count").style.display="none";
			document.getElementById("USERS_LIMIT_EXCEEDED").style.display="none";
			document.getElementById("boost_users_count").value="";
		}
	}
	SUGAR.showGSynLicenseHTML = function (){
		document.getElementById("table_boost_license").style.display="none";
		document.getElementById("table_boost_users_license_key").style.display="";
	}
	SUGAR.hideGSynLicenseHTML = function (){
		document.getElementById("table_boost_license").style.display="";
		document.getElementById("table_boost_users_license_key").style.display="none";
		SUGAR.toggleBoostOption();
	}
	SUGAR.userDisabledTable = new YAHOO.SUGAR.DragDropTable(
		"disabled_subpanels_div",
		[{key:"label",  label: lbldisabled_users, width: 200, sortable: false},
		 {key:"user", label: lbldisabled_users, hidden:true}],
		new YAHOO.util.LocalDataSource(disabled_users, {
			responseSchema: {
			   fields : [{key : "user"}, {key : "label"}]
			}
		}),
		{
		 	height: "300px",
		 	group: ["enabled_subpanels_div", "disabled_subpanels_div"]
		}
	);
	SUGAR.userEnabledTable.on('mouseenter', function(ev) {
		SUGAR.updateGSynUserCountHTML();
	});
	SUGAR.userDisabledTable.on('mouseenter', function(ev) {
		SUGAR.updateGSynUserCountHTML();
	});
	SUGAR.userEnabledTable.disableEmptyRows = true;
	SUGAR.userDisabledTable.disableEmptyRows = true;
	SUGAR.userEnabledTable.addRow({user: "", label: ""});
	SUGAR.userDisabledTable.addRow({user: "", label: ""});
	SUGAR.userEnabledTable.render();
	SUGAR.userDisabledTable.render();
	SUGAR.saveConfigureTabs = function()
	{
		if(SUGAR.AJAXINPROGRESS && SUGAR.AJAXINPROGRESS === true){
			alert("Ajax inprogress.");
			return ;
		}
		var enabledTable = SUGAR.userEnabledTable;
		var users = [];
		var enabled=enabledTable.getRecordSet().getLength();
		for(var i=0; i < enabled; i++){
			var data = enabledTable.getRecord(i).getData();
			if (data.user && data.user != '')
			    users[i] = data.user;
		}
		YAHOO.util.Dom.get('enabled_tabs').value = YAHOO.lang.JSON.stringify(users);
		var disabledTable = SUGAR.userDisabledTable;
		var users = [];
		for(var i=0; i < disabledTable.getRecordSet().getLength(); i++){
			var data = disabledTable.getRecord(i).getData();
			if (data.user && data.user != '')
			    users[i] = data.user;
		}
		YAHOO.util.Dom.get('disabled_tabs').value = YAHOO.lang.JSON.stringify(users);
		if(licensed_users!='unlimited' && (enabled-1) > licensed_users){
			
			alert('Your current subscription allow only '+licensed_users+' user(s)');
		}else{
			document.ConfigureTabs.submit();
		}
	}
	SUGAR.cancelConfigureTabs = function(){
		if(SUGAR.AJAXINPROGRESS && SUGAR.AJAXINPROGRESS === true){
			alert("Ajax in progress.");
			return ;
		}
		document.ConfigureTabs.action.value='index'; 
		document.ConfigureTabs.module.value='Administration';
		document.ConfigureTabs.submit();
	}
	SUGAR.dragAllToRight = function()
	{
		var disabledTable = SUGAR.userDisabledTable;
		var endLoop=disabledTable.getRecordSet().getLength()-1;
		var enabled=SUGAR.userEnabledTable.getRecordSet().getLength()-1;
		for(var i=0; i < endLoop; i++){
			var data = disabledTable.getRecord(i).getData();
			SUGAR.userEnabledTable.addRow({user: data.user, label: data.label},enabled+i);
		}
		for(var i=0; i < endLoop; i++){
			SUGAR.userDisabledTable.deleteRow(0);
		}
		SUGAR.updateGSynUserCountHTML();
	}
	
	SUGAR.outfitters_increase_license = function ()
	{
		if(SUGAR.AJAXINPROGRESS ){
			alert("Ajax inprogress.");
			return ;
		}else{
			var user_count=document.getElementById("boost_users_count").value;
			if(isNumber(user_count) ){
				user_count = parseInt(user_count);
				if(user_count > licensed_users){
					document.getElementById("boost_users_count").value = user_count;//after parseint if entered 20.00
					SUGAR.boost_users_count = user_count;
					SUGAR.outfitters_increase_license_continue();
				}else{
					//boost user count should be greater than already licensed users
					alert("Boost user count should be greater than licensed users ");
				}
			}else{
				alert("Not a valid user count");
				document.getElementById("boost_users_count").value=SUGAR.enabled_users_count;
			}
		}
	}
	SUGAR.outfitters_increase_license_continue = function(){
		var licKey = document.getElementById('outfitters_license_key').value;
		if(!licKey || !licKey.trim()) {
			document.getElementById('outfitters_license_key').value="";
			return false;
		}
		SUGAR.AJAXINPROGRESS=true;
		var increase_to = SUGAR.boost_users_count;
		
		YUI().use('node', function(Y) {
			Y.one('#outfitters_increasing_license').show();
			Y.one('#outfitters_license_increase').hide();
		});
		
		var callback = 
		{ 
			success:outfitters_increase_license_handleSuccess, 
			failure: outfitters_increase_license_handleFailure, 
			argument: [] 
		};
		var postData='method=change&key='+licKey+'&user_count='+increase_to;
		var request = YAHOO.util.Connect.asyncRequest('POST', 'index.php?module=Schedulers&action=outfitterscontroller&to_pdf=1', callback, postData); 
		return false;
		
	}
	var outfitters_increase_license_handleSuccess = function(o){ 
		SUGAR.AJAXINPROGRESS=false;
		var response=JSON.parse(o.responseText);
		YUI().use('node', function(Y) {
			Y.one('#outfitters_increasing_license').hide();
			Y.one('#outfitters_license_increase').show();
			if (response.licensed_user_count){
				document.getElementById('licensed_users_count').innerHTML=response.licensed_user_count;
				licensed_users=response.licensed_user_count;
				SUGAR.saveConfigureTabs();
			} else {
				alert('Unexpected data returned from the server.');
			}
		});	
	} 
	var outfitters_increase_license_handleFailure = function(o){
		SUGAR.AJAXINPROGRESS=false;
		YUI().use('node', function(Y) {
			Y.one('#outfitters_increasing_license').hide();
			Y.one('#outfitters_license_increase').show();
			alert('Error: '+o.responseText);
		});	
		
	}
	var isNumber = function(n) {
	  return !isNaN(parseInt(n)) && isFinite(n) && parseFloat(n) == parseInt(n);
	}
	var validateInpud = function(){
		var boost_users_count = document.getElementById("boost_users_count").value;
		if(boost_users_count!="" && !isNumber(boost_users_count)){
			document.getElementById("boost_users_count").value="";
		}
	}
	var attachListeners = function(){
		var boost_users_count = document.getElementById("boost_users_count");
		if(boost_users_count.addEventListener){
			boost_users_count.addEventListener("change", validateInpud, false);
		}
		else{
			boost_users_count.attachEvent("onchange", validateInpud);
		}
	}
	YAHOO.util.Event.onDOMReady(attachListeners)
	SUGAR.updateGSynUserCountHTML();
{/literal}
</script>