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
            <input class="w-96 h-10 p-3 border-2 rounded-md" type="email" name="email" placeholder="Email">
            <input class="w-96 h-10 p-3 border-2 rounded-md" type="password" name="password" placeholder="Password">
            <div class="w-96 flex justify-end">
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