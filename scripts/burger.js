const body = document.querySelector('body');
const burger = document.getElementById('burger');
const menuItems = document.querySelector('.menu-items');
const menuItemsHidden = document.querySelector('.menu-items-hidden')



function toggleClassName () {
    burger.classList.toggle('burger');
    burger.classList.toggle('burger-cross');

    burger.childNodes[1].classList.toggle('top');
    burger.childNodes[1].classList.toggle('top-cross');

    burger.childNodes[3].classList.toggle('bottom');
    burger.childNodes[3].classList.toggle('bottom-cross');

    menuItems.classList.toggle('menu-items');
    menuItems.classList.toggle('menu-items-hidden');
    body.classList.toggle('no_scroll');
    menuItems.classList.toggle('active');

    menuItemsHidden.onscroll = function () { window.scrollTo(0, 0); };


    menuItems.className;
    menuItems.style.left = 0;

}

burger.addEventListener("click", toggleClassName);


