var numTrabajadores = parseInt(prompt("Ingrese el número de trabajadores:"));

var totalPagado = 0;

for (var i = 1; i <= numTrabajadores; i++) {
    var horasTrabajadas = parseFloat(prompt("Ingrese las horas trabajadas por el trabajador " + i + ":"));

    var tarifaHoraria = parseFloat(prompt("Ingrese la tarifa horaria del trabajador " + i + " en euros por hora:"));

    var sueldoSemanal = horasTrabajadas * tarifaHoraria;

    totalPagado += sueldoSemanal;
}

document.getElementById("entradas").innerHTML = "Número de trabajadores: " + numTrabajadores;

document.getElementById("salidas").innerHTML = "Total pagado por la empresa por los " + numTrabajadores + " empleados: " + totalPagado.toFixed(2) + "€";