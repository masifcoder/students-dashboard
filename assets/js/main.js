// Mobile sidebar toggle
document.addEventListener('DOMContentLoaded', function () {
    const sidebarToggleBtn = document.getElementById('sidebarToggle');
    const sidebar = document.querySelector('.sidebar');

    if (sidebarToggleBtn && sidebar) {
        sidebarToggleBtn.addEventListener('click', function () {
            sidebar.classList.toggle('show');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function (event) {
            if (window.innerWidth < 992) {
                const isClickInside = sidebar.contains(event.target) || sidebarToggleBtn.contains(event.target);
                if (!isClickInside && sidebar.classList.contains('show')) {
                    sidebar.classList.remove('show');
                }
            }
        });
    }
});
