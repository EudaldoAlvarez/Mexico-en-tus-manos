<?php
include "../app/app.php";
include "../app/authController.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />



    <title>México en tus manos</title>

</head>

<body>

    <!-- container -->
    <div class="inline-flex w-full bg-blue-400">
        <!-- tabla de información -->
        <div id="info" class="w-1/4 h-screen rounded-tr-xl rounded-br-xl bg-yellow-200 shadow-inner-md border-r-4 border-yellow-600">

            <div class="w-3/5 ml-4 md:ml-10 sm:ml-8 lg:ml-12">
                <a href="../index.php"><img src="../assets/img/logo3.png" alt=""></a>

            </div>
            <div id="tipoPrincipiante" class="hidden">
                <div class="text-xl text-center mb-2">
                    Elegir tipo de juego
                </div>
                <div onclick="iniciarPrincipiante('Estado')" class="w-auto p-2 self-center text-lg text-center rounded-lg bg-blue-300 border-2 border-blue-400 hover:bg-blue-400" style="cursor: pointer">
                    Estados
                </div>
                <div onclick="iniciarPrincipiante('Capital')" class="w-auto p-2 self-center text-lg text-center rounded-lg bg-green-300 border-2 border-green-400 hover:bg-green-400" style="cursor: pointer">
                    Capitales
                </div>
                <a href="../index.php">
                    <div class=" mt-4 w-auto p-2 self-center text-lg text-center rounded-lg bg-yellow-500 border-2 border-yellow-700 hover:bg-yellow-700 mt-4">
                        Salir
                    </div>
                </a>
            </div>
            <div id="tipoIntermedio" class="hidden">
                <div class="text-xl text-center mb-2">
                    Elegir tipo de juego
                </div>
                <div onclick="iniciarIntermedio('Estado')" class="w-auto p-2 self-center text-lg text-center rounded-lg bg-blue-300 border-2 border-blue-400 hover:bg-blue-400" style="cursor: pointer">
                    Estados
                </div>
                <div onclick="iniciarIntermedio('Capital')" class="w-auto p-2 self-center text-lg text-center rounded-lg bg-green-300 border-2 border-green-400 hover:bg-green-400" style="cursor: pointer">
                    Capitales
                </div>
                <a href="../index.php">
                    <div class=" mt-4 w-auto p-2 self-center text-lg text-center rounded-lg bg-yellow-500 border-2 border-yellow-700 hover:bg-yellow-700 mt-4">
                        Salir
                    </div>
                </a>
            </div>
            <div id="menu" class="w-1/4 mr-1 h-auto fixed bg-yellow-200 border-r-4 border-yellow-600">
                <div class="text-xl text-center mb-2">
                    Elegir Dificultad
                </div>
                <div onclick=principiante() class="w-auto p-2 self-center text-lg text-center rounded-lg bg-blue-300 border-2 border-blue-400 hover:bg-blue-400" style="cursor: pointer">
                    Principiante
                </div>
                <div onclick=intermedio() class="w-auto p-2 self-center text-lg text-center rounded-lg bg-green-300 border-2 border-green-400 hover:bg-green-400" style="cursor: pointer">
                    Intermedio
                </div>
                <div onclick=iniciarExperto() class="w-auto p-2 self-center text-lg text-center rounded-lg bg-red-300 border-2 border-red-400 hover:bg-red-400" style="cursor: pointer">
                    Experto
                </div>
                <a href="../menu/">
                    <div class=" mt-4 w-auto p-2 self-center text-lg text-center rounded-lg bg-yellow-500 border-2 border-yellow-700 hover:bg-yellow-700 mt-4">
                        Salir
                    </div>
                </a>

            </div>

            <div id="final" class="hidden">
                <p id="text-final"></p>
                <form method="POST" action="../app/authController.php">
                    <input id="puntuacion" type="hidden" name="puntuacion" value="">
                    <input id="dificultad" type="hidden" name="dificultad" value="">
                    <input id="tipo" type="hidden" name="tipo" value="">
                    <input id="aciertos" type="hidden" name="aciertos" value="">
                    <input id="minutos" type="hidden" name="minutos" value="">
                    <input id="segundos" type="hidden" name="segundos" value="">
                    <input type="hidden" name="nickname" value=<?= $_SESSION['nickname'] ?>>
                    <input type="hidden" name="token" value=<?= $_SESSION['token'] ?>>
                    <button id="formBoton" name="action" value="estadisticas" class="w-auto p-2 self-center text-lg text-center rounded-lg bg-yellow-500 border-2 border-yellow-700 hover:bg-yellow-700 mt-4" type="submit">Puntajes</button>
                    <button name="action" value="guardar" class="w-auto p-2 self-center text-lg text-center rounded-lg bg-green-500 border-2 border-green-700 hover:bg-green-700 mt-4" type="submit">Repetir</button>
                </form>
            </div>
            <div id="datos" class="grid grids-cols-6 mt-4 hidden">
                <h3 id="nombre" class="ml-8 text-3xl font-serif "><?= $_SESSION['nickname'] ?></h3>
                <h3 id="aciertos" class="ml-8 text-2xl font-serif ">Aciertos: 0/32</h3>
                <h3 id="reloj" class="ml-8 text-2xl font-serif ">Tiempo: </h3>
                <h3 id="estado" class="ml-8 text-2xl font-serif ">Estado: </h3>
                <h3 id="intentos" class="ml-8 text-2xl font-serif ">Intentos: 3</h3>
                <h3 id="puntos" class="ml-8 text-2xl font-serif ">Puntos: 0</h3>
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