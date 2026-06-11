// dropdown.js - Solo UN dropdown abierto a la vez
document.addEventListener('DOMContentLoaded', function() {
    const dropdowns = document.querySelectorAll('.dropdown');
    const dropbtns = document.querySelectorAll('.dropbtn');

    dropbtns.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const currentDropdown = this.closest('.dropdown');
            const isCurrentlyOpen = currentDropdown.classList.contains('show');
            
            // CERRAR TODOS los dropdowns
            dropdowns.forEach(dropdown => {
                dropdown.classList.remove('show');
            });
            
            // Si el que hiciste clic NO estaba abierto, lo ABRIMOS
            if (!isCurrentlyOpen) {
                currentDropdown.classList.add('show');
            }
            // Si ya estaba abierto, se cierra (porque ya lo removimos arriba)
        });
    });

    // CERRAR dropdowns si haces clic fuera (opcional pero recomendado)
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.dropdown')) {
            dropdowns.forEach(dropdown => {
                dropdown.classList.remove('show');
            });
        }
    });
});