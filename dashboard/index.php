<?php
include "../app/app.php";
include "../app/puntajeController.php";
$puntajeController = new PuntajeController();
$top = $puntajeController->getAll();
$puntajes = $puntajeController->getPorUsuario();
$dificultadPrincipiante = 0;
$dificultadIntermedio = 0;
$dificultadExperto = 0;
$puntosIntermedio = 0;
$puntosExperto = 0;
$puntosEstados = 0;
$puntosCapitales = 0;
$puntosMixto = 0;
$tipoEstado = 0;
$tipoCapital = 0;
$tipoMixto = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Document</title>
</head>

<body>
    <?php foreach ($puntajes as $puntaje) : ?>
        <?php
        if ($puntaje['dificultad'] == 'Principiante') {
            $dificultadPrincipiante++;
        }
        if ($puntaje['dificultad'] == 'Intermedio') {
            $dificultadIntermedio++;
            $puntosIntermedio = $puntosIntermedio + $puntaje['puntaje'];
        }
        if ($puntaje['dificultad'] == 'Experto') {
            $dificultadExperto++;
            $puntosExperto = $puntosExperto + $puntaje['puntaje'];
        }
        if ($puntaje['tipo'] == 'Estado') {
            $tipoEstado++;
            $puntosEstados = $puntosEstados + $puntaje['puntaje'];
        } else if ($puntaje['tipo'] == 'Capital') {
            $tipoCapital++;
            $puntosCapitales = $puntosCapitales + $puntaje['puntaje'];
        } else if ($puntaje['tipo'] == 'Mixto') {
            $tipoMixto++;
            $puntosMixto = $puntosMixto + $puntaje['puntaje'];
        }
        ?>
    <?php endforeach  ?>

    <div class="inline flex w-full">
        <!-- Menu de la izquierda  -->
        <div class="block w-1/5 h-screen rounded-r-md border-r-4 border-blue-400 bg-blue-300">
            <a href="../index.php"><img src="../assets/img/logo3.png" alt=""></a>
            <a href="../game/">
                <div class="m-2 rounded-lg py-2 bg-green-300 border-2 border-green-400 text-center cursor-pointer hover:bg-green-400">Jugar</div>
            </a>
            <a href="../menu/">
                <div class="m-2 rounded-lg py-2 bg-red-300 border-2 border-red-400 text-center cursor-pointer hover:bg-red-400">Menú</div>
            </a>
        </div>
        <!-- Estadisitcas  -->
        <div class="flex h-screen w-4/5">
            <!-- contenedor 1 -->
            <div class=" block h-screen w-1/3">
                <div class="block text-center w-full">
                    <label for="pie" class="text-2xl">Partidas jugadas: <?= count($puntajes) ?></label>
                    <canvas id="pie" class=""></canvas>
                </div>
                <div class="block text-center w-full">
                    <label for="bar" class="text-2xl">Tipos partidas</label>
                    <canvas id="bar" class=""></canvas>
                </div>
            </div>
            <!-- contendor 1 -->
            <div class=" inline h-screen w-1/3">
                <div class="block text-center w-full">
                    <label for="line" class="text-2xl">Puntos por Tipo</label>
                    <canvas id="radar" class=""></canvas>
                </div>
                <div class="block text-center w-full">
                    <label for="top" class="text-2xl">Top 5 puntajes</label>
                    <table id="top" class="border-2 border-green-400 rounded-md mx-auto">
                        <tr class="border-b border-green-200 bg-green-400 text-white">
                            <th>Lugar</th>
                            <th>Nickname</th>
                            <th>Puntos</th>
                        </tr>
                        <tr class="border-b border-green-200 bg-blue-200">
                            <td>1ro</td>
                            <td><?= $top[0]['nickname'] ?></td>
                            <td><?= $top[0]['puntaje'] ?></td>
                        </tr>
                        <tr class="border-b border-green-200 bg-red-200">
                            <td>2do</td>
                            <td><?= $top[1]['nickname'] ?></td>
                            <td><?= $top[1]['puntaje'] ?></td>
                        </tr>
                        <tr class="border-b border-green-200 bg-yellow-200">
                            <td>3ro</td>
                            <td><?= $top[2]['nickname'] ?></td>
                            <td><?= $top[2]['puntaje'] ?></td>
                        </tr>
                        <tr class="border-b border-green-200 bg-green-200">
                            <td>4to</td>
                            <td><?= $top[3]['nickname'] ?></td>
                            <td><?= $top[3]['puntaje'] ?></td>
                        </tr>
                        <tr class="border-b border-green-200 bg-indigo-200">
                            <td>5to</td>
                            <td><?= $top[4]['nickname'] ?></td>
                            <td><?= $top[5]['puntaje'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- contendor 3 -->
            <div class="block text-center w-1/3">
                <div>
                    <label for="line" class="text-2xl">Aciertos por partida</label>
                    <canvas id="line" class=""></canvas>
                </div>
            </div>

        </div>

    </div>

    <script>
        // Estadisitcas de numero de partidas
        var configPie = document.getElementById('pie').getContext('2d');
        new Chart(configPie, {
            type: 'pie',
            data: {
                labels: ['Principiante', 'Intermedio', 'Experto'],
                datasets: [{
                    label: 'Partidas jugadas',
                    data: [<?= $dificultadPrincipiante ?>, <?= $dificultadIntermedio ?>, <?= $dificultadExperto ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.4)',
                        'rgba(54, 162, 235, 0.4)',
                        'rgba(255, 206, 86, 0.4)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1,
                    hoverBackgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ]
                }]
            }
        });
        // Estadisitcas del tipo de partida
        var configBar = document.getElementById('bar').getContext('2d');
        new Chart(configBar, {
            type: 'bar',
            data: {
                labels: ['Estados', 'Capitales', 'Mixto'],
                datasets: [{
                    label: 'Partidas jugadas',
                    data: [<?= $tipoEstado ?>, <?= $tipoCapital ?>, <?= $tipoMixto ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.4)',
                        'rgba(54, 162, 235, 0.4)',
                        'rgba(255, 206, 86, 0.4)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1,
                    hoverBackgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ]
                }]
            }
        });

        // Estadisticas de aciertos
        var configLine = document.getElementById('line').getContext('2d');
        new Chart(configLine, {
            type: 'line',
            data: {
                labels: [<?php foreach ($puntajes as $puntaje) : ?> `<?= $puntaje['dificultad'] ?>`, <?php endforeach  ?>],
                datasets: [{
                    label: 'Aciertos',
                    data: [<?php foreach ($puntajes as $puntaje) : ?><?= $puntaje['aciertos'] ?>, <?php endforeach  ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.4)',
                        'rgba(54, 162, 235, 0.4)',
                        'rgba(255, 206, 86, 0.4)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1,
                    hoverBackgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ]
                }]
            }
        });

        // Estadisitcas puntos por estado y tipo
        var configRadar = document.getElementById('radar').getContext('2d');
        new Chart(configRadar, {
            type: 'radar',
            data: {
                labels: ['Estados', 'Capitales', 'Mixto'],
                datasets: [{
                    label: 'Puntos Totales',
                    data: [<?= $puntosEstados ?>, <?= $puntosCapitales ?>, <?= $puntosMixto ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.4)',
                        'rgba(54, 162, 235, 0.4)',
                        'rgba(255, 206, 86, 0.4)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1,
                    hoverBackgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ]
                }]
            }
        });
    </script>
</body>

</html>