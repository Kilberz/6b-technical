//
// Menu Collapse
//
document.addEventListener('DOMContentLoaded', function() {
    // Get references to the button and menu
    const navbarButton = document.getElementById('navbar-button');
    const navbarMenu = document.getElementById('navbar-default');

    // Check if elements exist
    if (navbarButton && navbarMenu) {
        navbarButton.addEventListener('click', function() {
            // Toggle the 'hidden' class to show/hide the menu
            navbarMenu.classList.toggle('hidden');
            
            // Toggle aria-expanded attribute
            const isExpanded = navbarMenu.classList.contains('hidden');
            navbarButton.setAttribute('aria-expanded', !isExpanded);
        });
    }
});

//
// Slider
//
new Glide(".glide", {
    hoverpause: true,
    breakpoints: {
    },
}).mount();