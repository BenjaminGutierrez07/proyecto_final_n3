<?php
session_start();

if (!isset($_SESSION['user_permiso'])) {
    header("Location: login.php");
    exit();
}

require "connection.php";

$consulta = "SELECT * FROM administrador";
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
    <title>Teacher Dashboard</title>
</head>

<body class="bg-slate-200">
    <main class="h-screen flex">
        <div class="w-custom-300 h-custom-660 bg-zinc-700">
            <div class="flex items-center p-3 gap-2 border-b-2">
                <img class="w-custom-30 h-custom-30 rounded-full" src="./assets/logo.jpg">
                <p class="text-gray-300">University</p>
            </div>
            <div class="p-3 border-b-2">
                <p class="text-gray-300">Teacher</p>
                <p class="text-gray-300">teacher teacher</p>
            </div>
            <div class="p-5 flex flex-col">
                <p class="flex justify-center text-gray-300 pb-4 text-sm">MENU TEACHER</p>
                <div class="flex flex-col items-start">
                <button class="text-gray-300 hover:translate-y-[-4px]" onclick="alumno()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mortarboard-fill w-custom-20 h-custom-20 inline-block align-text-center mr-4" viewBox="0 0 16 16">
                            <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z" />
                            <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z" />
                        </svg>Students</button>
                </div>
            </div>
        </div>
        <div class="flex flex-col">
        <div class="w-custom-1100 flex justify-between h-15 p-3 bg-slate-50">
                <button class="w-custom-60 text-center hover:bg-gray-300 rounded-md" onclick="dashboardmaes()">Home</button>
                <button class="px-2 py-2 flex justify-center hover:bg-gray-300 rounded-md" onclick="menuadmin()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill text-gray-400 w-custom-20 h-custom-20 inline-block mr-0" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                    </svg></button>
                <div class=" p-1 hidden flex-col dropdown-content absolute bg-white mt-12 py-1 end-3 rounded-md shadow-md">
                    <button class="w-custom-100 px-3 py-2 hover:bg-gray-100 rounded-md">Perfil</button>
                    <button class="w-custom-100 px-3 py-2 hover:bg-gray-100 rounded-md" onclick="logout()">Logout</button>
                </div>
            </div>
            <div>
            <p class="p-3 text-bold text-2xl">History student list</p>
            <div class="w-custom-1150 h-10 p-1.5 bg-slate-50 border-b-2 flex justify-between">
                <p>History Students list</p>
            </div>
            <div class="w-full h-custom-450 p-4 bg-slate-50 rounded-b-lg">
                <div class="flex justify-between">
                    <div class="w-64 p-1 flex bg-slate-700 gap-3 rounded-md">
                        <button class="text-gray-300">Copy</button>
                        <button class="text-gray-300">Exel</button>
                        <button class="text-gray-300">PDF</button>
                        <button class="text-gray-300">Column visibility</button>
                    </div>
                    <div class="flex justify-center items-center gap-3">
                        <p>Search</p>
                        <input class="w-20 h-8 border-2 rounded-md">
                    </div>
                </div>
                <div class="w-custom-1100 flex flex-col p-2">
                    <div class="w-custom-1100 h-custom-40 flex bg-white">
                        <div class="w-custom-300 border-2 border-slate-900 flex items-center p-2 font-bold">ID</div>
                        <div class="w-custom-300 border-2 border-slate-900 flex items-center p-2 font-bold">Student Name</div>
                        <div class="w-custom-300 border-2 border-slate-900 flex items-center p-2 font-bold">Qualifiction</div>
                        <div class="w-custom-300 border-2 border-slate-900 flex items-center p-2 font-bold">Message</div>
                        <div class="w-custom-300 border-2 border-slate-900 flex items-center p-2 font-bold">Editar</div>
                    </div>
                    <?php
                    $contador = 1;
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        if ($fila['permiso'] == 'Alumno' && $fila['clase'] == 'Historia') {
                            echo "<div class='w-custom-1100 h-custom-40 flex bg-slate-500 border-2 border-slate-900'>";
                            echo "<div class='w-custom-220 border-2 border-slate-900 flex items-center p-2'>" . $contador . "</div>";
                            echo "<div class='w-custom-220 border-2 border-slate-900 flex items-center p-2'>" . $fila['nombre'] . "</div>";
                            echo "<div class='w-custom-220 border-2 border-slate-900 flex items-center p-2'> " . "</div>";
                            echo "<div class='w-custom-220 border-2 border-slate-900 flex items-center p-2'> Sin Mensajes" . "</div>";
                            echo "<button class='w-custom-220 border-2 border-slate-900 flex justify-center items-center p-2'>Editar" . "</button>";
                            echo "</div>";
                            $contador++;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        </div>
    </main>
</body>
</html>