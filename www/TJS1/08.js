var horasTrabajadas = 40; 
var pagoPorHora = 20;

var sueldoSemanal = horasTrabajadas * pagoPorHora;

document.getElementById("resultado").innerHTML = "El sueldo semanal del trabajador es: $" + sueldoSemanal;