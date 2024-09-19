// Hide forms
const forms = document.querySelectorAll('.help, .bug, .contact');

function hideForms() {
    forms.forEach(element => {
        element.style.display = 'none';
    });
}

hideForms();

// Show forms
document.getElementById('help').addEventListener('click', function () {
    hideForms();
    document.querySelectorAll('.help').forEach(element => {
        element.style.display = '';
    });
});

document.getElementById('bug').addEventListener('click', function () {
    hideForms();
    document.querySelectorAll('.bug').forEach(element => {
        element.style.display = '';
    });
});

document.getElementById('contact').addEventListener('click', function () {
    hideForms();
    document.querySelectorAll('.contact').forEach(element => {
        element.style.display = '';
    });
});