var precioSimple = 20.00;
var precioDoble = 25.00;
var precioTriple = 28.00;

var cargoTarjeta = 0.05;

var tipoHamburguesa = prompt("Introduce el tipo de hamburguesa (simple, doble o triple):").toLowerCase();

var cantidadHamburguesas = parseInt(prompt("Introduce la cantidad de hamburguesas:"));

var costoTotalSinCargo = 0;

switch (tipoHamburguesa) {
    case "simple":
        costoTotalSinCargo = cantidadHamburguesas * precioSimple;
        break;
    case "doble":
        costoTotalSinCargo = cantidadHamburguesas * precioDoble;
        break;
    case "triple":
        costoTotalSinCargo = cantidadHamburguesas * precioTriple;
        break;
    default:
        alert("Tipo de hamburguesa no válido.");
}

var cargoPorTarjeta = costoTotalSinCargo * cargoTarjeta;

var costoTotalConCargo = costoTotalSinCargo + cargoPorTarjeta;

document.getElementById("entradas").innerHTML = "Tipo de hamburguesa: " + tipoHamburguesa + "<br>" +
    "Cantidad de hamburguesas: " + cantidadHamburguesas;
    
document.getElementById("salidas").innerHTML = "Costo total sin cargo por tarjeta: " + costoTotalSinCargo.toFixed(2) + "€<br>" +
    "Cargo por tarjeta: " + cargoPorTarjeta.toFixed(2) + "€<br>" +
    "Costo total con cargo por tarjeta: " + costoTotalConCargo.toFixed(2) + "€";