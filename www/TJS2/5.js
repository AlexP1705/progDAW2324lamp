var tipoTarjeta = parseInt(prompt("Ingrese el tipo de tarjeta de credito (1, 2, 3 u otro):"));

var limiteCredito = parseFloat(prompt("Ingrese el limite de credito actual:"));

var aumento;
switch (tipoTarjeta) {
    case 1:
        aumento = 0.25;
        break;
    case 2:
        aumento = 0.35;
        break;
    case 3:
        aumento = 0.40;
        break;
    default:
        aumento = 0.50;
        break;
}

var nuevoLimiteCredito = limiteCredito * (1 + aumento);

document.getElementById("entradas").innerHTML = "Tipo de tarjeta: " + tipoTarjeta + ", Limite de credito actual: " + limiteCredito.toFixed(2) + "€";

document.getElementById("salidas").innerHTML = "Nuevo limite de crédito: " + nuevoLimiteCredito.toFixed(2) + "€";