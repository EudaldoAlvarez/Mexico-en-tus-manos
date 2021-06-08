// pk.eyJ1IjoiZXVkYWxkbyIsImEiOiJja3BteGhrdjAxNmMzMnVxa2N5N2VwM28yIn0.oCf9Q9-Vlzm3EtKByaTLVA
var segundos = 0;
var minutos = 0;
var horas = 0;
var aciertos = 0;
var intentos = 3;
var estadosNombre = marcadores.map(marcadores => marcadores.estado);
var capitalesNombre = marcadores.map(marcadores => marcadores.capital);
var dificultad;
var puntuacion = 0;
var tipoCadena = "";
var estadosCapitales = [];
mapboxgl.accessToken = 'pk.eyJ1IjoiZXVkYWxkbyIsImEiOiJja3BteGhrdjAxNmMzMnVxa2N5N2VwM28yIn0.oCf9Q9-Vlzm3EtKByaTLVA';

mapboxgl.accessToken = 'pk.eyJ1IjoiZXVkYWxkbyIsImEiOiJja3BteGhrdjAxNmMzMnVxa2N5N2VwM28yIn0.oCf9Q9-Vlzm3EtKByaTLVA';
let map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/eudaldo/ckpczwtxs0kjj17p7200pbqqw',
    center: [-102.552788, 23.634501],
    zoom: 4.5,
    interactive: true
});
// let map = new mapboxgl.Map({
//     container: 'map',
//     style: 'mapbox://styles/eudaldo/ckpczwtxs0kjj17p7200pbqqw',

// });


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
            perder();
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
function principiante() {
    document.getElementById('tipoPrincipiante').setAttribute('class', 'w-1/4 mr-1 h-auto fixed bg-yellow-200 border-r-4 border-yellow-600');
    document.getElementById('menu').setAttribute('class', 'hidden');
};

function intermedio() {
    document.getElementById('tipoIntermedio').setAttribute('class', 'w-1/4 mr-1 h-auto fixed bg-yellow-200 border-r-4 border-yellow-600');
    document.getElementById('menu').setAttribute('class', 'hidden');
}

function cambiarAudio(tipo) {
    let boton = document.getElementById("boton");
    let audioEtiqueta = document.getElementById("audio");
    if (tipo == 'Estado') {
        boton.addEventListener("click", () => {
            audioEtiqueta.src = `../assets/audios/estados/${estadosNombre[0]}.mp3`;
            audioEtiqueta.play()
        })
    } else {
        boton.addEventListener("click", () => {
            audioEtiqueta.src = `../assets/audios/capitales/${capitalesNombre[0]}.mp3`;
            audioEtiqueta.play()
        })
    }

}

