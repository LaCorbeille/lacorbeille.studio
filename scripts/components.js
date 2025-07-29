/**
 * Système de composants simple pour charger des éléments HTML
 */

class ComponentLoader {
    static cache = new Map();

    /**
     * Charge un composant HTML depuis un fichier
     * @param {string} componentPath - Chemin vers le fichier HTML du composant
     * @param {string} targetSelector - Sélecteur CSS de l'élément cible
     * @param {boolean} useCache - Utiliser le cache (par défaut: true)
     */
    static async loadComponent(componentPath, targetSelector, useCache = true) {
        try {
            let html;
            
            // Vérifier le cache
            if (useCache && this.cache.has(componentPath)) {
                html = this.cache.get(componentPath);
            } else {
                const response = await fetch(componentPath);
                if (!response.ok) {
                    throw new Error(`Erreur HTTP: ${response.status}`);
                }
                html = await response.text();
                
                // Mettre en cache
                if (useCache) {
                    this.cache.set(componentPath, html);
                }
            }

            // Insérer le HTML dans l'élément cible
            const targetElement = document.querySelector(targetSelector);
            if (targetElement) {
                targetElement.innerHTML = html;
                
                // Dispatch d'un événement personnalisé pour indiquer que le composant est chargé
                const event = new CustomEvent('componentLoaded', {
                    detail: { componentPath, targetSelector }
                });
                document.dispatchEvent(event);
                
                return true;
            } else {
                console.error(`Élément cible introuvable: ${targetSelector}`);
                return false;
            }
        } catch (error) {
            console.error(`Erreur lors du chargement du composant ${componentPath}:`, error);
            return false;
        }
    }

    /**
     * Charge le footer dans l'élément spécifié
     * @param {string} targetSelector - Sélecteur CSS de l'élément cible (par défaut: '[data-component="footer"]')
     */
    static async loadFooter(targetSelector = '[data-component="footer"]') {
        return await this.loadComponent('components/footer.html', targetSelector);
    }

    /**
     * Charge automatiquement tous les composants marqués avec data-component
     */
    static async autoLoadComponents() {
        const components = document.querySelectorAll('[data-component]');
        const loadPromises = [];

        components.forEach(element => {
            const componentName = element.getAttribute('data-component');
            const componentPath = `components/${componentName}.html`;
            
            // Créer un placeholder temporaire avec l'ID de l'élément
            const elementId = element.id || `component-${componentName}-${Date.now()}`;
            element.id = elementId;
            
            loadPromises.push(
                this.loadComponent(componentPath, `#${elementId}`)
            );
        });

        try {
            const results = await Promise.all(loadPromises);
            const successCount = results.filter(result => result).length;
            console.log(`Composants chargés: ${successCount}/${results.length}`);
            return results;
        } catch (error) {
            console.error('Erreur lors du chargement automatique des composants:', error);
            return [];
        }
    }

    /**
     * Vide le cache des composants
     */
    static clearCache() {
        this.cache.clear();
    }
}

// Auto-chargement des composants au chargement de la page
document.addEventListener('DOMContentLoaded', () => {
    ComponentLoader.autoLoadComponents();
});

// Exporter pour utilisation globale
window.ComponentLoader = ComponentLoader;
