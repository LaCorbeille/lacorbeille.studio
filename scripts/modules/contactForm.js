// Contact Form Handler
class ContactForm {
    constructor() {
        this.form = document.getElementById('contactForm');
        this.init();
        console.log('%c📧 ContactForm initialisé', 'color: #795548; font-weight: bold;');
    }

    init() {
        if (!this.form) {
            console.warn('%c⚠️ Formulaire de contact non trouvé', 'color: #FF9800; font-weight: bold;');
            return;
        }

        console.log('%c✅ Formulaire de contact trouvé et configuré', 'color: #4CAF50;');
        this.form.addEventListener('submit', (e) => {
            e.preventDefault();
            this.handleSubmit();
        });
    }

    handleSubmit() {
        console.log('%c📤 Traitement du formulaire de contact', 'color: #795548; font-weight: bold;');
        
        const formData = new FormData(this.form);
        const name = formData.get('name');
        const email = formData.get('email');
        const subject = formData.get('subject');
        const message = formData.get('message');

        console.log(`%c👤 Contact de: %c${name} (${email})`, 'color: #795548;', 'color: #2196F3; font-weight: bold;');
        console.log(`%c📝 Sujet: %c${subject}`, 'color: #795548;', 'color: #2196F3;');

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

        console.log('%c📧 Ouverture du client email', 'color: #4CAF50; font-weight: bold;');
        // Ouvrir le client email
        window.location.href = mailtoUrl;

        // Message de confirmation
        alert('Votre client de messagerie va s\'ouvrir avec le message pré-rempli. Vous pouvez l\'envoyer directement !');

        // Reset du formulaire
        this.form.reset();
        console.log('%c🔄 Formulaire réinitialisé', 'color: #795548;');
    }
}

// Initialiser le gestionnaire de formulaire
window.contactForm = new ContactForm();
