document.addEventListener("DOMContentLoaded", function () {
    console.log("El DOM ha cargado completamente");
    const arrowLinks = document.querySelectorAll('.has-arrow');

    arrowLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const submenu = link.nextElementSibling;
            submenu.classList.toggle('show');
        });
    });
});





