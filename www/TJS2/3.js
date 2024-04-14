var clave = parseInt(prompt("Ingrese la clave del articulo (1, 2, 3, 4, 5 o 6):"));

var costoMateriaPrima = parseFloat(prompt("Ingrese el costo de la materia prima:"));

var costoManoDeObra;
if (clave === 3 || clave === 4) {
    costoManoDeObra = 0.75 * costoMateriaPrima;
} else if (clave === 1 || clave === 5) {
    costoManoDeObra = 0.80 * costoMateriaPrima;
} else {
    costoManoDeObra = 0.85 * costoMateriaPrima;
}

var gastoFabricacion;
if (clave === 2 || clave === 5) {
    gastoFabricacion = 0.30 * costoMateriaPrima;
} else if (clave === 3 || clave === 6) {
    gastoFabricacion = 0.35 * costoMateriaPrima;
} else {
    gastoFabricacion = 0.28 * costoMateriaPrima;
}

var costoProduccion = costoMateriaPrima + costoManoDeObra + gastoFabricacion;

var precioVenta = costoProduccion + 0.45 * costoProduccion;

document.getElementById("entradas").innerHTML = "Clave del articulo: " + clave + ", Costo de materia prima: " + costoMateriaPrima.toFixed(2);

document.getElementById("salidas").innerHTML = "Precio de venta: " + precioVenta.toFixed(2) + "€";