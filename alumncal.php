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
    <title>Student Dashboard</title>
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
                <p class="flex justify-center text-gray-300 pb-4 text-sm">MENU STUDENT</p>
                <div class="flex flex-col items-start gap-3">
                    <button class="text-gray-300 hover:translate-y-[-4px]" onclick="calificacion()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-data-fill w-custom-20 h-custom-20 inline-block align-text-center mr-4" viewBox="0 0 16 16">
                            <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z" />
                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1ZM10 8a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V8Zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1Zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1Z" />
                        </svg>Qualification</button>
                    <button class="text-gray-300 hover:translate-y-[-4px]" onclick="clase()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace w-custom-20 h-custom-20 inline-block align-text-center mr-4" viewBox="0 0 16 16">
                            <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                            <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" />
                        </svg>Classes</button>
                </div>
            </div>
        </div>
        <div class="flex flex-col">
        <div class="w-custom-1100 flex justify-between h-15 p-3 bg-slate-50">
                <button class="w-custom-60 text-center hover:bg-gray-300 rounded-md" onclick="dashboardalumn()">Home</button>
                <button class="px-2 py-2 flex justify-center hover:bg-gray-300 rounded-md" onclick="menuadmin()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill text-gray-400 w-custom-20 h-custom-20 inline-block mr-0" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                    </svg></button>
                <div class=" p-1 hidden flex-col dropdown-content absolute bg-white mt-12 py-1 end-3 rounded-md shadow-md">
                    <button class="w-custom-100 px-3 py-2 hover:bg-gray-100 rounded-md">Perfil</button>
                    <button class="w-custom-100 px-3 py-2 hover:bg-gray-100 rounded-md" onclick="logout()">Logout</button>
                </div>
            </div>
            <div>
                <p class="p-3 text-bold text-2xl">Qualification and Message</p>
                <div class="w-custom-1150 h-10 p-1.5 bg-slate-50 border-b-2 flex justify-between">
                    <p>Qualification and Message Class</p>
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
                            <div class="w-custom-300 border-2 border-slate-900 flex items-center p-2 font-bold">Class Name</div>
                            <div class="w-custom-300 border-2 border-slate-900 flex items-center p-2 font-bold">Qualifiction</div>
                            <div class="w-custom-300 border-2 border-slate-900 flex items-center p-2 font-bold">Message</div>
                        </div>
                        <?php
                        $contador = 1;
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            echo "<div class='w-custom-1100 h-custom-40 flex bg-slate-500 border-2 border-slate-900'>";
                            echo "<div class='w-custom-300 border-2 border-slate-900 flex items-center p-2'>" . $contador . "</div>";
                            echo "<div class='w-custom-300 border-2 border-slate-900 flex items-center p-2'>" . $fila['clase'] . "</div>";
                            echo "<div class='w-custom-300 border-2 border-slate-900 flex items-center p-2'> " . "</div>";
                            echo "<div class='w-custom-300 border-2 border-slate-900 flex items-center p-2'> " . "</div>";
                            echo "</div>";

                            $contador++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>