const filterBtn = document.getElementById('filterStatusBtn');
    const dropdown = document.getElementById('filterDropdown');
    const tooltip = document.getElementById('tooltipDropdown');

    let isOpen = false;

    filterBtn.addEventListener('click', () => {
        isOpen = !isOpen;
        dropdown.classList.toggle('hidden', !isOpen);

        // Hide tooltip manually when dropdown is open
        if (isOpen) {
            tooltip.classList.add('!hidden');
        } else {
            tooltip.classList.remove('!hidden');
        }
    });

    // Hide dropdown if clicked outside
    document.addEventListener('click', (e) => {
        if (!filterBtn.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.add('hidden');
            isOpen = false;
            tooltip.classList.remove('!hidden');
        }
    });
