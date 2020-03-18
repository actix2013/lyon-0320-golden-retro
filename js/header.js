var sidebar = document.querySelector('.menu_sidebar');
var menu = document.querySelector('.menu_burger');
var activatedClass = 'burger_activated';

menu.addEventListener('click', function(effect) {
    effect.preventDefault();

    this.parentNode.nextElementSibling.classList.add(activatedClass);


})