function cambiarGif(tipo) {
    if (tipo == 'Estado') {
        let htmlGif = document.getElementById("gif")
        htmlGif.src = `../assets/img/estados Gif/${estadosNombre[0]}.gif`;
    } else {
        let htmlGif = document.getElementById("gif")
        htmlGif.src = `../assets/img/capitales/${capitalesNombre[0]}.gif`;
    }

}
function cambiarEstado(tipo) {
    if (tipo == 'Estado') {
        let htmlEstado = document.getElementById("estado");
        htmlEstado.innerHTML = `Estado: ${estadosNombre[0]}`
    } else {
        let htmlEstado = document.getElementById("estado");
        htmlEstado.innerHTML = `Capital: ${capitalesNombre[0]}`
    }

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
    if(marcadores.some(marcadores => marcadores.estado == estadosCapitales[0])){
        var datosMarcador = marcadores.find(marcadores => marcadores.estado == estadosCapitales[0]);
    }else{
        var datosMarcador = marcadores.find(marcadores => marcadores.capital == estadosCapitales[0]);
    }
    var coordenadasEstadosCapitales = (datosMarcador['latitud'] + "," + datosMarcador['longitud']);
    var coordenadasMarcador = (datosMarcador['latitud'] + "," + datosMarcador['longitud']);

    var marcadorCoordenadas = (marcador._lngLat.lat + "," + marcador._lngLat.lng);
    if (tipoCadena == "Estado") {
        var datosEstado = marcadores.find(marcadores => marcadores.estado == estadosNombre[0]);
    } else {
        var datosEstado = marcadores.find(marcadores => marcadores.capital == capitalesNombre[0]);
    }
    var coordenadasEstado = (datosEstado['latitud'] + "," + datosEstado['longitud']);
    var nombreEstado = marcadores.find(marcadores => marcadores.longitud == marcador._lngLat.lng);

    
    switch (dificultad) {
        case 1:
            if (marcadorCoordenadas == coordenadasEstado) {
                if (tipoCadena == "Estado") {
                    alert('Estado correcto');
                    estadosNombre.shift();
                } else {
                    capitalesNombre.shift();
                    alert("Capital correcta");
                }


                cambiarEstado(tipoCadena);
                cambiarGif(tipoCadena)
                sumarNumeroAciertos();
                marcador.remove();
                if (aciertos == 32) {
                    finalPrincipiante();
                }
            } else {
                if (tipoCadena == "Estado") {
                    alert(`Estado incorrecto, Este es ${nombreEstado.estado}`);
                } else {
                    alert(`Capital incorrecta, Esta es ${nombreEstado.capital}`);
                }

            }
            break;

        case 2:
            if (marcadorCoordenadas == coordenadasEstadosCapitales) {
                if (tipoCadena == "Estado") {
                    alert('Estado correcto');
                    estadosNombre.shift();
                } else {
                    capitalesNombre.shift();
                    alert("Capital correcta");
                }
                puntuacion = puntuacion + intentos;
                cambiarEstado(tipoCadena);
                acertar();
                sumarNumeroAciertos();
                cambiarGif(tipoCadena);
                marcador.remove();
                if (aciertos == 32) {
                    finalIntermedio();
                }
            } else {
                if (tipoCadena == "Estado") {
                    alert(`Estado incorrecto, Este es ${nombreEstado.estado}`);
                } else {
                    alert(`Capital incorrecta, Esta es ${nombreEstado.capital}`);
                }
                errar();
            }
            break;
        case 3:
            if (marcadorCoordenadas == coordenadasMarcador) {
                if(marcadores.some(marcadores => marcadores.estado == estadosCapitales[0])){
                    alert(`Estado correcto`);
                }else{
                    alert(`Capital correcta`);
                }
                estadosCapitales.shift();
                expertoFunciones();
                acertar();
                sumarNumeroAciertos();
                if (aciertos == 32) {
                    finalIntermedio();

                }
            }else{
                errar();
                if(marcadores.some(marcadores => marcadores.estado == estadosCapitales[0])){
                    alert(`Estado incorrecto, Este es ${nombreEstado.estado}`);
                }else{
                    alert(`Capital incorrecta, Esta es ${nombreEstado.capital}`);
                }
            }

            break;
    }


};
function finalPrincipiante() {
    document.getElementById('datos').setAttribute('class', 'hidden');
    document.getElementById('lsm').setAttribute('class', 'hidden');
    let final = document.getElementById('final')
    final.setAttribute('class', 'p-2 w-full mr-1 h-auto bg-yellow-200  text-2xl text-bold text-center font-serif');
    document.getElementById('text-final').innerHTML = `¡FELICITACIONES! HAS LOGRADO ACABAR EL JUEGO.`;

}

function finalIntermedio() {
    document.getElementById('datos').setAttribute('class', 'hidden');
    document.getElementById('lsm').setAttribute('class', 'hidden');
    // inputPuntuacion = document.getElementById("puntuacion");
    // inputPuntuacion.value = `${puntuacion}`;
    // inputDificultad = document.getElementById("dificultad");
    // inputDificultad.value = "Intermedio";
    // document.getElementById("formBoton").setAttribute('class', 'w-1/2')
    let final = document.getElementById('final');
    final.setAttribute('class', 'p-2 w-full mr-1 h-auto bg-yellow-200  text-2xl text-bold text-center font-serif');
    document.getElementById('text-final').innerHTML = `¡FELICITACIONES! HAS LOGRADO ACABAR EL JUEGO EN UN TIEMPO DE ${minutos}:${segundos} minutos`;
}


function perder() {
    document.getElementById('datos').setAttribute('class', 'hidden');
    document.getElementById('lsm').setAttribute('class', 'hidden');
    let final = document.getElementById('final')
    final.setAttribute('class', 'p-2 w-1/4 mr-1 h-auto bg-yellow-200 border-r-4 border-yellow-600 text-2xl text-bold text-center font-serif');
    document.getElementById('text-final').innerHTML = `¡QUE MAL!, HAS PERDIDO. :(`;

}

