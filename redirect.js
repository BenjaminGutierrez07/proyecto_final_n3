
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

function maestros() {
  window.location.href = "adminmaes.php";
}

function alumnos() {
  window.location.href = "adminalum.php";
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