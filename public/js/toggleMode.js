window.onload = function() {
    checkMode();
}

function checkMode() {
  var estiloriginal = window.location.protocol + "//" + window.location.host + "/css/estilo.css";
  var estiloalternativo = window.location.protocol + "//" + window.location.host + "/css/estilo-alt.css";

	var oldlink = document.getElementsByTagName("link").item(1);// SIEMPRE ES 1
	var newlink = document.createElement("link");
	newlink.setAttribute("rel", "stylesheet");
	newlink.setAttribute("type", "text/css");


	var estilo = localStorage.getItem("estilo");
	var file;
	if (estilo === null) {

		localStorage.setItem("estilo", "classic");
	//	  file = "{{asset('css/estilo.css')}}";
    file = estiloriginal;
  //	file = "https://localhost/Proyecto3/public/css/estilo.css";
		estilo = "classic";
	} else {
		if (estilo === "classic") {

			//file = "{{asset('css/estilo.css')}}";
      //file = "../../public/css/estilo.css"
			//file = "https://localhost/Proyecto3/public/css/estilo.css";
      file = estiloriginal;
		} else {
			//file = "{{asset('css/estilo-alt.css')}}";
      //file = "../../public/css/estilo-alt.css"
      //file = "https://localhost/Proyecto3/public/css/estilo-alt.css"
      file = estiloalternativo;
		}
	}

	var toggleButton = document.getElementById("toggleButton");

	if (estilo === "classic") {
		toggleButton.innerHTML = "Dark Mode";
	} else {
		toggleButton.innerHTML = "Classic Mode";
	}

	newlink.setAttribute("href", file);

	document.getElementsByTagName("head").item(0)
			.replaceChild(newlink, oldlink);
}

function toggleMode() {
  var estiloriginal = window.location.protocol + "//" + window.location.host + "/css/estilo.css";
  var estiloalternativo = window.location.protocol + "//" + window.location.host + "/css/estilo-alt.css";

	var estilo = localStorage.getItem("estilo");
	var toggleButton = document.getElementById("toggleButton");

	if (estilo === null) {

		localStorage.setItem("estilo", "dark");
		toggleButton.innerHTML = "Classic Mode";
	} else {
		if (estilo === "classic") {

			toggleButton.innerHTML = "Classic Mode";
			localStorage.setItem("estilo", "dark");
		} else {

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
	var file = localStorage.getItem("estilo") === "classic" ? estiloriginal
			: estiloalternativo;

	newlink.setAttribute("href", file);


	document.getElementsByTagName("head").item(0)
			.replaceChild(newlink, oldlink);
}
