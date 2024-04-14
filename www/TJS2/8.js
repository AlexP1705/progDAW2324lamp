var cantidadAPagar = 10;

var totalPagos = 0;

for (var i = 1; i <= 20; i++) {
    totalPagos += cantidadAPagar;

    cantidadAPagar *= 2;
}

document.getElementById("entradas").innerHTML = "Cantidad inicial a pagar en el primer mes: " + 10 + "€";

document.getElementById("salidas").innerHTML = "Total pagado después de 20 meses: " + totalPagos.toFixed(2) + "€";