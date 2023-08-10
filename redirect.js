
//funciones admin
function dashboardadmi() {
  window.location.href = "admindash.php";
}

function menuadmin() {
  const dropdownContent = document.querySelector(".dropdown-content");
  dropdownContent.classList.toggle("hidden");
}



function permisos() {
    window.location.href = "adminperm.php";
}
function editper(dni, usuario, estado) {
  document.getElementById("editpermiso").classList.remove("hidden");
  document.getElementById('usuarioValue').textContent = usuario;
  document.getElementById('estadoValue').textContent = estado;
  document.getElementById('dniInput').value = dni;
  console.log("Se hizo clic en el botón de la fila con DNI: " + dni);

  document.getElementById('cancelButton').addEventListener('click', function() {
  document.getElementById('editpermiso').classList.add('hidden');
  });

  document.getElementById('saveButton').addEventListener('click', function() {
  document.getElementById('editpermiso').classList.add('hidden');
    });
}




function maestros() {
  window.location.href = "adminmaes.php";
}
function addmaes(dni) {
  document.getElementById("addmaestro").classList.remove("hidden");
  document.getElementById('dniInput').value = dni;

  document.getElementById('cancelButton').addEventListener('click', function() {
  document.getElementById('addmaestro').classList.add('hidden');
  });

  document.getElementById('saveButton').addEventListener('click', function() {
  document.getElementById('addmaestro').classList.add('hidden');
    });
}





function alumnos() {
  window.location.href = "adminalum.php";
}
function editalum(dni, usuario, nombre, estado, direccion, nacimiento) {
  document.getElementById("editalumno").classList.remove("hidden");
  document.getElementById('dniInput').value = dni;
  document.getElementById('dniValue').textContent = dni;
  document.getElementById('usuarioValue').textContent = usuario;
  document.getElementById('nombreValue').textContent = nombre;
  document.getElementById('estadoValue').textContent = estado;
  document.getElementById('direccionValue').textContent = direccion;
  document.getElementById('nacimientoValue').textContent = nacimiento;

  document.getElementById('cancelButton').addEventListener('click', function() {
  document.getElementById('editalumno').classList.add('hidden');
  });

  document.getElementById('saveButton').addEventListener('click', function() {
  document.getElementById('editalumno').classList.add('hidden');
    });
}


function clases() {
  window.location.href = "adminclass.php";
}





//funciones maestro
function dashboardmaes() {
  window.location.href = "maestrodash.php";
}

function alumno() {
  window.location.href = "maestroalum.php";
}





//funciones alumno
function dashboardalumn() {
  window.location.href = "alumndash.php";
}

function calificacion() {
  window.location.href = "alumncal.php";
}

function clase() {
  window.location.href = "alumnclas.php";
}


//cerrar sesion
function logout() {
  fetch('logout.php')
      .then(response => response.text())
      .then(data => {
          if (data === 'logout') {
              window.location.href = 'index.php';
          }
      })
      .catch(error => console.error('Error:', error));
}