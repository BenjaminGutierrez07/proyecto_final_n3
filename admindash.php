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
    <title>Admin Dashboard</title>
</head>

<body class="bg-slate-200">
    <main class="h-screen flex">
        <div class="w-custom-300 h-custom-660 bg-zinc-700">
            <div class="flex items-center p-3 gap-2 border-b-2">
                <img class="w-custom-30 h-custom-30 rounded-full" src="./assets/logo.jpg">
                <p class="text-gray-300">University</p>
            </div>
            <div class="p-3 border-b-2">
                <p class="text-gray-300">admin</p>
                <p class="text-gray-300">administrador</p>
            </div>
            <div class="p-5 flex flex-col">
                <p class="flex justify-center text-gray-300 pb-4 text-sm">MENU ADMINISTRAITOR</p>
                <div class="flex flex-col items-start gap-3">
                    <button class="text-gray-300 hover:translate-y-[-4px]" onclick="permisos()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-gear w-custom-20 h-custom-20 inline-block align-text-center mr-4" viewBox="0 0 16 16">
                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                        </svg>Permisos</button>
                    <button class="text-gray-300 hover:translate-y-[-4px]" onclick="maestros()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace w-custom-20 h-custom-20 inline-block align-text-center mr-4" viewBox="0 0 16 16">
                            <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                            <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" />
                        </svg>Teachers</button>
                    <button class="text-gray-300 hover:translate-y-[-4px]" onclick="alumnos()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mortarboard-fill w-custom-20 h-custom-20 inline-block align-text-center mr-4" viewBox="0 0 16 16">
                            <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z" />
                            <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z" />
                        </svg>Students</button>
                    <button class="text-gray-300 hover:translate-y-[-4px]" onclick="clases()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-easel2 w-custom-20 h-custom-20 inline-block align-text-center mr-4" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 0a.5.5 0 0 1 .447.276L8.81 1h4.69A1.5 1.5 0 0 1 15 2.5V11h.5a.5.5 0 0 1 0 1h-2.86l.845 3.379a.5.5 0 0 1-.97.242L12.11 14H3.89l-.405 1.621a.5.5 0 0 1-.97-.242L3.36 12H.5a.5.5 0 0 1 0-1H1V2.5A1.5 1.5 0 0 1 2.5 1h4.691l.362-.724A.5.5 0 0 1 8 0ZM2 11h12V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5V11Zm9.61 1H4.39l-.25 1h7.72l-.25-1Z" />
                        </svg>Classes</button>
                </div>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="w-custom-1100 flex justify-between h-15 p-3 bg-slate-50">
                <button class="w-custom-60 text-center hover:bg-gray-300 rounded-md" onclick="dashboardadmi()">Home</button>
                <button class="px-2 py-2 flex justify-center hover:bg-gray-300 rounded-md" onclick="menuadmin()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill text-gray-400 w-custom-20 h-custom-20 inline-block mr-0" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                    </svg></button>
                <div class=" p-1 hidden flex-col dropdown-content absolute bg-white mt-12 py-1 end-3 rounded-md shadow-md">
                    <button class="w-custom-100 px-3 py-2 hover:bg-gray-100 rounded-md">Perfil</button>
                    <button class="w-custom-100 px-3 py-2 hover:bg-gray-100 rounded-md" onclick="logout()">Logout</button>
                </div>
            </div>
            <div>
                <p class="p-3 text-bold text-2xl">Dashboard</p>
                <div class="w-custom-500 h-20 p-4 ml-3 bg-slate-50 rounded-md">
                    <p>Bienvenido</p>
                    <p>Choose a action you want to do in the left menu</p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>