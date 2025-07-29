// Modal Manager - Gestion centralisée des modales
class ModalManager {
    constructor() {
        this.modals = new Map();
        this.init();
        console.log('%c🎛️ ModalManager initialisé', 'color: #9C27B0; font-weight: bold;');
    }

    init() {
        // Gestion globale de la touche Échap
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                this.closeAllModals();
            }
        });
    }

    registerModal(id, modal) {
        this.modals.set(id, modal);
        console.log(`%c➕ Modale enregistrée: %c${id}`, 'color: #9C27B0;', 'color: #2196F3; font-weight: bold;');
        
        // Ajouter les gestionnaires d'événements
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                this.closeModal(id);
            }
        });

        const closeBtn = modal.querySelector('.modal-close');
        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                this.closeModal(id);
            });
        }
    }

    openModal(id) {
        const modal = this.modals.get(id);
        if (!modal) {
            console.error(`%c❌ Modale non trouvée: %c${id}`, 'color: #f44336; font-weight: bold;', 'color: #ff5722;');
            return;
        }

        console.log(`%c🔓 Ouverture modale: %c${id}`, 'color: #4CAF50;', 'color: #2196F3; font-weight: bold;');
        modal.style.display = 'block';
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
        
        setTimeout(() => {
            modal.style.opacity = '1';
            
            const modalContentElement = modal.querySelector('.modal-content');
            if (modalContentElement && modalContentElement.scrollHeight > modalContentElement.clientHeight) {
                modalContentElement.classList.add('has-scroll');
                console.log(`%c📜 Scroll détecté pour la modale: %c${id}`, 'color: #FF9800;', 'color: #2196F3;');
            }
        }, 10);
    }

    closeModal(id) {
        const modal = this.modals.get(id);
        if (!modal) return;

        console.log(`%c🔒 Fermeture modale: %c${id}`, 'color: #607D8B;', 'color: #2196F3; font-weight: bold;');
        modal.style.opacity = '0';
        modal.classList.remove('show');
        
        const modalContentElement = modal.querySelector('.modal-content');
        if (modalContentElement) {
            modalContentElement.classList.remove('has-scroll');
        }
        
        setTimeout(() => {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }, 300);
    }

    closeAllModals() {
        const openModals = Array.from(this.modals.entries()).filter(([id, modal]) => modal.style.display === 'block');
        if (openModals.length > 0) {
            console.log(`%c🔐 Fermeture de toutes les modales (${openModals.length})`, 'color: #607D8B; font-weight: bold;');
            this.modals.forEach((modal, id) => {
                if (modal.style.display === 'block') {
                    this.closeModal(id);
                }
            });
        }
    }
}

// Instance globale du gestionnaire de modales
window.modalManager = new ModalManager();
