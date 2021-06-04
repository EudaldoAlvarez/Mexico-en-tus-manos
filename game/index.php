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
    </div>
    <!-- container -->
    <div class="inline-flex w-full bg-blue-400">
        <!-- tabla de información -->
        <div id="info" class="w-1/4 h-screen rounded-tr-xl rounded-br-xl bg-yellow-200 shadow-inner-md border-r-4 border-yellow-600">

            <div class="w-3/4 ml-4 md:ml-10 sm:ml-8 lg:ml-12">
                <img src="../assets/img/logo3.png" alt="">
            </div>
            <div class="grid grids-cols-5 mt-4 ">
                <h3 id="nombre" class="ml-8 text-3xl font-serif ">Eudaldo Trasviña</h3>
                <h3 id="aciertos" class="ml-8 text-2xl font-serif ">Aciertos: </h3>
                <h3 id="reloj" class="ml-8 text-2xl font-serif ">Tiempo: </h3>
                <script>
                    function tiempo() { //función del temporizador
                        actual = new Date() //fecha en el instante
                        cro = actual - emp //tiempo transcurrido en milisegundos
                        cr = new Date() //fecha donde guardamos el tiempo transcurrido
                        cr.setTime(cro)
                        cs = cr.getMilliseconds() //milisegundos del cronómetro
                        cs = cs / 10; //paso a centésimas de segundo.
                        cs = Math.round(cs)
                        sg = cr.getSeconds(); //segundos del cronómetro
                        mn = cr.getMinutes(); //minutos del cronómetro
                        ho = cr.getHours() - 1; //horas del cronómetro
                        if (cs < 10) {
                            cs = "0" + cs;
                        } //poner siempre 2 cifras en los números
                        if (sg < 10) {
                            sg = "0" + sg;
                        }
                        if (mn < 10) {
                            mn = "0" + mn;
                        }
                        reloj.innerHTML = ho + " : " + mn + " : " + sg + " : " + cs; //pasar a pantalla.
                    }
                </script>
                <h3 id="estado" class="ml-8 text-2xl font-serif ">Estado: </h3>
                <h3 id="intentos" class="ml-8 text-2xl font-serif ">Intentos: </h3>
            </div>
            <div class="w-full ml-.5 sm:ml-0 md:ml-0 lg:ml-1.5 xl:ml-8">
                <img class="rounded-md shadow-lg" src="../assets/img/champurrado.gif" alt="">
            </div>

        </div>
        <div id='map' class="w-3/4 bg-blue-200 cursor-default" onclick=comprobarEstado(bcs,estados[0])></div>
        <script src="../assets/js/mapa.js"></script>
        
        <!-- end-mapa -->
    </div>

</body>

</html>