// Navigation and Mobile Menu
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const navList = document.querySelector('.nav-list');
    const navLinks = document.querySelectorAll('.nav-link');
    const header = document.querySelector('.header');

    // Mobile menu toggle
    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', function() {
            navList.classList.toggle('active');
            mobileMenuBtn.classList.toggle('active');
        });
    }

    // Smooth scrolling for navigation links
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetSection = document.querySelector(targetId);

            if (targetSection) {
                const headerHeight = header.offsetHeight;
                const targetPosition = targetSection.offsetTop - headerHeight;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });

                // Close mobile menu if open
                navList.classList.remove('active');
                mobileMenuBtn.classList.remove('active');

                // Update active link
                navLinks.forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            }
        });
    }
    );

    // Header scroll effect
    window.addEventListener('scroll', function() {
        if (window.scrollY > 100) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }

        // Update active navigation based on scroll position
        updateActiveNavigation();
    });

    // Update active navigation based on scroll position
    function updateActiveNavigation() {
        const sections = document.querySelectorAll('section[id]');
        const scrollPosition = window.scrollY + header.offsetHeight + 100;

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            const sectionId = section.getAttribute('id');
            const correspondingLink = document.querySelector(`a[href="#${sectionId}"]`);

            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                navLinks.forEach(link => link.classList.remove('active'));
                if (correspondingLink) {
                    correspondingLink.classList.add('active');
                }
            }
        }
        );
    }

    // Scroll indicator click handler
    const scrollIndicator = document.querySelector('.scroll-indicator');
    if (scrollIndicator) {
        scrollIndicator.addEventListener('click', function() {
            const aboutSection = document.querySelector('#apropos');
            if (aboutSection) {
                const headerHeight = header.offsetHeight;
                const targetPosition = aboutSection.offsetTop - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
        
        // Add cursor pointer style
        scrollIndicator.style.cursor = 'pointer';
    }

    // Game details modal
    const gameCards = document.querySelectorAll('.game-card');
    const modal = document.getElementById('gameModal');
    const modalContent = document.getElementById('gameModalContent');
    const modalClose = document.querySelector('.modal-close');

    // Game data
    const gameData = {
        'lelab': {
            title: 'LeLAB',
            status: 'En développement',
            platforms: ['Windows', 'Linux'],
            description: 'LeLAB est notre laboratoire d\'expérimentations interactives où nous explorons de nouvelles mécaniques de jeu et des concepts innovants. Ce projet nous permet de tester des idées créatives avant de les intégrer dans nos productions principales.',
            features: ['Mécaniques expérimentales', 'Interface modulaire', 'Système de feedback en temps réel', 'Outils de création communautaire'],
            screenshots: ['assets/games/LeLAB/LeLAB - Banner.jpg'],
            releaseDate: 'T2 2025',
            genre: 'Expérimental / Sandbox'
        },
        'rice-battle': {
            title: 'Rice Battle',
            status: 'Prototype',
            platforms: ['Windows', 'Linux', 'Switch'],
            description: 'Rice Battle est un jeu de combat stratégique qui se déroule dans un univers culinaire unique. Les joueurs s\'affrontent dans des batailles épiques en utilisant différentes variétés de riz comme armes et sorts.',
            features: ['Combat stratégique au tour par tour', 'Plus de 20 variétés de riz différentes', 'Mode multijoueur local et en ligne', 'Système de craft d\'équipements'],
            screenshots: ['assets/games/Rice Battle/RiceBattle - Banner.jpg'],
            releaseDate: 'T4 2025',
            genre: 'Stratégie / Combat'
        },
        'little-adventure': {
            title: 'A Little Adventure',
            status: 'Prototype',
            platforms: ['Windows', 'Linux'],
            description: 'A Little Adventure est un jeu d\'aventure narratif touchant qui raconte l\'histoire d\'un petit personnage dans un grand monde. Malgré sa taille modeste, cette aventure promet de grandes émotions.',
            features: ['Narration immersive', 'Art style minimaliste', 'Puzzles environnementaux', 'Bande sonore émotionnelle'],
            screenshots: ['assets/games/A Little Adventure/ALittleAdventure - Banner.jpg'],
            releaseDate: 'T1 2026',
            genre: 'Aventure / Narratif'
        },
        'bot-anic': {
            title: 'BOT A.N.I.C',
            status: 'Concept',
            platforms: ['Windows', 'Linux', 'PlayStation', 'Xbox'],
            description: 'BOT A.N.I.C explore la relation entre intelligence artificielle et nature. Dans ce jeu, vous incarnez un robot jardinier chargé de restaurer un écosystème détruit, en apprenant à comprendre et respecter la nature.',
            features: ['IA évolutive', 'Simulation d\'écosystème', 'Crafting organique', 'Multiples fins selon vos choix'],
            screenshots: ['https://placehold.co/800x400?text=BOT+A.N.I.C+Banner'],
            releaseDate: 'TBD',
            genre: 'Simulation / Aventure'
        },
        'archipel': {
            title: 'Archipel',
            status: 'Concept',
            platforms: ['Windows', 'Linux'],
            description: 'Archiper vous invite à explorer un archipel mystérieux rempli de secrets anciens. Naviguez entre les îles, découvrez des civilisations perdues et percez les mystères de cet univers aquatique.',
            features: ['Exploration maritime', 'Découverte de civilisations', 'Système de navigation dynamique', 'Mystères à résoudre'],
            screenshots: ['https://placehold.co/800x400?text=Archipel+Banner'],
            releaseDate: 'TBD',
            genre: 'Exploration / Aventure'
        }
    };

    // Open game modal
    gameCards.forEach(card => {
        card.addEventListener('click', function() {
            const gameId = this.getAttribute('data-game');
            const game = gameData[gameId];

            if (game) {
                showGameModal(game);
            }
        });

        // Also handle the button click
        const detailsBtn = card.querySelector('.game-details-btn');
        if (detailsBtn) {
            detailsBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                const gameId = card.getAttribute('data-game');
                const game = gameData[gameId];

                if (game) {
                    showGameModal(game);
                }
            });
        }
    }
    );

    // Show game modal
    function showGameModal(game) {
        const statusClass = game.status === 'En développement' ? 'development' : game.status === 'Prototype' ? 'prototype' : 'concept';

        modalContent.innerHTML = `
            <div class="game-modal-header">
                <h2>${game.title}</h2>
            </div>
            <div class="game-modal-image">
                <img src="${game.screenshots[0]}" alt="${game.title}" style="width: 100%; height: 300px; object-fit: cover; border-radius: 12px; margin: 1rem 0;">
            </div>
            <div class="game-modal-info">
                <div class="game-modal-meta">
                    <div class="meta-item">
                        <strong>Genre:</strong> ${game.genre}
                    </div>
                    <div class="meta-item">
                        <strong>Plateformes:</strong> ${game.platforms.join(', ')}
                    </div>
                    <div class="meta-item">
                        <strong>Sortie prévue:</strong> ${game.releaseDate}
                    </div>
                </div>
                <div class="game-status-container">
                    <span class="game-status ${statusClass}">${game.status}</span>
                </div>
                <div class="game-modal-description">
                    <h3>Description</h3>
                    <p>${game.description}</p>
                </div>
                <div class="game-modal-features">
                    <h3>Caractéristiques principales</h3>
                    <ul>
                        ${game.features.map(feature => `<li>${feature}</li>`).join('')}
                    </ul>
                </div>
            </div>
        `;

        modal.style.display = 'block';
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
        
        // Add smooth transition for modal appearance
        setTimeout(() => {
            modal.style.opacity = '1';
            
            // Check if content is scrollable and add scroll indicators
            const modalContentElement = modal.querySelector('.modal-content');
            if (modalContentElement.scrollHeight > modalContentElement.clientHeight) {
                modalContentElement.classList.add('has-scroll');
            }
        }, 10);
    }

    // Close modal
    function closeModal() {
        modal.style.opacity = '0';
        modal.classList.remove('show');
        
        // Remove scroll indicators
        const modalContentElement = modal.querySelector('.modal-content');
        modalContentElement.classList.remove('has-scroll');
        
        setTimeout(() => {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }, 300);
    }

    if (modalClose) {
        modalClose.addEventListener('click', closeModal);
    }

    // Close modal when clicking outside
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.style.display === 'block') {
            closeModal();
        }
    });

    // Contact form
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form data
            const formData = new FormData(this);
            const name = formData.get('name');
            const email = formData.get('email');
            const subject = formData.get('subject');
            const message = formData.get('message');

            // Map subject values to French labels
            const subjectMap = {
                'collaboration': 'Collaboration',
                'press': 'Presse / Média',
                'business': 'Partenariat commercial',
                'other': 'Autre'
            };

            const subjectText = subjectMap[subject] || subject;

            // Create mailto URL
            const emailBody = `Bonjour LaCorbeille STUDIO,

Nom: ${name}
Email: ${email}

Message:
${message}

Cordialement,
${name}`;

            const mailtoUrl = `mailto:contact@lacorbeille.studio?subject=${encodeURIComponent(subjectText)}&body=${encodeURIComponent(emailBody)}`;

            // Open default email client
            window.location.href = mailtoUrl;

            // Show confirmation message
            alert('Votre client de messagerie va s\'ouvrir avec le message pré-rempli. Vous pouvez l\'envoyer directement !');

            // Reset form
            this.reset();
        });
    }

    // Scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        }
        );
    }
    ,observerOptions);

    // Observe elements for animation
    const animatedElements = document.querySelectorAll('.game-card, .news-card, .stat');
    animatedElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    }
    );
});