document.addEventListener("DOMContentLoaded", function () {
    var arrows = document.querySelectorAll('.has-arrow');
    arrows.forEach(function(arrow) {
        arrow.addEventListener('click', function () {
            var expanded = this.getAttribute('aria-expanded') === 'true' || false;
            this.setAttribute('aria-expanded', !expanded);
            var submenu = this.nextElementSibling;
            submenu.style.display = expanded ? 'none' : 'block';
        });
    });

});
