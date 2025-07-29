// Modal Manager - Gestion centralisée des modales
class ModalManager {
    constructor() {
        this.modals = new Map();
        this.init();
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
        if (!modal) return;

        modal.style.display = 'block';
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
        
        setTimeout(() => {
            modal.style.opacity = '1';
            
            const modalContentElement = modal.querySelector('.modal-content');
            if (modalContentElement && modalContentElement.scrollHeight > modalContentElement.clientHeight) {
                modalContentElement.classList.add('has-scroll');
            }
        }, 10);
    }

    closeModal(id) {
        const modal = this.modals.get(id);
        if (!modal) return;

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
        this.modals.forEach((modal, id) => {
            if (modal.style.display === 'block') {
                this.closeModal(id);
            }
        });
    }
}

// Instance globale du gestionnaire de modales
window.modalManager = new ModalManager();
