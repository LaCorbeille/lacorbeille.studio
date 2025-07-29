// Navigation System
class Navigation {
    constructor() {
        this.mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        this.navList = document.querySelector('.nav-list');
        this.navLinks = document.querySelectorAll('.nav-link');
        this.header = document.querySelector('.header');
        this.init();
    }

    init() {
        this.attachEventListeners();
        this.setupScrollEffects();
    }

    attachEventListeners() {
        // Menu mobile
        if (this.mobileMenuBtn) {
            this.mobileMenuBtn.addEventListener('click', () => {
                this.navList.classList.toggle('active');
                this.mobileMenuBtn.classList.toggle('active');
            });
        }

        // Navigation smooth scroll
        this.navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const targetId = link.getAttribute('href');
                const targetSection = document.querySelector(targetId);

                if (targetSection) {
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
                }
            });
        });

        // Scroll indicator
        const scrollIndicator = document.querySelector('.scroll-indicator');
        if (scrollIndicator) {
            scrollIndicator.addEventListener('click', () => {
                const aboutSection = document.querySelector('#apropos');
                if (aboutSection) {
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
        window.addEventListener('scroll', () => {
            // Effet de scroll sur le header
            if (window.scrollY > 100) {
                this.header.classList.add('scrolled');
            } else {
                this.header.classList.remove('scrolled');
            }

            // Mise à jour de la navigation active
            this.updateActiveNavigation();
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
