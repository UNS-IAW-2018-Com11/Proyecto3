window.onload = function() {
    checkMode();
}

function checkMode() {
	console.log("hola");
	var oldlink = document.getElementsByTagName("link").item(1);// SIEMPRE ES 1
	console.log(oldlink);
	var newlink = document.createElement("link");
	newlink.setAttribute("rel", "stylesheet");
	newlink.setAttribute("type", "text/css");


	var estilo = localStorage.getItem("estilo");
	var file;
	if (estilo === null) {
		console.log("estilo null");
		localStorage.setItem("estilo", "classic");
		file = "../public/css/estilo.css";
	//	file = "{{asset('css/estilo.css')}}";
		estilo = "classic";
	} else {
		if (estilo === "classic") {
			console.log("entre");
			//file = "{{asset('css/estilo.css')}}";
			file = "../public/css/estilo.css";
		} else {
			//file = "{{asset('css/estilo-alt.css')}}";
			file = "../public/css/estilo-alt.css";
		}
	}

	var toggleButton = document.getElementById("toggleButton");
	console.log(toggleButton);
	if (estilo === "classic") {
		toggleButton.innerHTML = "Dark Mode";
	} else {
		toggleButton.innerHTML = "Classic Mode";
	}

	newlink.setAttribute("href", file);
	console.log(newlink);
	document.getElementsByTagName("head").item(0)
			.replaceChild(newlink, oldlink);
}

function toggleMode() {

	var estilo = localStorage.getItem("estilo");
	var toggleButton = document.getElementById("toggleButton");

	if (estilo === null) {
		console.log("hola");
		localStorage.setItem("estilo", "dark");
		toggleButton.innerHTML = "Classic Mode";
	} else {
		if (estilo === "classic") {
				console.log("hola1");
			toggleButton.innerHTML = "Classic Mode";
			localStorage.setItem("estilo", "dark");
		} else {
				console.log("hola2");
			toggleButton.innerHTML = "Dark Mode";
			localStorage.setItem("estilo", "classic");
		}
	}

	var oldlink = document.getElementsByTagName("link").item(1);// SIEMPRE ES 1

	var newlink = document.createElement("link");
	newlink.setAttribute("rel", "stylesheet");
	newlink.setAttribute("type", "text/css");

	//var file = localStorage.getItem("estilo") === "classic" ? "{{asset('css/estilo.css')}}"
		//	: "{{asset('css/estilo-alt.css')}}";
	var file = localStorage.getItem("estilo") === "classic" ? "../public/css/estilo.css"
			: "../public/css/estilo-alt.css";

	newlink.setAttribute("href", file);
	console.log(newlink);

	document.getElementsByTagName("head").item(0)
			.replaceChild(newlink, oldlink);
}
