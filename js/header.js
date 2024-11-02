// Toggle Dropdown and menu on mobile
try {
    document.getElementById('burgerMenu').addEventListener('click', function () {
        // Menu
        var menu = document.getElementById('menuMobile');
        if (menu.classList.contains('active')) {
            menu.classList.remove('active');
        } else {
            menu.classList.add('active');
        }
    });
} catch (error) {
    console.warn("Impossible de toggle la dropdown pour mobile :", error);
}

// Toggle Dropdown on desktop
try {
    document.getElementById('account').addEventListener('click', function () {
        var accountDropdown = document.getElementById('accountDropdown');
        if (accountDropdown.classList.contains('active')) {
            accountDropdown.classList.remove('active');
        } else {
            accountDropdown.classList.add('active');
        }
    });
    document.getElementsByTagName('main')[0].addEventListener('click', function () {
        // Disable the account Dropdown when clicking outside of it
        var accountDropdown = document.getElementById('accountDropdown');
        if (accountDropdown.classList.contains('active')) {
            accountDropdown.classList.remove('active');
        }
    });
} catch (error) {
    console.warn("Impossible d'activer la dropdown :", error);
}

// Copy the user ID to the clipboard
try {
    document.querySelectorAll('#userId').forEach(function (element) {
        element.addEventListener('click', function () {
            navigator.clipboard.writeText(element.textContent);
            alert("Copied " + element.textContent);
        });
    });
} catch (error) {
    console.error("Impossible d'activer la copie sur le pseudo :", error);
}