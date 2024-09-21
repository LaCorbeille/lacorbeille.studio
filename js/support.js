// Hide forms
const forms = document.querySelectorAll('.help, .bug, .contact');
const helpText = document.getElementById('helpText');

function hideForms() {
    forms.forEach(element => {
        element.style.display = 'none';
    });
    helpText.style.display = 'block';
}

hideForms();

// Show forms
document.getElementById('help').addEventListener('click', function () {
    hideForms();
    document.querySelectorAll('.help').forEach(element => {
        element.style.display = '';
    });
    helpText.style.display = 'none';
});

document.getElementById('bug').addEventListener('click', function () {
    hideForms();
    document.querySelectorAll('.bug').forEach(element => {
        element.style.display = '';
    });
    helpText.style.display = 'none';
});

document.getElementById('contact').addEventListener('click', function () {
    hideForms();
    document.querySelectorAll('.contact').forEach(element => {
        element.style.display = '';
    });
    helpText.style.display = 'none';
});