// News Modal System
class NewsModal {
    constructor() {
        this.modal = document.getElementById('newsModal') || this.createNewsModal();
        this.newsData = null;
        this.init();
    }

    async init() {
        // Charger les données des actualités
        try {
            const response = await fetch('data/news.json');
            this.newsData = await response.json();
        } catch (error) {
            console.error('Erreur lors du chargement des données des actualités:', error);
        }

        // Enregistrer la modale dans le gestionnaire
        if (window.modalManager && this.modal) {
            window.modalManager.registerModal('newsModal', this.modal);
        }

        this.attachEventListeners();
    }

    createNewsModal() {
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

    attachEventListeners() {
        const newsCards = document.querySelectorAll('.news-card');
        
        newsCards.forEach(card => {
            card.addEventListener('click', () => {
                const newsId = this.getNewsIdFromCard(card);
                if (newsId) {
                    this.openNewsModal(newsId);
                }
            });
            
            card.style.cursor = 'pointer';
        });

        // Gestion des liens de news
        const newsLinks = document.querySelectorAll('.news-link');
        newsLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const newsCard = link.closest('.news-card');
                const newsId = this.getNewsIdFromCard(newsCard);
                if (newsId) {
                    this.openNewsModal(newsId);
                }
            });
        });
    }

    getNewsIdFromCard(card) {
        const newsImage = card.querySelector('.news-image img');
        if (!newsImage) return null;

        const imageSrc = newsImage.src;
        if (imageSrc.includes('news_website')) return 'website';
        if (imageSrc.includes('news_lelab')) return 'lelab';
        if (imageSrc.includes('news_ricebattle')) return 'ricebattle';
        
        return null;
    }

    openNewsModal(newsId) {
        if (!this.newsData || !this.newsData[newsId]) {
            console.error('Données de l\'actualité non trouvées:', newsId);
            return;
        }

        const news = this.newsData[newsId];
        this.renderModalContent(news);
        window.modalManager.openModal('newsModal');
    }

    renderModalContent(news) {
        const newsModalContent = document.getElementById('newsModalContent') || 
                                this.modal.querySelector('.modal-content').appendChild(
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
    }
}

// Fonction globale pour scroll vers les jeux
window.scrollToGame = function(gameId) {
    window.modalManager.closeModal('newsModal');
    
    setTimeout(() => {
        const gameCard = document.querySelector(`[data-game="${gameId}"]`);
        if (gameCard) {
            const header = document.querySelector('.header');
            const headerHeight = header ? header.offsetHeight : 0;
            const targetPosition = gameCard.offsetTop - headerHeight - 100;
            
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
            
            // Effet de mise en surbrillance
            gameCard.style.transform = 'scale(1.05)';
            gameCard.style.boxShadow = '0 20px 40px rgba(139, 92, 246, 0.4)';
            
            setTimeout(() => {
                gameCard.style.transform = '';
                gameCard.style.boxShadow = '';
            }, 2000);
        }
    }, 300);
};

// Initialiser le système de modales de news
window.newsModal = new NewsModal();
