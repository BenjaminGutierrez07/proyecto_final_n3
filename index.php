<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Document</title>
</head>

<body class=" bg-amber-100">
    <main class="h-screen flex flex-col justify-top items-center gap-3">
        <img class="w-custom-300 h-custom-300" src="./assets/logo.jpg" alt="logo">
        <form class="w-1/3 h-52 p-6 flex flex-col bg-white rounded-md justify-top items-center gap-3" method="post" action="">
            <p>Welcome please enter your user and password</p>
            <div class="relative">
                <input class="w-custom-300 h-10 p-3 border-2 rounded-md" type="email" name="email" placeholder="Email">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill absolute right-3 top-4 w-custom-20 h-custom-20 text-gray-300" viewBox="0 0 16 16">
                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                </svg>
            </div>
            <div class="relative">
                <input class="w-custom-300 h-10 p-3 border-2 rounded-md" type="email" name="email" placeholder="Email">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill absolute right-3 top-4 w-custom-20 h-custom-20 text-gray-300" viewBox="0 0 16 16">
                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                </svg>
            </div>
            <div class="w-custom-300 flex justify-end">
                <button class="w-custom-100 h-custom-30 bg-blue-500 text-white rounded-md">Log in </button>
            </div>
        </form>
        <?php

        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $correo = $_POST["email"];
            $contrasena = $_POST["password"];

            $conexion = mysqli_connect("localhost", "root", "", "proyecto_final");

            if (!$conexion) {
                die("Error de conexión: " . mysqli_connect_error());
            }

            $consulta = "SELECT * FROM administrador WHERE usuario='$correo' AND contrasena='$contrasena'";
            $resultado = mysqli_query($conexion, $consulta);

            if ($resultado && mysqli_num_rows($resultado) > 0) {
                $fila = mysqli_fetch_assoc($resultado);


                if ($fila['permiso'] == 'Administrador') {
                    $_SESSION['user_permiso'] = 'admin';
                    header("Location: admindash.php");
                    exit();
                } elseif ($fila['permiso'] == 'Maestro') {
                    $_SESSION['user_permiso'] = 'maestro';
                    header("Location: maestrodash.php");
                    exit();
                } elseif ($fila['permiso'] == 'Alumno') {
                    $_SESSION['user_permiso'] = 'alumno';
                    header("Location: alumndash.php");
                    exit();
                }
            } else {

                echo  "<div class='text-blue'>Invalid Credential try again</div>";
            }

            mysqli_close($conexion);
        }
        ?>
    </main>
</body>

</html>