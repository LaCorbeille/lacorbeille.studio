// Animations and Visual Effects
class AnimationManager {
    constructor() {
        this.init();
        console.log('%c🎨 AnimationManager initialisé', 'color: #E91E63; font-weight: bold;');
    }

    init() {
        this.setupScrollAnimations();
    }

    setupScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    
                    const elementType = entry.target.className.split(' ')[0];
                    console.log(`%c✨ Animation déclenchée: %c${elementType}`, 
                               'color: #E91E63;', 'color: #2196F3; font-weight: bold;');
                }
            });
        }, observerOptions);

        // Éléments à animer
        const animatedElements = document.querySelectorAll('.game-card, .news-card, .stat');
        console.log(`%c🎬 Éléments configurés pour l'animation: %c${animatedElements.length}`, 
                   'color: #E91E63; font-weight: bold;', 'color: #2196F3;');
        
        animatedElements.forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    }
}

// Initialiser le gestionnaire d'animations
window.animationManager = new AnimationManager();
