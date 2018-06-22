function decrease() {
	var num = document.getElementById("maxp").value;
	num--;
	if (num <= 12 && num >= 5)
		document.getElementById("maxp").value = num;
}

function increase() {
	var num = document.getElementById("maxp").value;

	num++;

	if (num <= 12 && num >= 5)
		document.getElementById("maxp").value = num;
}

function decreaseby2() {
	var num = document.getElementById("teams").value;

	num--;
	num--;

	if (num <= 32 && num >= 2)
		document.getElementById("teams").value = num;
}

function increaseby2() {
	var num = document.getElementById("teams").value;

	num++;
	num++;

	if (num <= 32 && num >= 2)
		document.getElementById("teams").value = num;
}

$(document).ready(function(){
		document.getElementById("maxp").value = 5;
		document.getElementById("teams").value = 2;
	});

/*function GetSelectedItem(el, torneo){
    var e = document.getElementById(el);
    var strSel = e.options[e.selectedIndex].text;
		if(strSel !== 'Users'){
			updateEditors(strSel, torneo);
		}
		else {
			alert('Select a valid user.');
		}
}

function updateEditors(email, tname){
	var json = {
		torneo: tname,
		user: email
	}

	// construct an HTTP request
	var xhr = new XMLHttpRequest();
	var URL = './add-editors';
	xhr.open('POST', URL, true);
	xhr.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
	//var token = $("meta[name='csrf-token']").attr("content");
	xhr.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr("content"));

	// send the collected data as JSON
	console.log(json);
	xhr.send(JSON.stringify(json));
}*/
