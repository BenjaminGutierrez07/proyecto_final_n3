<?php
session_start();

if (!isset($_SESSION['user_permiso'])) {
    header("Location: login.php");
    exit();
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
                <p class="text-gray-300">Maestro</p>
                <p class="text-gray-300">maestro maestro</p>
            </div>
            <div class="p-5 flex flex-col">
                <p class="flex justify-center text-gray-300 pb-4 text-sm">MENU MAESTRO</p>
                <div class="flex flex-col items-start">
                    <button class="text-gray-300" onclick="alumno()">Students</button>
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
                <p class="p-3 text-bold text-2xl">Dashboard</p>
                <div class="w-custom-500 h-20 p-4 bg-slate-50">
                    <p>Bienvenido</p>
                    <p>Choose a action you want to do in the left menu</p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>