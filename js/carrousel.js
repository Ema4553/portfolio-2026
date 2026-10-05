(function () {
    "use strict";
    document.addEventListener("DOMContentLoaded", function () {
        const imagesContainer = document.querySelector(".carrousel-images");
        const images = document.querySelectorAll(".carrousel-item");
        const nextBtn = document.querySelector(".carrousel-btn.right");
        const prevBtn = document.querySelector(".carrousel-btn.left");
        let currentIndex = 0;

        function updateCarousel() {
            // Calcul du décalage pour centrer l'image courante
            const offset = -currentIndex * 100;
            imagesContainer.style.transform = `translateX(${offset}%)`;
        }

        nextBtn.addEventListener("click", function () {
            // Passer à l'image suivante
            currentIndex = (currentIndex + 1) % images.length; // Boucle sur les images
            updateCarousel();
        });

        prevBtn.addEventListener("click", function () {
            // Passer à l'image précédente
            currentIndex = (currentIndex - 1 + images.length) % images.length; // Boucle en arrière
            updateCarousel();
        });

        updateCarousel(); // Affiche la première image au chargement
    });
})();
