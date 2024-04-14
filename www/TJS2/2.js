var precios = [200.00, 200.00, 200.00, 150.00, 150.00, 100.00, 100.00, 100.00, 50.00];

var numeroCita = parseInt(prompt("Introduce el numero de cita actual:"));

if (numeroCita < 1 || numeroCita > precios.length) {
    alert("Numero de cita no valido.");
} else {
    var costoCitaActual = precios[numeroCita - 1];

    var costoTotalTratamiento = 0;
    for (var i = 0; i < numeroCita; i++) {
        costoTotalTratamiento += precios[i];
    }

    document.getElementById("entradas").innerHTML = "Numero de cita actual: " + numeroCita;
    
    document.getElementById("salidas").innerHTML = "Costo de la cita actual: " + costoCitaActual.toFixed(2) + "€<br>" +
        "Costo total del tratamiento: " + costoTotalTratamiento.toFixed(2) + "€";
}