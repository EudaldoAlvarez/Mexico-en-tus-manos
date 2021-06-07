<?php

include "../layouts/alerts.template.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />
    <link href="../assets/css/main.css" rel="stylesheet" />



    <title>México en tus manos</title>

</head>

<body>
    <!-- container -->
    <div class="inline-flex w-full bg-blue-400">
        <!-- tabla de información -->
        <div id="info" class="w-1/4 h-screen rounded-tr-xl rounded-br-xl bg-yellow-200 shadow-inner-md border-r-4 border-yellow-600">

            <div class="w-3/4 ml-4 md:ml-10 sm:ml-8 lg:ml-12">
                <a href="../index.php"><img src="../assets/img/logo3.png" alt=""></a>

            </div>
            <div id="menu" class="w-1/4 mr-1 h-auto fixed bg-yellow-200 border-r-4 border-yellow-600">
                <div class="text-xl text-center mb-2">
                    Elegir Dificultad
                </div>
                <div onclick=iniciarPrincipiante() class="w-auto p-2 self-center text-lg text-center rounded-lg bg-blue-300 border-2 border-blue-400 hover:bg-blue-400" style="cursor: pointer">
                    Principiante
                </div>
                <div onclick="iniciarIntermedio()" class="w-auto p-2 self-center text-lg text-center rounded-lg bg-green-300 border-2 border-green-400 hover:bg-green-400" style="cursor: pointer">
                    Intermedio
                </div>
                <div class="w-auto p-2 self-center text-lg text-center rounded-lg bg-red-300 border-2 border-red-400 hover:bg-red-400" style="cursor: pointer">
                    Experto
                </div>
                <div class=" mt-4 w-auto p-2 self-center text-lg text-center rounded-lg bg-yellow-500 border-2 border-yellow-700 hover:bg-yellow-700 mt-4">
                    <a class="w-full" href="../index.php">Salir</a>
                </div>
            </div>
            <div id="final" class="hidden">
                <p id="text-final"></p>
                <a href="../index.php" class="w-auto p-2 self-center text-lg text-center rounded-lg bg-yellow-500 border-2 border-yellow-700 hover:bg-yellow-700 mt-4">Salir</a>
            </div>
            <div id="datos" class="grid grids-cols-5 mt-4 hidden">
                <h3 id="nombre" class="ml-8 text-3xl font-serif ">Eudaldo Trasviña</h3>
                <h3 id="aciertos" class="ml-8 text-2xl font-serif ">Aciertos: </h3>
                <h3 id="reloj" class="ml-8 text-2xl font-serif ">Tiempo: </h3>
                <h3 id="estado" class="ml-8 text-2xl font-serif ">Estado: </h3>
                <h3 id="intentos" class="ml-8 text-2xl font-serif ">Intentos: </h3>
            </div>

            <div id="lsm" class="w-full ml-.5 sm:ml-0 md:ml-0 lg:ml-1.5 xl:ml-8 inline-flex hidden">
                <img id="gif" class="rounded-md shadow-lg w-1/3 h-1/3" src="../assets/img/estados Gif/Baja California Sur.gif" alt="">
                <button id="boton" class="w-14 pl-4"><img src="../assets/img/play.png" alt="reproducir estado"></button>
                <audio id="audio" src=""></audio>


            </div>

        </div>
        <div id='map' class="w-3/4 bg-blue-200 cursor-default"></div>
        <script src="../assets/js/marcadores.js"></script>
        <script src="../assets/js/mapa.js"></script>

        <!-- end-mapa -->
    </div>
</body>
</html>