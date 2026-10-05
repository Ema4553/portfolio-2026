(function () {
    "use strict";
    document.addEventListener("DOMContentLoaded", initialiser);

    function initialiser (evt) {
        let btnScrollTop = document.getElementById("scrollTopBtn");
        btnScrollTop.addEventListener("click", scrollTop);
        window.addEventListener("scroll", verifScroll);
    }

    function verifScroll () {
        let btn = document.getElementById("scrollTopBtn");
        
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            btn.style.opacity = 1;
            btn.style.visibility = "visible";
        } else {
                btn.style.opacity = 0;
                btn.style.visibility = "hidden";
            }
    }

    function scrollTop (evt) {
        
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        })
    }

}());