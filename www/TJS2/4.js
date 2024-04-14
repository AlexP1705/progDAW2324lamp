var zona = parseInt(prompt("Ingrese la zona de destino del paquete (1 a 5):"));

var pesoGramos = parseFloat(prompt("Ingrese el peso del paquete en gramos:"));

var costoPorGramo;
switch (zona) {
    case 1:
        costoPorGramo = 11.00 / 1000; 
        break;
    case 2:
        costoPorGramo = 10.00 / 1000;
        break;
    case 3:
        costoPorGramo = 12.00 / 1000;
        break;
    case 4:
        costoPorGramo = 24.00 / 1000;
        break;
    case 5:
        costoPorGramo = 27.00 / 1000;
        break;
    default:
        document.getElementById("entradas").innerHTML = "Zona de destino inválida.";
        document.getElementById("salidas").innerHTML = "";
        break;
}

if (pesoGramos > 5000) {
    document.getElementById("entradas").innerHTML = "Zona de destino: " + zona + ", Peso del paquete: " + pesoGramos.toFixed(2) + " gramos";
    document.getElementById("salidas").innerHTML = "El paquete no puede ser transportado debido a que supera los 5 kg (5000 gramos).";
} else {
    var costoTotal = costoPorGramo * pesoGramos;

    document.getElementById("entradas").innerHTML = "Zona de destino: " + zona + ", Peso del paquete: " + pesoGramos.toFixed(2) + " gramos";
    document.getElementById("salidas").innerHTML = "Costo del servicio de paqueteria: " + costoTotal.toFixed(2) + "€";
}