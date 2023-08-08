<?php
session_start();

if (!isset($_SESSION['user_permiso'])) {
    header("Location: login.php");
    exit();
}

require "connection.php";

$consulta = "SELECT * FROM clases";
$resultado = mysqli_query($connection, $consulta);


if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <script src="./redirect.js"></script>
    <title>Admin Dashboard Read</title>
</head>

<body class="bg-slate-200">
    <main class="h-screen flex">
        <div class="w-custom-300 h-custom-660 bg-zinc-700">
            <div class="flex items-center p-3 gap-2 border-b-2">
                <img class="w-custom-30 h-custom-30 rounded-full" src="./assets/logo.jpg">
                <p class="text-gray-300">University</p>
            </div>
            <div class="p-3 border-b-2">
                <p class="text-gray-300">Studnet</p>
                <p class="text-gray-300">Name</p>
            </div>
            <div class="p-5 flex flex-col">
                <p class="flex justify-center text-gray-300 pb-4 text-sm">MENU TEACHER</p>
                <div class="flex flex-col items-start">
                    <button class="text-gray-300" onclick="calificacion()">Qualification</button>
                    <button class="text-gray-300" onclick="clase()">Classes Management</button>
                </div>
            </div>
        </div>
        <div class="flex flex-col">
        <div class="w-custom-1100 flex justify-between h-15 p-3 bg-slate-50">
                <button>Home</button>
                <button class="bg-blue-500 text-white px-3 py-1 rounded-md" onclick="menuadmin()">Perfil</button>
                <div class=" p-1 hidden flex-col dropdown-content absolute bg-white mt-12 py-1 end-3 rounded-md shadow-md">
                    <button class="w-custom-100 px-3 py-2 hover:bg-gray-100 rounded-md">Perfil</button>
                    <button class="w-custom-100 px-3 py-2 hover:bg-gray-100 rounded-md" onclick="logout()">Logout</button>
                </div>
            </div>
            <div>
                <p class="p-3 text-bold text-2xl">Class Schema</p>
                <div class="w-custom-1150 h-10 p-1.5 bg-slate-50 border-b-2 flex justify-between">
                    <p>Your Register Subject</p>
                </div>
                <div class="w-full h-custom-450 p-4 bg-slate-50 rounded-b-lg">
                    <div class="flex gap-6">
                        <div class="w-custom-750 flex flex-col p-2">
                            <div class="w-custom-750 h-custom-40 flex bg-white">
                                <div class="w-custom-300 border-2 border-slate-900 flex items-center p-2 font-bold">#</div>
                                <div class="w-custom-300 border-2 border-slate-900 flex items-center p-2 font-bold">Class</div>
                                <div class="w-custom-300 border-2 border-slate-900 flex items-center p-2 font-bold">Unsubscribe</div>
                            </div>
                            <?php
                            $contador = 1;
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                echo "<div class='w-custom-750 h-custom-40 flex bg-slate-500 border-2 border-slate-900'>";
                                echo "<div class='w-custom-300 border-2 border-slate-900 flex items-center p-2'>" . $contador . "</div>";
                                echo "<div class='w-custom-300 border-2 border-slate-900 flex items-center p-2'>" . $fila['clase'] . "</div>";
                                echo "<button class='w-custom-300 border-2 border-slate-900 flex justify-center items-center p-2'>Editar" . "</button>";
                                echo "</div>";

                                $contador++;
                            }
                            ?>
                        </div>
                        <div class="w-custom-300 flex flex-col p-2">
                            <div class="h-custom-40 p-2 bg-white border-2 border-slate-900 font-bold">
                                Enroll
                            </div>
                            <div class="h-custom-40 p-2 bg-slate-500 border-2 border-slate-900">
                                Subjects
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>