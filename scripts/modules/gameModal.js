// Game Modal System
class GameModal {
    constructor() {
        this.modal = document.getElementById('gameModal');
        this.modalContent = document.getElementById('gameModalContent');
        this.gameData = null;
        this.init();
    }

    async init() {
        // Charger les données des jeux directement depuis le fichier JavaScript
        try {
            await this.loadJavaScriptData();
        } catch (error) {
            console.error('❌ Erreur lors du chargement des données des jeux:', error);
        }

        // Enregistrer la modale dans le gestionnaire
        if (window.modalManager && this.modal) {
            window.modalManager.registerModal('gameModal', this.modal);
        }

        this.attachEventListeners();
    }

    async loadJavaScriptData() {
        return new Promise((resolve, reject) => {
            const script = document.createElement('script');
            script.src = 'data/games.js';
            script.onload = () => {
                if (window.gamesData) {
                    this.gameData = window.gamesData;
                    console.log('✅ Données des jeux chargées depuis games.js');
                    resolve();
                } else {
                    reject(new Error('gamesData non disponible après chargement du script'));
                }
            };
            script.onerror = () => reject(new Error('Impossible de charger games.js'));
            document.head.appendChild(script);
        });
    }

    attachEventListeners() {
        const gameCards = document.querySelectorAll('.game-card');
        
        gameCards.forEach(card => {
            card.addEventListener('click', () => {
                const gameId = card.getAttribute('data-game');
                this.openGameModal(gameId);
            });

            // Gestion du bouton "En savoir plus"
            const detailsBtn = card.querySelector('.game-details-btn');
            if (detailsBtn) {
                detailsBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const gameId = card.getAttribute('data-game');
                    this.openGameModal(gameId);
                });
            }
        });
    }

    openGameModal(gameId) {
        if (!this.gameData || !this.gameData[gameId]) {
            console.error('Données du jeu non trouvées:', gameId);
            return;
        }

        const game = this.gameData[gameId];
        this.renderModalContent(game);
        window.modalManager.openModal('gameModal');
    }

    renderModalContent(game) {
        const statusClass = game.status === 'En développement' ? 'development' : 
                           game.status === 'Prototype' ? 'prototype' : 'concept';

        this.modalContent.innerHTML = `
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
    }
}

// Initialiser le système de modales de jeux
window.gameModal = new GameModal();
