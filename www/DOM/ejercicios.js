document.addEventListener("DOMContentLoaded", function() {

    // Ejercicio 1: 
    var botones = document.querySelectorAll('.oculta');

    botones.forEach(function(boton) {
        boton.addEventListener('click', function() {
            var divPadre = boton.parentElement;
            var parrafo = divPadre.querySelector('p');
            parrafo.style.display = (parrafo.style.display === 'none') ? 'block' : 'none';
            boton.textContent = (parrafo.style.display === 'none') ? 'Mostrar' : 'Ocultar';
        });
    });
    
    // Ejercicio 2: 
    var parrafos = document.querySelectorAll('p');
    parrafos.forEach(function(parrafo) {
        var palabras = parrafo.textContent.split(' ').filter(function(palabra) {
            return palabra.trim() !== '';
        }).length;
        parrafo.innerHTML += "<br><strong>Total palabras:</strong> " + palabras;
    });

    // Ejercicio 3: 
    parrafos.forEach(function(parrafo) {
        parrafo.innerHTML = parrafo.innerHTML.replace(/\bnulla\b/g, '<a href="http://google.com">nulla</a>');
    });

    // Ejercicio 4: 
    var h1s = document.querySelectorAll('h1');
    h1s.forEach(function(h1) {
        var imagen = document.createElement('img');
        imagen.src = 'https://lledogrupo.com/wp-content/uploads/2019/01/star-256.png';
        imagen.style.width = '16px';
        imagen.style.marginLeft = '10px';
        h1.insertAdjacentElement('afterend', imagen);
    });

    // Ejercicio 5: 
    var abstract = document.getElementById('abstract');
    abstract.addEventListener('click', function() {
        var colorActual = window.getComputedStyle(abstract).backgroundColor;
        if (colorActual === 'rgb(144, 238, 144)') {
            abstract.style.backgroundColor = 'red';
        } else {
            abstract.style.backgroundColor = 'lightgreen';
        }
    });

    // Ejercicio 6: 
    var content = document.getElementById('content');
    var fontSize = window.getComputedStyle(content).fontSize;
    var currentSize = parseInt(fontSize);
    content.addEventListener('click', function() {
        currentSize++;
        if (currentSize > parseInt(fontSize) * 2) {
            currentSize = parseInt(fontSize);
        }
        content.style.fontSize = currentSize + 'px';
    });

    // Ejercicio 7: 
    botones.forEach(function(boton) {
        boton.addEventListener('click', function() {
            var divContiguo = boton.nextElementSibling;
            divContiguo.style.display = (divContiguo.style.display === 'none' || divContiguo.style.display === '') ? 'block' : 'none';
            boton.textContent = (divContiguo.style.display === 'none' || divContiguo.style.display === '') ? 'Mostrar' : 'Ocultar';
        });
    });

    // Ejercicio 8: 
    var horaDiv = document.createElement('div');
    horaDiv.style.backgroundColor = 'red';
    horaDiv.style.border = '1px solid black';
    horaDiv.style.color = 'white';
    horaDiv.style.position = 'fixed';
    horaDiv.style.display = 'none';
    horaDiv.style.padding = '5px';

    document.body.appendChild(horaDiv);

    document.addEventListener('mousemove', function(event) {
        var horaActual = new Date();
        var hora = horaActual.getHours();
        var minutos = horaActual.getMinutes();
        var segundos = horaActual.getSeconds();
        horaDiv.textContent = hora + ":" + minutos + ":" + segundos;

        var x = event.clientX + 5;
        var y = event.clientY + 5;

        horaDiv.style.left = x + 'px';
        horaDiv.style.top = y + 'px';
    });

    parrafos.forEach(function(parrafo) {
        parrafo.addEventListener('mouseover', function() {
            horaDiv.style.display = 'block';
        });
        parrafo.addEventListener('mouseout', function() {
            horaDiv.style.display = 'none';
        });
    });

});
