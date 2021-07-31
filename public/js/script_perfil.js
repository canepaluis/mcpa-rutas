let url = "http://localhost/peu_upqroo/";


$(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
      $('#sidebar, .content').toggleClass('active');
      $('.collapse.in').toggleClass('in');
      $('a[aria-expanded=true]').attr('aria-expanded', 'false');
      document.getElementById("bodyContent").style.width="100%";
    });
});

/*buscador administrativo */
function buscar_administrativo(){
  let buscar = document.getElementById("buscar").value;
  let perfil = document.getElementById("perfil").value;
  let carrera = document.getElementById("carrera").value;
  let pagina = 1;

  location.href = url + "perfil_administrativo/buscador/" + buscar + "/" + perfil + "/" + carrera + "/" + pagina;
}


function definirSeccionAlumno(matricula,i){
  let seccionSeleccionado = document.getElementById('seccion'+ i).value;
  console.log(seccionSeleccionado);
  location.href= url +"perfil_administrativo_resultados/alumno/" + matricula + "/" + seccionSeleccionado;
}

function definirSeccionDirector(numcontrol,i){
  let seccionSeleccionado = document.getElementById('seccion'+i).value;
  console.log(seccionSeleccionado);
  location.href= url + "perfil_administrativo_resultados/director/" + numcontrol + "/" + seccionSeleccionado;
}

function definirSeccionDocente(numcontrol,i){
  let seccionSeleccionado = document.getElementById('seccion'+i).value;
  console.log(seccionSeleccionado);
  location.href= url +"perfil_administrativo_resultados/docente/" + numcontrol + "/" + seccionSeleccionado;
}
/*buscador administrativo */


/*buscador administrador */

function buscar_administrador(){
  let buscar = document.getElementById("buscar").value;
  let perfil = document.getElementById("perfil").value;
  let carrera = document.getElementById("carrera").value;
  let pagina = 1;

  location.href = url + "perfil_administrador/buscador/" + buscar + "/" + perfil + "/" + carrera + "/" + pagina;
}

function definirSeccionAlumnoAdministrador(matricula,i){
  let seccionSeleccionado = document.getElementById('seccion'+ i).value;
  console.log(seccionSeleccionado);
  location.href= url +"perfil_administrador_resultados/alumno/" + matricula + "/" + seccionSeleccionado;
}

function definirSeccionDirectorAdministrador(numcontrol,i){
  let seccionSeleccionado = document.getElementById('seccion'+i).value;
  console.log(seccionSeleccionado);
  location.href= url + "perfil_administrador_resultados/director/" + numcontrol + "/" + seccionSeleccionado;
}

function definirSeccionDocenteAdministrador(numcontrol,i){
  let seccionSeleccionado = document.getElementById('seccion'+i).value;
  console.log(seccionSeleccionado);
  location.href= url +"perfil_administrador_resultados/docente/" + numcontrol + "/" + seccionSeleccionado;
}

function definirSeccionAdministrativoAdministrador(numcontrol,i){
  let seccionSeleccionado = document.getElementById('seccion'+i).value;
  console.log(seccionSeleccionado);
  location.href= url +"perfil_administrador_resultados/administrativo/" + numcontrol + "/" + seccionSeleccionado;
}

function cambiarlengua(){
  let grupoSeleccionado = document.getElementById("grupo_indigena").value;
  let array = grupoSeleccionado.split("-");
  let lengua = array[1];

  document.getElementById("lengua_indigena").value = lengua; 
}

/*buscador administrador */

/*reportes administrativo */

function pdfAlumno(matricula, i){
  let seccionSeleccionado = document.getElementById('seccion'+i).value;
  let win = window.open('./../../controllers/administrativo/imprimir_ejemplo.php?matricula='+matricula + "&seccion=" + seccionSeleccionado, '_blank');
  win.focus();
}


