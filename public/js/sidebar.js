const toggleButton = document.getElementById('sidebarToggle');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');

toggleButton.addEventListener('click', () => {
    sidebar.classList.toggle('-translate-x-full');
    overlay.classList.toggle('hidden');
});

// Hide sidebar when clicking the overlay
overlay.addEventListener('click', () => {
    sidebar.classList.add('-translate-x-full');
    overlay.classList.add('hidden');
});

const toggle = document.getElementById('userDropdownToggle');
    const menu = document.getElementById('userDropdownMenu');

    toggle.addEventListener('click', () => {
        if (menu.classList.contains('opacity-0')) {
            menu.classList.remove('opacity-0', 'scale-95', 'pointer-events-none');
            menu.classList.add('opacity-100', 'scale-100');
        } else {
            menu.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
            menu.classList.remove('opacity-100', 'scale-100');
        }
    });

    // Optional: close dropdown when clicking outside
    document.addEventListener('click', (e) => {
        if (!toggle.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
            menu.classList.remove('opacity-100', 'scale-100');
        }
    });

    document.getElementById('goBackButton').addEventListener('click', function(event) {
        event.preventDefault();

        if (window.history.length > 2 && document.referrer !== '') {
            history.back();
        } else {
            window.location.href = "{{ route('admin.dashboard') }}"; // fallback if no history
        }
    });