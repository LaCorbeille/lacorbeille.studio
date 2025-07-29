// Contact Form Handler
class ContactForm {
    constructor() {
        this.form = document.getElementById('contactForm');
        this.init();
    }

    init() {
        if (!this.form) return;

        this.form.addEventListener('submit', (e) => {
            e.preventDefault();
            this.handleSubmit();
        });
    }

    handleSubmit() {
        const formData = new FormData(this.form);
        const name = formData.get('name');
        const email = formData.get('email');
        const subject = formData.get('subject');
        const message = formData.get('message');

        // Mappage des sujets
        const subjectMap = {
            'collaboration': 'Collaboration',
            'press': 'Presse / Média',
            'business': 'Partenariat commercial',
            'other': 'Autre'
        };

        const subjectText = subjectMap[subject] || subject;

        // Création du corps de l'email
        const emailBody = `Bonjour LaCorbeille STUDIO,

Nom: ${name}
Email: ${email}

Message:
${message}

Cordialement,
${name}`;

        const mailtoUrl = `mailto:contact@lacorbeille.studio?subject=${encodeURIComponent(subjectText)}&body=${encodeURIComponent(emailBody)}`;

        // Ouvrir le client email
        window.location.href = mailtoUrl;

        // Message de confirmation
        alert('Votre client de messagerie va s\'ouvrir avec le message pré-rempli. Vous pouvez l\'envoyer directement !');

        // Reset du formulaire
        this.form.reset();
    }
}

// Initialiser le gestionnaire de formulaire
window.contactForm = new ContactForm();
