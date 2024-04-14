var numVentas = parseInt(prompt("Ingrese el número de ventas realizadas durante el día:"));

var ventasMayor1000 = 0;
var montoMayor1000 = 0;
var ventasEntre500y1000 = 0;
var montoEntre500y1000 = 0;
var ventasMenorIgual500 = 0;
var montoMenorIgual500 = 0;
var montoTotal = 0;

for (var i = 0; i < numVentas; i++) {
    var montoVenta = parseFloat(prompt("Ingrese el monto de la venta " + (i + 1) + " en euros:"));

    montoTotal += montoVenta;

    if (montoVenta > 1000) {
        ventasMayor1000++;
        montoMayor1000 += montoVenta;
    } else if (montoVenta > 500) {
        ventasEntre500y1000++;
        montoEntre500y1000 += montoVenta;
    } else {
        ventasMenorIgual500++;
        montoMenorIgual500 += montoVenta;
    }
}

document.getElementById("entradas").innerHTML = "Número de ventas realizadas durante el día: " + numVentas;
document.getElementById("salidas").innerHTML = "Ventas mayores a 1000€: " + ventasMayor1000 + ", Monto total: " + montoMayor1000.toFixed(2) + "€<br>" +
    "Ventas entre 500€ y 1000€: " + ventasEntre500y1000 + ", Monto total: " + montoEntre500y1000.toFixed(2) + "€<br>" +
    "Ventas menores o iguales a 500€: " + ventasMenorIgual500 + ", Monto total: " + montoMenorIgual500.toFixed(2) + "€<br>" +
    "Monto total de todas las ventas: " + montoTotal.toFixed(2) + "€";