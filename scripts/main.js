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

    // News modal system
    const newsCards = document.querySelectorAll('.news-card');
    const newsModal = document.getElementById('newsModal') || createNewsModal();

    // News data
    const newsData = {
        'website': {
            title: 'Nouveau site web en ligne !',
            date: '28 Juillet 2025',
            image: 'assets/news/news_website.webp',
            content: `
                <p>Nous sommes ravis de vous présenter le nouveau site web de LaCorbeille STUDIO ! Après plusieurs mois de développement, nous avons créé une plateforme moderne qui reflète notre identité et nos valeurs.</p>
                
                <h4>🎨 Design moderne et responsif</h4>
                <p>Le nouveau design utilise notre palette de couleurs signature avec des dégradés violets et cyan, créant une expérience visuelle immersive. Le site s'adapte parfaitement à tous les appareils, du mobile au desktop.</p>
                
                <h4>⚡ Performance optimisée</h4>
                <p>Nous avons mis l'accent sur la performance avec un temps de chargement ultra-rapide, des images optimisées et une architecture CSS modulaire utilisant les dernières technologies web.</p>
                
                <h4>🎮 Présentation de nos jeux</h4>
                <p>Découvrez nos projets en cours avec des modales interactives, des captures d'écran haute qualité et des informations détaillées sur chaque jeu.</p>
                
                <h4>📱 SEO et accessibilité</h4>
                <p>Le site est entièrement optimisé pour les moteurs de recherche et respecte les standards d'accessibilité pour être utilisable par tous.</p>
                
                <p>Nous espérons que cette nouvelle expérience vous plaira ! N'hésitez pas à nous faire part de vos retours.</p>
            `,
            action: {
                text: 'Laisser un avis Google',
                url: 'https://share.google/zZhVolTMXj5qokXrK',
                icon: '⭐'
            }
        },
        'lelab': {
            title: 'LeLAB entre en phase de développement',
            date: '20 Juillet 2025',
            image: 'assets/news/news_lelab.jpg',
            content: `
                <p>C'est avec une grande fierté que nous annonçons le passage de LeLAB en phase de développement actif ! Ce projet, qui nous tient particulièrement à cœur, représente notre laboratoire d'expérimentations interactives.</p>
                
                <h4>🔬 Un laboratoire d'innovations</h4>
                <p>LeLAB n'est pas un jeu classique, c'est notre espace de recherche et développement où nous testons de nouvelles mécaniques, explorons des concepts innovants et repoussons les limites de l'interactivité.</p>
                
                <h4>🛠️ Développement collaboratif</h4>
                <p>Pour la première fois, nous impliquons la communauté dans le processus de développement. Les joueurs pourront tester les nouvelles fonctionnalités, proposer des améliorations et participer à la création du jeu.</p>
                
                <h4>⚡ Technologies de pointe</h4>
                <p>LeLAB utilise les dernières technologies de développement pour offrir une expérience fluide et modulaire. Chaque élément peut être modifié, personnalisé et partagé avec la communauté.</p>
                
                <h4>🎯 Objectifs du projet</h4>
                <p>Ce laboratoire nous permettra de valider nos concepts avant de les intégrer dans nos productions principales, garantissant ainsi la qualité de nos futurs jeux.</p>
                
                <p>Restez connectés pour découvrir les premières versions jouables dans les semaines à venir !</p>
            `,
            action: {
                text: 'Découvrir LeLAB',
                scrollTo: 'lelab',
                icon: '🔬'
            }
        },
        'ricebattle': {
            title: 'Rice Battle : Premier prototype jouable',
            date: '15 Juillet 2025',
            image: 'assets/news/news_ricebattle.jpg',
            content: `
                <p>Le moment que vous attendiez est arrivé ! Le premier prototype jouable de Rice Battle est maintenant disponible et nous sommes impatients de recueillir vos premiers retours.</p>
                
                <h4>⚔️ Mécaniques de combat uniques</h4>
                <p>Découvrez un système de combat stratégique innovant où chaque variété de riz possède ses propres propriétés, forces et faiblesses. Basmati, Jasmine, Arborio... chaque grain raconte une histoire de bataille !</p>
                
                <h4>🎮 Gameplay stratégique</h4>
                <p>Les combats se déroulent au tour par tour, mêlant réflexion tactique et mécaniques de timing. Anticipez les mouvements de vos adversaires et créez des combos dévastateurs.</p>
                
                <h4>🌾 Univers culinaire épique</h4>
                <p>Plongez dans un monde où la gastronomie rencontre la stratégie militaire. Chaque bataille se déroule dans des environnements inspirés des traditions culinaires du monde entier.</p>
                
                <h4>🔄 Version prototype</h4>
                <p>Cette version prototype contient les mécaniques de base, 5 variétés de riz jouables et 3 arènes de combat. Vos retours nous aideront à façonner l'expérience finale !</p>
                
                <h4>🎯 Prochaines étapes</h4>
                <p>Basé sur vos retours, nous ajouterons de nouvelles variétés de riz, des modes de jeu supplémentaires et le multijoueur en ligne.</p>
                
                <p>Prêt à livrer votre première bataille de riz ?</p>
            `,
            action: {
                text: 'Voir Rice Battle',
                scrollTo: 'rice-battle',
                icon: '🌾'
            }
        }
    };

    // Create news modal if it doesn't exist
    function createNewsModal() {
        const modal = document.createElement('div');
        modal.id = 'newsModal';
        modal.className = 'modal';
        modal.innerHTML = `
            <div class="modal-content">
                <span class="modal-close">&times;</span>
                <div id="newsModalContent"></div>
            </div>
        `;
        document.body.appendChild(modal);
        return modal;
    }

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

    // News modal functions
    function openNewsModal(newsId) {
        const news = newsData[newsId];
        if (!news) return;

        const newsModalContent = document.getElementById('newsModalContent') || 
                                newsModal.querySelector('.modal-content').appendChild(
                                    (() => {
                                        const div = document.createElement('div');
                                        div.id = 'newsModalContent';
                                        return div;
                                    })()
                                );

        newsModalContent.innerHTML = `
            <div class="news-modal-header">
                <h2>${news.title}</h2>
                <div class="news-modal-date">${news.date}</div>
            </div>
            <div class="news-modal-image">
                <img src="${news.image}" alt="${news.title}" style="width: 100%; height: 250px; object-fit: cover; border-radius: 12px; margin: 1rem 0;">
            </div>
            <div class="news-modal-content">
                ${news.content}
            </div>
            <div class="news-modal-action">
                ${news.action.url ? 
                    `<a href="${news.action.url}" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                        ${news.action.icon} ${news.action.text}
                    </a>` :
                    `<button onclick="scrollToGame('${news.action.scrollTo}')" class="btn btn-primary">
                        ${news.action.icon} ${news.action.text}
                    </button>`
                }
            </div>
        `;

        // Reattach close button event listener
        const newsModalCloseBtn = newsModal.querySelector('.modal-close');
        if (newsModalCloseBtn) {
            newsModalCloseBtn.addEventListener('click', closeNewsModal);
        }

        newsModal.style.display = 'block';
        newsModal.classList.add('show');
        document.body.style.overflow = 'hidden';
        
        // Add smooth transition for modal appearance
        setTimeout(() => {
            newsModal.style.opacity = '1';
            
            // Check if content is scrollable and add scroll indicators
            const modalContentElement = newsModal.querySelector('.modal-content');
            if (modalContentElement.scrollHeight > modalContentElement.clientHeight) {
                modalContentElement.classList.add('has-scroll');
            }
        }, 10);
    }

    function closeNewsModal() {
        newsModal.style.opacity = '0';
        newsModal.classList.remove('show');
        
        // Remove scroll indicators
        const modalContentElement = newsModal.querySelector('.modal-content');
        if (modalContentElement) {
            modalContentElement.classList.remove('has-scroll');
        }
        
        setTimeout(() => {
            newsModal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }, 300);
    }

    // Scroll to specific game function
    window.scrollToGame = function(gameId) {
        closeNewsModal();
        
        setTimeout(() => {
            const gameCard = document.querySelector(`[data-game="${gameId}"]`);
            if (gameCard) {
                const headerHeight = header.offsetHeight;
                const targetPosition = gameCard.offsetTop - headerHeight - 100;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
                
                // Highlight the game card briefly
                gameCard.style.transform = 'scale(1.05)';
                gameCard.style.boxShadow = '0 20px 40px rgba(139, 92, 246, 0.4)';
                
                setTimeout(() => {
                    gameCard.style.transform = '';
                    gameCard.style.boxShadow = '';
                }, 2000);
            }
        }, 300);
    };

    // News cards click handlers
    newsCards.forEach(card => {
        card.addEventListener('click', function() {
            const newsImage = card.querySelector('.news-image img');
            if (newsImage) {
                const imageSrc = newsImage.src;
                let newsId = '';
                
                // Determine news type based on image source
                if (imageSrc.includes('news_website')) {
                    newsId = 'website';
                } else if (imageSrc.includes('news_lelab')) {
                    newsId = 'lelab';
                } else if (imageSrc.includes('news_ricebattle')) {
                    newsId = 'ricebattle';
                }
                
                if (newsId) {
                    openNewsModal(newsId);
                }
            }
        });
        
        // Add cursor pointer style
        card.style.cursor = 'pointer';
    });

    // News link click handlers (prevent default and open modal instead)
    const newsLinks = document.querySelectorAll('.news-link');
    newsLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const newsCard = this.closest('.news-card');
            const newsImage = newsCard.querySelector('.news-image img');
            if (newsImage) {
                const imageSrc = newsImage.src;
                let newsId = '';
                
                if (imageSrc.includes('news_website')) {
                    newsId = 'website';
                } else if (imageSrc.includes('news_lelab')) {
                    newsId = 'lelab';
                } else if (imageSrc.includes('news_ricebattle')) {
                    newsId = 'ricebattle';
                }
                
                if (newsId) {
                    openNewsModal(newsId);
                }
            }
        });
    });

    // Modal close handlers
    if (modalClose) {
        modalClose.addEventListener('click', closeModal);
    }

    // News modal close handlers
    const newsModalClose = newsModal.querySelector('.modal-close');
    if (newsModalClose) {
        newsModalClose.addEventListener('click', closeNewsModal);
    }

    // Close modals when clicking outside
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });

    newsModal.addEventListener('click', function(e) {
        if (e.target === newsModal) {
            closeNewsModal();
        }
    });

    // Close modals with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            if (modal.style.display === 'block') {
                closeModal();
            }
            if (newsModal.style.display === 'block') {
                closeNewsModal();
            }
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