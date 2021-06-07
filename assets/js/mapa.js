// pk.eyJ1IjoiZXVkYWxkbyIsImEiOiJja3BjenAwNWsxYXE1Mm9tdXYwaWNzOTYwIn0.EIkmxMUBz1YQTRjVS9vDWw
var segundos = 0;
var minutos = 0;
var horas = 0;
var aciertos = 0;
var intentos = 3;
var estadosNombre = marcadores.map(marcadores => marcadores.estado);

mapboxgl.accessToken = 'pk.eyJ1IjoiZXVkYWxkbyIsImEiOiJja3BjenAwNWsxYXE1Mm9tdXYwaWNzOTYwIn0.EIkmxMUBz1YQTRjVS9vDWw';

let map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/eudaldo/ckpczwtxs0kjj17p7200pbqqw',
    center: [-102.552788, 23.634501],
    zoom: 4.5,
    interactive: true
});


//Agregando Marcadores
const markers = marcadores.map(({ color, longitud, latitud }) => new mapboxgl.Marker({
    color,
}).setLngLat([longitud, latitud]).addTo(map));


//Agregando metodos al marcador
markers.forEach(marker => {

    marker.getElement().addEventListener('click', () => {
        if (intentos > 0) {
            comprobarEstado(marker);

        } else {
            alert("Sin intentos, ¡Perdiste!");
        }


    })

});
function iniciarTemporizador() {
    var id = setInterval(function () {
        segundos++;
        if (segundos == 60) { minutos++, segundos = 0 };
        if (minutos == 60) { horas++, minutos = 0 };
        if (segundos < 10 && segundos != 0) { segundos = '0' + segundos; }
        if (intentos == 0 || aciertos == 24) { clearInterval(id) }

        let htmlTiempo = document.getElementById("reloj");
        htmlTiempo.innerHTML = `Tiempo: ${horas}:${minutos}:${segundos}`;
    }, 1000);

};

function sumarNumeroAciertos() {
    aciertos++;
    let htmlAciertos = document.getElementById("aciertos");
    htmlAciertos.innerHTML = `Aciertos: ${aciertos}/32`
};

function cambiarAudio() {
    let boton = document.getElementById("boton");
    let audioEtiqueta = document.getElementById("audio");
    boton.addEventListener("click", () => {
        audioEtiqueta.src = `../assets/audios/estados/${estadosNombre[0]}.mp3`;
        audioEtiqueta.play()
        console.log(`Reproduciendo: ${audioEtiqueta.src}`)
    })
}

function cambiarGif() {
    let htmlGif = document.getElementById("gif")
    htmlGif.src = `../assets/img//estados Gif/${estadosNombre[0]}.gif`
}
function cambiarEstado() {
    let htmlEstado = document.getElementById("estado");
    htmlEstado.innerHTML = `Estado: ${estadosNombre[0]}`
};

function errar() {
    intentos--;
    let htmlIntentos = document.getElementById("intentos");
    htmlIntentos.innerHTML = `Intentos: ${intentos}`
};

function acertar() {
    intentos = 3;
    let htmlIntentos = document.getElementById("intentos");
    htmlIntentos.innerHTML = `Intentos: ${intentos}`
};

const mezclarArreglo = arreglo => {
    for (let i = arreglo.length - 1; i > 0; i--) {
        let indiceAleatorio = Math.floor(Math.random() * (i + 1));
        let temporal = arreglo[i];
        arreglo[i] = arreglo[indiceAleatorio];
        arreglo[indiceAleatorio] = temporal;
    }
};


function comprobarEstado(marcador) {

    var marcadorCoordenadas = (marcador._lngLat.lat + "," + marcador._lngLat.lng);
    var datosEstado = marcadores.find(marcadores => marcadores.estado == estadosNombre[0]);
    var coordenadasEstado = (datosEstado['latitud'] + "," + datosEstado['longitud']);
    var nombreEstado = marcadores.find(marcadores => marcadores.longitud == marcador._lngLat.lng);
    if (marcadorCoordenadas == coordenadasEstado) {
        alert('Estado correcto')
        estadosNombre.shift();
        cambiarEstado();
        acertar();
        sumarNumeroAciertos();
        cambiarGif();
        marcador.remove();
        if (aciertos == 32) {
            document.getElementById('datos').setAttribute('class', 'hidden');
            document.getElementById('lsm').setAttribute('class', 'hidden');
            let final = document.getElementById('final')
            final.setAttribute('class', 'p-2 w-1/4 mr-1 h-auto fixed bg-yellow-200 border-r-4 border-yellow-600 text-2xl text-bold text-justify font-serif');
            document.getElementById('text-final').innerHTML = `¡FELICITACIONES! HAS LOGRADO ACABAR EL JUEGO EN UN TIEMPO DE ${horas?horas <10:horas = '0' +horas}:${minutos?minutos<10:minutos= '0'+minutos}:${segundos}`;

        }

    } else {
        alert(`Estado incorrecto, Este es ${nombreEstado.estado}`);
        errar();
    }

};

function iniciarIntermedio() {
    mezclarArreglo(estadosNombre);
    cambiarEstado();
    cambiarAudio();
    iniciarTemporizador();
    let htmlIntentos = document.getElementById("intentos");
    htmlIntentos.innerHTML = `Intentos: ${intentos}`;
    let htmlAciertos = document.getElementById("aciertos");
    htmlAciertos.innerHTML = `Aciertos: ${aciertos}/32`;

    document.getElementById('menu').setAttribute('class', 'hidden');
    document.getElementById('datos').setAttribute('class', 'grid grids-cols-5 mt-4');
    document.getElementById('lsm').setAttribute('class', 'w-full ml-.5 sm:ml-0 md:ml-0 lg:ml-1.5 xl:ml-8 inline-flex');
    cambiarGif();
    console.log(estadosNombre);
};



