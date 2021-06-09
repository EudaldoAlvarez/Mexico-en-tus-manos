<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>
        Login
    </title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="../assets/style/login.css? v=7"> -->
</head>

<body>
    <script src="../assets/js/marcadores.js"></script>
    <script src="../assets/js/enseñanza.js"></script>
    <div class="grid grid-cols-2 bg-yellow-200 w-full">
        <div class="min-h-screen inline-block items-center justify-center  py-12  ">
            <a href="../index.php"><img class="mx-auto w-3/4" src="../assets/img/logo3.png" alt="globo-mexico"></a>
        </div>
        <div class="min-h-screen  items-center justify-center block py-12 px-4 sm:px-6 lg:px-8">
            <div id="titulo" class="font-serif text-2xl mt-32">Menú Principal</div>
            <div id="menu1" class="bg-white max-w-md w-full  border border-lg rounded-md shadow-2xl">
                <a href="../game/">
                    <div class="m-2 rounded-md py-4 bg-green-200 border-2 border-green-300 text-center cursor-pointer hover:bg-green-300">Jugar</div>
                </a>

                <div onclick=aprender() class="m-2 py-4 rounded-md bg-blue-200 border-2 border-blue-300 text-center cursor-pointer hover:bg-blue-300">Aprender</div>
                <a class="w-full" href="../index.php">
                    <div class="m-2 rounded-md bg-red-200 py-4 border-2 border-red-300 text-center hover:bg-red-300">Salir</div>
                </a>
            </div>
            <div id="menu2" class="hidden">
                <div class="inline flex w-full">
                    <div class="m-2 rounded-md w-1/2 bg-green-200 border-2 border-green-300 text-center cursor-pointer hover:bg-green-300" onclick="cambiarTipo('Estado')">Estados</div>
                    <div class="m-2 rounded-md w-1/2 bg-blue-200 border-2 border-blue-300 text-center cursor-pointer hover:bg-blue-300" onclick="cambiarTipo('Capital')">Capitales</div>
                </div>
                <div class="inline flex">
                    <div class="w-1/2"><img id="gif" class="w-full rounded-md  " src="../assets/img/estados Gif/Baja California Sur.gif" alt=""></div>
                    <div class="block w-3/4 my-4">
                        <h1 id="estado" class="font-serif text-2xl h-1/4 pb-4 my-4">Nombre del estado</h1>
                        <div onclick="anterior()" class="m-2 rounded-md w-1/2 bg-yellow-200 border-2 border-yellow-300 text-center cursor-pointer hover:bg-yellow-300">Anterior</div>
                        <div onclick="siguiente()" class="m-2 rounded-md w-1/2 bg-yellow-200 border-2 border-yellow-300 text-center cursor-pointer hover:bg-yellow-300">Siguiente</div>
                        <div onclick="salir()" class="m-2 mt-6 rounded-md w-1/2 bg-red-200 border-2 border-red-300 text-center cursor-pointer hover:bg-red-300">Anterior</div>
                       
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>


</html>