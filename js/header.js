
        document.addEventListener("DOMContentLoaded", function () {
            var navbarToggler = document.querySelector(".navbar-toggler");
            var navbarNav = document.querySelector("#navbarNav");

            navbarToggler.addEventListener("click", function () {
                navbarNav.classList.toggle("show");
            });
        });
        