function expertoFunciones() {
    let boton = document.getElementById("boton");
    let audioEtiqueta = document.getElementById("audio");
    if (marcadores.some(marcadores => marcadores.estado == estadosCapitales[0])) {
        let htmlEstado = document.getElementById("estado");
        htmlEstado.innerHTML = `Estado: ${estadosCapitales[0]}`;
        let htmlGif = document.getElementById("gif")
        htmlGif.src = `../assets/img/estados Gif/${estadosCapitales[0]}.gif`;
        boton.addEventListener("click", () => {
            audioEtiqueta.src = `../assets/audios/estados/${estadosCapitales[0]}.mp3`;
            audioEtiqueta.play()
        })
    } else {
        let htmlEstado = document.getElementById("estado");
        htmlEstado.innerHTML = `Capital: ${estadosCapitales[0]}`;
        let htmlGif = document.getElementById("gif")
        htmlGif.src = `../assets/img/capitales/${estadosCapitales[0]}.gif`;
        boton.addEventListener("click", () => {
            audioEtiqueta.src = `../assets/audios/capitales/${estadosCapitales[0]}.mp3`;
            audioEtiqueta.play()
        })
    }
}
function iniciarIntermedio(tipo) {
    dificultad = 2;
    tipoCadena = tipo;
    console.log(tipo);
    if (tipo == 'Estado') {
        mezclarArreglo(estadosNombre);
        console.log(estadosNombre);
    } else {
        mezclarArreglo(capitalesNombre);
        console.log(capitalesNombre);
    }
    cambiarEstado(tipo);
    cambiarAudio(tipo);
    iniciarTemporizador();
    let htmlIntentos = document.getElementById("intentos");
    htmlIntentos.innerHTML = `Intentos: ${intentos}`;
    let htmlAciertos = document.getElementById("aciertos");
    htmlAciertos.innerHTML = `Aciertos: ${aciertos}/32`;

    document.getElementById('tipoIntermedio').setAttribute('class', 'hidden');
    document.getElementById('datos').setAttribute('class', 'grid grids-cols-5 mt-4');
    document.getElementById('lsm').setAttribute('class', 'w-full ml-.5 sm:ml-0 md:ml-0 lg:ml-1.5 xl:ml-8 inline-flex');
    cambiarGif(tipo);
};

function iniciarPrincipiante(tipo) {
    dificultad = 1;
    tipoCadena = tipo;
    console.log(tipo);
    if (tipo == 'Estado') {
        mezclarArreglo(estadosNombre);
        console.log(estadosNombre);
    } else {
        mezclarArreglo(capitalesNombre);
        console.log(capitalesNombre);
    }
    cambiarEstado(tipo);
    cambiarGif(tipo);
    cambiarAudio(tipo);
    document.getElementById('tipoPrincipiante').setAttribute('class', 'hidden');
    document.getElementById('reloj').setAttribute('class', 'hidden');
    document.getElementById('intentos').setAttribute('class', 'hidden');
    document.getElementById('menu').setAttribute('class', 'hidden');
    document.getElementById('gif').setAttribute('class', 'rounded-md shadow-lg w-2/5 h-2/5');
    document.getElementById('datos').setAttribute('class', 'grid grids-cols-5 mt-4');
    document.getElementById('lsm').setAttribute('class', 'w-full ml-.5 sm:ml-0 md:ml-0 lg:ml-1.5 xl:ml-8 inline-flex');

}
function iniciarExperto() {
    dificultad = 3;
    estadosCapitales = capitalesNombre.concat(estadosNombre);
    mezclarArreglo(estadosCapitales);
    expertoFunciones();
    iniciarTemporizador();
    document.getElementById('menu').setAttribute('class', 'hidden');
    document.getElementById('gif').setAttribute('class', 'rounded-md shadow-lg w-2/5 h-2/5');
    document.getElementById('datos').setAttribute('class', 'grid grids-cols-5 mt-4');
    document.getElementById('lsm').setAttribute('class', 'w-full ml-.5 sm:ml-0 md:ml-0 lg:ml-1.5 xl:ml-8 inline-flex');

}
