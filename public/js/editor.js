function edit(local, visitante, torneo, fecha){

  var x = document.getElementById("table-partidos").rows;
  console.log(x);
  var row = -1;
  var encontre = false;
  for(var i = 0; i < x.length; i++){//rows
    for(var j = 0; j < x[i].cells.length; j++){//columns
      console.log(x[i].cells[j].textContent.trim());
      if(x[i].cells[j].textContent.trim() === local){
        //encontre el local, veo si el que sigue es el visitante
        if(x[i].cells[j+6].textContent.trim() === visitante){//4 porque es la ultima columna
          encontre = true;
          row = i;
          break;
        }
      }
      break;
    }
    if(encontre)
      break;
  }

  //CREO EL JSON
  var obj = new Object();
  obj.local = x[row].cells[0].textContent.trim();
  obj.visitante  = x[row].cells[6].textContent.trim();
  obj.puntosLocal = x[row].cells[2].firstChild.value;
  obj.puntosVisitante = x[row].cells[4].firstChild.value;
  obj.fecha = fecha;
  obj.torneo = torneo;

  console.log(obj);

  //POST
  // construct an HTTP request
  var xhr = new XMLHttpRequest();

  var URL = '../editor/update';
  xhr.open('POST', URL, true);

  xhr.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
  xhr.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr("content"));

  // send the collected data as JSON
  xhr.send(JSON.stringify(obj));
}
