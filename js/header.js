// On desktop
document.getElementById('account').addEventListener('click', function () {
    // Toggle the 'active' class on the account Dropdown
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


// On mobile
document.getElementById('burgerMenu').addEventListener('click', function () {
    // Toggle the 'active' class on the menu
    var menu = document.getElementById('menu');
    if (menu.classList.contains('active')) {
        menu.classList.remove('active');
    } else {
        menu.classList.add('active');
    }
    // Toggle the 'active' class on the account Dropdown
    var accountDropdown = document.getElementById('accountDropdown');
    if (accountDropdown.classList.contains('active')) {
        accountDropdown.classList.remove('active');
    } else {
        accountDropdown.classList.add('active');
    }
});