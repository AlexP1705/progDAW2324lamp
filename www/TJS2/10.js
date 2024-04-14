var numCiudades = parseInt(prompt("Ingrese el número de ciudades:"));

var recaudacionTotal = 0;

for (var c = 1; c <= numCiudades; c++) {
    var numTiendas = parseInt(prompt("Ingrese el número de tiendas en la ciudad " + c + ":"));

    var recaudacionCiudad = 0;

    for (var t = 1; t <= numTiendas; t++) {

        var numEmpleados = parseInt(prompt("Ingrese el número de empleados en la tienda " + t + " de la ciudad " + c + ":"));

        var recaudacionTienda = 0;

        for (var n = 1; n <= numEmpleados; n++) {
            var ventaEmpleado = parseFloat(prompt("Ingrese la cantidad vendida por el empleado " + n + " de la tienda " + t + " en la ciudad " + c + " en euros:"));

            recaudacionTienda += ventaEmpleado;
        }

        recaudacionCiudad += recaudacionTienda;
    }

    recaudacionTotal += recaudacionCiudad;
}

document.getElementById("entradas").innerHTML = "Número de ciudades: " + numCiudades;

document.getElementById("salidas").innerHTML = "Recaudación total de la cadena en un solo día: " + recaudacionTotal.toFixed(2) + "€";