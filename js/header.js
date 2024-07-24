// Copy the user ID to the clipboard
document.getElementById('userId').addEventListener('click', function () {
    var userId = document.getElementById('userId');
    navigator.clipboard.writeText(userId.innerHTML);
    alert("Copied " + userId.innerHTML);
});

// Toggle Dropdown on desktop
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


// Toggle Dropdown and menu on mobile
document.getElementById('burgerMenu').addEventListener('click', function () {
    // Menu
    var menu = document.getElementById('menu');
    if (menu.classList.contains('active')) {
        menu.classList.remove('active');
    } else {
        menu.classList.add('active');
    }
    // Dropdown
    var accountDropdown = document.getElementById('accountDropdown');
    if (accountDropdown.classList.contains('active')) {
        accountDropdown.classList.remove('active');
    } else {
        accountDropdown.classList.add('active');
    }
});