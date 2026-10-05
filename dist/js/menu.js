(function () {
    "use strict";
    document.addEventListener("DOMContentLoaded", initialiser);

    function initialiser (evt) {
        let btn = document.querySelector('.btn-menu');
        btn.addEventListener("click", ouvrirMenu);
        let liensPage = document.querySelectorAll('.menu-link');
        
        for (let menuActif of liensPage) {
            if (window.location.href == menuActif.href) {
                menuActif.classList.add('current');
            }
            menuActif.addEventListener("click", fermerMenu);
        }
    }

    function ouvrirMenu (evt) {
        let menu = document.querySelector('.menu-list');
        menu.classList.add('open');
        this.querySelector('i').classList.replace('fa-bars','fa-times');
        this.removeEventListener("click", ouvrirMenu);
        this.addEventListener("click", fermerMenu);
    }

    function fermerMenu (evt) {
        let menuferm = document.querySelector('.menu-list');
        menuferm.classList.remove('open');

        let btnBurger = document.querySelector(".btn-menu");
        btnBurger.querySelector("i").classList.replace('fa-times','fa-bars');
        btnBurger.removeEventListener("click", fermerMenu);
        btnBurger.addEventListener("click", ouvrirMenu);
    }

}());
