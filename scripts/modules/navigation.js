// Navigation System
class Navigation {
    constructor() {
        this.mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        this.navList = document.querySelector('.nav-list');
        this.navLinks = document.querySelectorAll('.nav-link');
        this.header = document.querySelector('.header');
        this.init();
        console.log('%c🧭 Navigation initialisée', 'color: #3F51B5; font-weight: bold;');
    }

    init() {
        this.attachEventListeners();
        this.setupScrollEffects();
    }

    attachEventListeners() {
        // Menu mobile
        if (this.mobileMenuBtn) {
            this.mobileMenuBtn.addEventListener('click', () => {
                const isActive = this.navList.classList.toggle('active');
                this.mobileMenuBtn.classList.toggle('active');
                console.log(`%c📱 Menu mobile: %c${isActive ? 'ouvert' : 'fermé'}`, 
                           'color: #3F51B5;', `color: ${isActive ? '#4CAF50' : '#f44336'}; font-weight: bold;`);
            });
        }

        // Navigation smooth scroll
        console.log(`%c🔗 Liens de navigation configurés: %c${this.navLinks.length}`, 
                   'color: #3F51B5;', 'color: #2196F3; font-weight: bold;');
        this.navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const targetId = link.getAttribute('href');
                const targetSection = document.querySelector(targetId);

                if (targetSection) {
                    console.log(`%c🎯 Navigation vers: %c${targetId}`, 
                               'color: #3F51B5; font-weight: bold;', 'color: #2196F3;');
                    
                    const headerHeight = this.header.offsetHeight;
                    const targetPosition = targetSection.offsetTop - headerHeight;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });

                    // Fermer le menu mobile
                    this.navList.classList.remove('active');
                    this.mobileMenuBtn.classList.remove('active');

                    // Mettre à jour le lien actif
                    this.navLinks.forEach(l => l.classList.remove('active'));
                    link.classList.add('active');
                } else {
                    console.warn(`%c⚠️ Section non trouvée: %c${targetId}`, 
                                'color: #FF9800;', 'color: #ff5722;');
                }
            });
        });

        // Scroll indicator
        const scrollIndicator = document.querySelector('.scroll-indicator');
        if (scrollIndicator) {
            console.log('%c⬇️ Indicateur de scroll configuré', 'color: #3F51B5;');
            scrollIndicator.addEventListener('click', () => {
                const aboutSection = document.querySelector('#apropos');
                if (aboutSection) {
                    console.log('%c📍 Scroll vers À propos', 'color: #3F51B5; font-weight: bold;');
                    const headerHeight = this.header.offsetHeight;
                    const targetPosition = aboutSection.offsetTop - headerHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
            
            scrollIndicator.style.cursor = 'pointer';
        }
    }

    setupScrollEffects() {
        let lastScrollY = 0;
        window.addEventListener('scroll', () => {
            const currentScrollY = window.scrollY;
            
            // Effet de scroll sur le header
            if (currentScrollY > 100 && !this.header.classList.contains('scrolled')) {
                this.header.classList.add('scrolled');
                console.log('%c📜 Header en mode scroll', 'color: #3F51B5;');
            } else if (currentScrollY <= 100 && this.header.classList.contains('scrolled')) {
                this.header.classList.remove('scrolled');
                console.log('%c🔝 Header en mode normal', 'color: #3F51B5;');
            }

            // Mise à jour de la navigation active (throttled)
            if (Math.abs(currentScrollY - lastScrollY) > 50) {
                this.updateActiveNavigation();
                lastScrollY = currentScrollY;
            }
        });
    }

    updateActiveNavigation() {
        const sections = document.querySelectorAll('section[id]');
        const scrollPosition = window.scrollY + this.header.offsetHeight + 100;

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            const sectionId = section.getAttribute('id');
            const correspondingLink = document.querySelector(`a[href="#${sectionId}"]`);

            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                this.navLinks.forEach(link => link.classList.remove('active'));
                if (correspondingLink) {
                    correspondingLink.classList.add('active');
                }
            }
        });
    }
}

// Initialiser la navigation
window.navigation = new Navigation();
