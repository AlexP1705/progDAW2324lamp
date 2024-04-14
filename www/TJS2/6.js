var posicionPersona1 = 70;
var posicionPersona2 = 150;


var velocidad = parseInt(prompt("Ingrese la velocidad de las personas en km/h:"));

var distanciaTotal = posicionPersona2 - posicionPersona1;

var tiempo = distanciaTotal / velocidad;

var posicionEncuentro = posicionPersona1 + velocidad * tiempo;

document.getElementById("entradas").innerHTML = "Posicion inicial de la primera persona: " + posicionPersona1 + " km<br>" +
    "Posicion inicial de la segunda persona: " + posicionPersona2 + " km<br>" +
    "Velocidad de las personas: " + velocidad + " km/h";

document.getElementById("salidas").innerHTML = "Las personas se encontraran en el kilometro " + posicionEncuentro + " de la carretera.";