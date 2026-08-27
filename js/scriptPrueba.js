let button = document.querySelector('button');

button.addEventListener('click', function() {
    document.body.style.backgroundColor = '#6d2424';

    document.querySelector('div[name="imagenPelado"]').innerHTML = 
    '<img src="image/pelado.jpg" alt="Imagen Pelado">';

    alert('puto el que lo lea');

});

