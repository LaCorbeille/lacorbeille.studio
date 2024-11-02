// [SUPPORT] Hide forms
const forms = document.querySelectorAll('.help, .bug, .contact');
const helpText = document.getElementById('helpText');

function hideForms() {
    forms.forEach(element => {
        element.style.display = 'none';
    });
    helpText.style.display = 'block';
}

hideForms();

// [SUPPORT] Show forms
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

// [FAQ] Initialize
const faqSection = document.getElementById('faq');
const faqHeaders = faqSection.querySelectorAll('h2');

faqHeaders.forEach(header => {
    header.addEventListener('click', function () {
        const isActive = header.classList.contains('active');
        faqHeaders.forEach(h => h.classList.remove('active'));

        // Masquer toutes les questions
        const allQuestions = faqSection.querySelectorAll('.question');
        allQuestions.forEach(q => q.style.display = 'none');

        if (!isActive) {
            header.classList.add('active');

            // Afficher toutes les questions associées au header actif
            let sibling = header.nextElementSibling;
            while (sibling && sibling.classList.contains('question')) {
                sibling.style.display = 'block';
                sibling = sibling.nextElementSibling;
            }
        }
    });
});