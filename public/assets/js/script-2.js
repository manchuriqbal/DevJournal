
document.addEventListener('DOMContentLoaded', function () {
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const sidebar = document.getElementById('sidebar');

    mobileMenuButton.addEventListener('click', function () {
        sidebar.classList.toggle('hidden');
    });

    // Sidebar dropdown menus
    const dropdownToggles = document.querySelectorAll('.sidebar-dropdown-toggle');

    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function (e) {
            e.stopPropagation();
            const dropdownMenu = this.nextElementSibling;

            // Close all other dropdowns except this one
            document.querySelectorAll('.sidebar-dropdown-menu').forEach(menu => {
                if (menu !== dropdownMenu) {
                    menu.classList.add('hidden');
                }
            });

            // Toggle this dropdown
            dropdownMenu.classList.toggle('hidden');
        });
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', function () {
        document.querySelectorAll('.sidebar-dropdown-menu').forEach(menu => {
            menu.classList.add('hidden');
        });
    });

    // User dropdown menu
    const userMenuButton = document.getElementById('user-menu-button');
    const userMenu = document.getElementById('user-menu');

    userMenuButton.addEventListener('click', function (e) {
        e.stopPropagation();
        userMenu.classList.toggle('hidden');
    });

    // Close user menu when clicking outside
    document.addEventListener('click', function () {
        userMenu.classList.add('hidden');
    });
});
