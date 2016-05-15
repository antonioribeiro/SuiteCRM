
YAHOO.util.Event.onDOMReady(addCustomButton);
function addCustomButton() {

    var gmail_id = document.getElementById('gmail_id');
    var gmail_password = document.getElementById('gmail_pass');
    if (gmail_id && gmail_password) {
        var ggparent = gmail_id.parentNode.parentNode.parentNode;
		var TR= document.createElement('TR');
		var TD= document.createElement('TD');
        var button = document.createElement('button');
        button.name = 'gmail_test_connection';
        button.value = 'Test Connection';
        button.id = 'gmail_test_connection';
        button.class = 'button';
        button.innerHTML = 'Test Connection';
        TD.appendChild(button);
        TR.appendChild(TD);
        ggparent.appendChild(TR);
        YUI().use('event', function (Y) {
            var button = Y.one('#gmail_test_connection');
            button.on('click', function (e) { 
                e.preventDefault();
				document.getElementById('gmail_test_connection').disabled = true;
                testconnention();

            });
        });
    }
}
var testconnection_Callback = {

    success: function (o) {
        alert(o.responseText);
		document.getElementById('gmail_test_connection').disabled = false;
    },
    failure: function (o) {
        alert(o.responseText);
		document.getElementById('gmail_test_connection').disabled = false;
    },

};
function testconnention() {
	
    var id = document.getElementById('gmail_id').value;
    var password = document.getElementById('gmail_pass').value;
    if (id == '' || password == ''){
        alert('Enter Gmail credentials');
		document.getElementById('gmail_test_connection').disabled = false;
	}
    else
	{
		
        YAHOO.util.Connect.asyncRequest('POST', 'index.php?action=testGmailConnection&module=Users&to_pdf=true', testconnection_Callback, 'gmailid=' + encodeURIComponent(id) + '&gmailpass=' + encodeURIComponent(password));
		
	}
}