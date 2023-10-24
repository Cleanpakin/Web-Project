var elem = document.getElementById('carrusel');
var right = document.getElementById('carrousel-right');
var left = document.getElementById('carrousel-left');

right.addEventListener('click', function () {
    elem.scrollLeft += 800;
});

left.addEventListener('click', function () {
    elem.scrollLeft -= 800;
});

var elem1 = document.getElementById('carrusel1');
var right1 = document.getElementById('carrousel-right1');
var left1 = document.getElementById('carrousel-left1');

right1.addEventListener('click', function () {
    elem1.scrollLeft += 800;
});

left1.addEventListener('click', function () {
    elem1.scrollLeft -= 800;
});

