// Main Application - Point d'entrée principal
document.addEventListener('DOMContentLoaded', function() {
    console.log('🎮 LaCorbeille STUDIO - Site web chargé');
    
    // Note: Tous les modules sont chargés automatiquement via leurs propres fichiers
    // et s'initialisent dans leurs constructeurs respectifs.
    
    // Les modules disponibles sont :
    // - window.modalManager : Gestionnaire de modales
    // - window.gameModal : Système de modales de jeux  
    // - window.newsModal : Système de modales d'actualités
    // - window.navigation : Système de navigation
    // - window.contactForm : Gestionnaire de formulaire de contact
    // - window.animationManager : Gestionnaire d'animations
    // - window.teamManager : Gestionnaire d'équipe
    
    // Vérifier que tous les modules sont chargés
    const modules = [
        'modalManager',
        'gameModal', 
        'newsModal',
        'navigation',
        'contactForm',
        'animationManager',
        'teamManager'
    ];
    
    const loadedModules = modules.filter(module => window[module]);
    console.log(`✅ Modules chargés: ${loadedModules.join(', ')}`);
    
    if (loadedModules.length !== modules.length) {
        const missingModules = modules.filter(module => !window[module]);
        console.warn(`⚠️ Modules manquants: ${missingModules.join(', ')}`);
    }
});
