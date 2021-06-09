var estadosNombre = marcadores.map(marcadores => marcadores.estado);
var capitalesNombre = marcadores.map(marcadores => marcadores.capital);
var posision = 0;
var tipo = 'Estado';
console.log(tipo);

function cambiarGif() {
    if (tipo == 'Estado') {
        let htmlGif = document.getElementById("gif")
        htmlGif.src = `../assets/img/estados Gif/${estadosNombre[posision]}.gif`;
    } else {
        if (capitalesNombre[posision] == "Ciudad De México") {
            let htmlGif = document.getElementById("gif")
            htmlGif.src = `../assets/img/estados Gif/${capitalesNombre[posision]}.gif`;
        }
        let htmlGif = document.getElementById("gif")
        htmlGif.src = `../assets/img/capitales/${capitalesNombre[posision]}.gif`;
    }

};
function cambiarTipo(tipoPametro) {
    tipo = tipoPametro;
    cambiarEstado();
    cambiarGif();
};
function salir() {
    posision = 0;
    document.getElementById('titulo').setAttribute('class', 'font-serif text-2xl mt-32')
    document.getElementById('titulo').innerHTML = "Menú principal"
    document.getElementById('menu1').setAttribute('class', 'bg-white max-w-md w-full  border border-lg rounded-md shadow-2xl');
    document.getElementById('menu2').setAttribute('class', 'hidden');
}

function cambiarEstado() {

    if (tipo == 'Estado') {

        let htmlEstado = document.getElementById("estado");
        htmlEstado.innerHTML = `Estado: ${estadosNombre[posision]}`
    } else {
        let htmlEstado = document.getElementById("estado");
        htmlEstado.innerHTML = `Capital: ${capitalesNombre[posision]}`
    }

};
function siguiente() {
    if (posision == 31) {
        posision = 0;
    } else {
        posision++;
    }
    cambiarEstado();
    cambiarGif();
}
function anterior() {
    if (posision == 0) {
        posision = 31;
    } else {
        posision--;
    }
    cambiarEstado();
    cambiarGif();
}

function aprender() {
    cambiarEstado();
    cambiarGif(tipo);
    document.getElementById('titulo').setAttribute('class', 'font-serif text-2xl')
    document.getElementById('titulo').innerHTML = "Aprendizaje"
    document.getElementById('menu1').setAttribute('class', 'hidden');
    document.getElementById('menu2').setAttribute('class', 'bg-white max-w-md w-full  border border-lg rounded-md shadow-2xl');
}