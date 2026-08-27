let button = document.querySelector('button');

button.addEventListener('click', function() {
    alert('puto el que lo lea');
    document.body.style.backgroundColor = '#6d2424';

    document.querySelector('div[name="imagenPelado"]').innerHTML = 
    '<img src="images/pelado.jpg" alt="Imagen Pelado">';

});

