// pk.eyJ1IjoiZXVkYWxkbyIsImEiOiJja3BjenAwNWsxYXE1Mm9tdXYwaWNzOTYwIn0.EIkmxMUBz1YQTRjVS9vDWw

mapboxgl.accessToken = 'pk.eyJ1IjoiZXVkYWxkbyIsImEiOiJja3BjenAwNWsxYXE1Mm9tdXYwaWNzOTYwIn0.EIkmxMUBz1YQTRjVS9vDWw';

let map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/eudaldo/ckpczwtxs0kjj17p7200pbqqw',
    center: [-102.552788, 23.634501],
    zoom: 4.5,
    interactive: true
});

let element = document.createElement('div');
element.className = 'marker';
const estadosCoordenadas = {
    bcs: {
        lng: -110.305,
        lat: 24.114
    },
    bc: {
        lng: -115.429939,
        lat: 30.713504
    },
    sonora: {
        lng: -110.577009,
        lat: 29.267233
    },
    chihuahua: "28.304381,-106.135569",
    coahuila: "-102.221824,26.824071",
    nuevoLeon: "-99.696490,25.582085",
    tamaulipas: "-98.268091,24.527135",
    sinaloa: "-107.244735,24.287027",
    durango: "-104.870104,24.726875",
    zacatecas: "-102.990236,23.221155",
    sanLuisPotosi: "-101.099326,23.008964",
    veracruz: "-96.549226,19.217803",
    guerrero: "-99.981914,17.350638",
    colima: "-103.851684,19.062118",
    aguascalientes: "-102.324235,21.983801",
    guanajuato: "-101.122509,20.961440",
    nayarit: "-104.864436,21.657428",
    michoacan: "-102.027924,19.020577",
    oaxaca: "-96.399168,16.762468",
    tlaxcala: "-98.111272,19.373341",
    estadoDeMexico: "-99.990419,18.916680",
    queretaro: "-99.813933,20.797201",
    hidalgo: "-99.099609,20.581367",
    jalisco: "-103.871324,20.241583",
    morelos: "-99.110999,18.635835",
    ciudadDeMexico: "-99.131290,19.394068",
    puebla: "-98.152466,18.578569",
    chiapas: "-92.458419,16.277960",
    tabasco: "-92.678292,17.916023",
    campeche: "-90.281674,18.812718",
    quintanaRoo: "-88.214865,19.725342",
    yucatan: "-88.995337,20.571082"
};
const nombreEstados = ["Aguascalientes", "Baja California", "Baja California Sur", "Campeche", "Chiapas", "Chihuahua", "Coahuila", "Colima", "Durango", "Estado de México", "Guanajuato", "Guerrero", "Hidalgo", "Jalisco", "Michoacán", "Morelos", "Nayarit", "Nuevo León", "Oaxaca", "Puebla", "Querétaro", "Quintana Roo", "San Luis Potosí", "Sinaloa", "Sonora", "Tabasco", "Tamaulipas", "Tlaxcala", "Veracruz", "Yucatán", "Zacatecas"];
    

var bcs = new mapboxgl.Marker({
    color: "#000000",
    name: "Baja California Sur"
}).setLngLat([-110.305, 24.114]).addTo(map);
var bc = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-115.429939, 30.713504]).addTo(map);
var sonora = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-110.577009, 29.267233]).addTo(map);
var chihuahua = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-106.135569, 28.304381]).addTo(map);
var coahuila = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-102.221824, 26.824071]).addTo(map);
var nuevoLeon = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-99.696490, 25.582085]).addTo(map);
var tamaulipas = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-98.268091, 24.527135]).addTo(map);
var sinaloa = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-107.244735, 24.287027]).addTo(map);
var durango = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-104.870104, 24.726875]).addTo(map);
var zacatecas = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-102.990236, 23.221155]).addTo(map);
var sanLuisPotosi = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-101.099326, 23.008964]).addTo(map);
var veracruz = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-96.549226, 19.217803]).addTo(map);
var guerrero = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-99.981914, 17.350638]).addTo(map);
var colima = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-103.851684, 19.062118]).addTo(map);
var aguascalientes = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-102.324235, 21.983801]).addTo(map);
var guanajuato = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-101.122509, 20.961440]).addTo(map);
var nayarit = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-104.864436, 21.657428]).addTo(map);
var michoacan = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-102.027924, 19.020577]).addTo(map);
var oaxaca = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-96.399168, 16.762468]).addTo(map);
var tlaxcala = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-98.111272, 19.373341]).addTo(map);
var estadoDeMexico = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-99.990419, 18.916680]).addTo(map);
var queretaro = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-99.813933, 20.797201]).addTo(map);
var hidalgo = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-99.099609, 20.581367]).addTo(map);
var jalisco = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-103.871324, 20.241583]).addTo(map);
var morelos = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-99.110999, 18.635835]).addTo(map);
var ciudadDeMexico = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-99.131290, 19.394068]).addTo(map);
var puebla = new mapboxgl.Marker({
    color: "#000000",
    estado: "puebla"
}).setLngLat([-98.152466, 18.578569]).addTo(map);
var chiapas = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-92.458419, 16.277960]).addTo(map);
var tabasco = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-92.678292, 17.916023]).addTo(map);
var campeche = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-90.281674, 18.812718]).addTo(map);
var quintanaRoo = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-88.214865, 19.725342]).addTo(map);
var yucatan = new mapboxgl.Marker({
    color: "#000000",
}).setLngLat([-88.995337, 20.571082]).addTo(map);

function cambiarEstado(nombre) {
    let element = document.getElementById("estado");
    element.innerHTML = `Estado: ${nombre}`
}
cambiarEstado("Chihuahua");
function principiante() {
   
};


function comprobarEstado(marcador, estado) {
    marcador.getElement().addEventListener('click', () => {
        const marcadorCoordenadas=(marcador._lngLat.lat+","+marcador._lngLat.lng)
        const coordenadas = (estadosCoordenadas.chihuahua)
        if (marcadorCoordenadas == coordenadas) {
            alert(estado)
        } else {
            alert("nel")
        }
    })
};
comprobarEstado(chihuahua,"chihuahua")
console.log(nombreEstados.count);
// comprobarEstado(bcs,estados[0])
bcs.getElement().addEventListener('click', () => {
    const lat = (bcs._lngLat.lat)
    const lng = (bcs._lngLat.lng)
    if (lat == estados.bcs.lat && lng == estados.bcs.lng) {
        alert("Baja California Sur")
    } else {
        console.log("nel")
    }
});

bc.getElement().addEventListener('click', () => {
    console.log(bc)
});