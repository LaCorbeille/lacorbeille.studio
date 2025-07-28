# LaCorbeille STUDIO - Site Web

Site web statique avec système de composants client-side.

## 🚀 Développement Local

### Option 1 : Live Server (Recommandé)
1. Clic droit sur `index.html` dans VS Code
2. Sélectionner "Open with Live Server"
3. Le site s'ouvre automatiquement dans le navigateur

### Option 2 : Serveur HTTP simple
```bash
npx http-server -p 8080 -c-1
```

## 📁 Structure des Composants

```
components/
└── footer.html          # Composant footer réutilisable

scripts/
└── components.js         # Système de chargement des composants
```

### Utilisation des Composants

Dans vos pages HTML :
```html
<!-- Charge automatiquement le footer -->
<div data-component="footer"></div>
```

Le JavaScript se charge du reste automatiquement !

### 🔧 Système de Composants Détaillé

#### **Fonctionnement**
- **Chargement automatique** : Les composants marqués avec `data-component` se chargent au démarrage
- **Cache intelligent** : Les composants sont mis en cache pour éviter les requêtes multiples
- **Gestion d'erreurs** : Messages explicites en cas de composant introuvable
- **Événements personnalisés** : Écoutez quand un composant est chargé

#### **API JavaScript**
```javascript
// Charger un composant spécifique
await ComponentLoader.loadComponent('components/header.html', '#header-container');

// Charger le footer dans un élément custom
await ComponentLoader.loadFooter('#custom-footer');

// Charger automatiquement tous les composants
await ComponentLoader.autoLoadComponents();

// Vider le cache
ComponentLoader.clearCache();

// Écouter les événements de chargement
document.addEventListener('componentLoaded', (event) => {
    console.log('Composant chargé:', event.detail.componentPath);
});
```

#### **Ajouter de nouveaux composants**
1. Créez `components/nom-composant.html`
2. Ajoutez `<div data-component="nom-composant"></div>` dans vos pages
3. Le système les charge automatiquement !

#### **Compatibilité**
Compatible avec tous les navigateurs modernes supportant :
- `fetch()` API
- `Promises` / `async/await`
- `CustomEvent`

## 🌐 Déploiement

Votre site est 100% statique. Uploadez simplement tous les fichiers sur :
- Netlify
- Vercel  
- GitHub Pages
- Firebase Hosting
- N'importe quel hébergeur statique

**Aucun serveur backend requis !** 🎉

## ✨ Avantages

- ✅ **Composants réutilisables** : Un footer pour tout le site
- ✅ **Facilement maintenable** : Modifiez le footer à un seul endroit
- ✅ **Performance** : Cache automatique des composants
- ✅ **Simplicité** : Pas de framework complexe
- ✅ **SEO-friendly** : Contenu injecté côté client mais indexable
- ✅ **Hébergement gratuit** : Compatible avec tous les hébergeurs statiques
