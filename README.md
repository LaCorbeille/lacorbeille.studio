# LaCorbeille STUDIO - Site Web

Site web officiel de LaCorbeille STUDIO.

<img src="https://img.shields.io/github/actions/workflow/status/LaCorbeille/lacorbeille.studio/deploy.yml?label=Deploy" />

## 🎮 À propos

LaCorbeille STUDIO développe des jeux vidéo innovants incluant :
- **LeLAB** - FPS dynamique avec éditeur de cartes (En développement)
- **Rice Battle** - Jeu de combat 2.5D culinaire (Prototype)
- **A Little Adventure** - Platformer 3D coloré (Prototype)
- **BOT A.N.I.C** - Action-aventure post-apocalyptique (Concept)
- **Archipel** - Exploration d'îles flottantes (Concept)

## 🚀 Développement Local

### Option 1 : Live Server (Recommandé)
1. Clic droit sur `index.html` dans VS Code
2. Sélectionner "Open with Live Server"
3. Le site s'ouvre automatiquement dans le navigateur

### Option 2 : Serveur HTTP simple
```bash
npx http-server -p 8080 -c-1
```

## 📁 Architecture du Projet

```
📦 lacorbeille.studio
├── 📄 index.html                 # Page d'accueil
├── 📄 press.html                 # Page presse
├── 📄 .htaccess                  # Configuration Apache
├── 📁 assets/
│   ├── 📁 branding/              # Logos et identité visuelle
│   ├── 📁 favicon/               # Icons du site
│   ├── 📁 games/                 # Screenshots et médias des jeux
│   └── 📁 news/                  # Images des actualités
├── 📁 data/
│   ├── 📄 games.js               # Données des jeux (JavaScript natif)
│   ├── 📄 news.js                # Données des actualités (JavaScript natif)
│   └── 📄 team.js                # Données de l'équipe (JavaScript natif)
├── 📁 scripts/
│   ├── 📄 main.js                # Point d'entrée principal
│   └── 📁 modules/
│       ├── 📄 animations.js      # Gestion des animations
│       ├── 📄 contactForm.js     # Formulaire de contact
│       ├── 📄 gameModal.js       # Modale des jeux
│       ├── 📄 modalManager.js    # Gestionnaire de modales
│       ├── 📄 navigation.js      # Navigation et menu
│       ├── 📄 newsModal.js       # Modale des actualités
│       └── 📄 teamManager.js     # Gestion de l'équipe
└── 📁 styles/
    ├── 📄 stylesheet.css         # Styles principaux
    ├── 📄 index.css              # Styles page d'accueil
    ├── 📄 press.css              # Styles page presse
    ├── 📄 header.css             # Styles header
    └── 📄 footer.css             # Styles footer
```

## 🔧 Système de Modules

### Architecture Modulaire
Le site utilise une architecture modulaire avec chargement dynamique des modules :

```javascript
// main.js charge automatiquement tous les modules disponibles
const modules = [
    'modalManager',    // Gestionnaire de modales
    'gameModal',       // Modale d'affichage des jeux
    'newsModal',       // Modale d'affichage des actualités  
    'navigation',      // Navigation et menu mobile
    'contactForm',     // Formulaire de contact
    'animationManager',// Animations et effets visuels
    'teamManager'      // Gestion de l'équipe (optionnel)
];
```

### 🎯 Modales Interactives

#### **Game Modal**
- Affichage détaillé des jeux du studio
- Screenshots, descriptions, fonctionnalités
- Informations sur les plateformes et dates de sortie
- Chargement des données depuis `data/games.js`

#### **News Modal**  
- Système d'actualités avec contenu HTML riche
- Images, liens et actions personnalisées
- Chargement des données depuis `data/news.js`

#### **Modal Manager**
- Gestion centralisée de toutes les modales
- Fermeture avec Escape, overlay, ou bouton
- Gestion du focus et de l'accessibilité

### 📊 Gestion des Données

#### **Architecture JavaScript Native**
Pour une compatibilité maximale avec tous les hébergeurs, le site utilise exclusivement du JavaScript natif :

```javascript
// Chargement direct des données JavaScript
try {
    await this.loadJavaScriptData(); // Charge games.js, news.js, team.js
} catch (error) {
    console.error('❌ Erreur de chargement:', error);
}
```

#### **Avantages de cette approche :**
- ✅ **Compatibilité universelle** : Fonctionne sur tous les hébergeurs
- ✅ **Pas de restrictions** : Aucun problème avec les fichiers JSON bloqués
- ✅ **Performance** : Chargement direct sans fetch API
- ✅ **Simplicité** : Architecture plus simple et robuste

### Utilisation des Composants (Legacy)

**Note** : Le système de composants dynamiques n'est actuellement pas utilisé dans la version de production. Le footer et autres éléments sont directement intégrés dans le HTML des pages pour des raisons de simplicité et performance.

Le système reste disponible pour de futurs développements :
```html
<!-- Chargement dynamique possible mais non utilisé -->
<div data-component="footer"></div>
```

### 🏗️ Architecture Actuelle

Le site utilise une approche **statique directe** :
- Footer intégré directement dans chaque page HTML
- Modales gérées par les modules JavaScript spécialisés
- Composants réutilisables maintenus dans `components/` pour référence

## 🌐 Déploiement

### Hébergement Statique Standard
Le site est 100% statique et compatible avec :
- Netlify / Vercel / GitHub Pages
- Firebase Hosting
- N'importe quel hébergeur statique

### Hébergement Apache (LWS, OVH, etc.)
Pour les hébergeurs utilisant Apache, le fichier `.htaccess` inclus configure :

#### **Optimisations Performance**
- Compression GZIP automatique
- Cache navigateur optimisé
- Headers de sécurité et SEO

#### **Gestion des Erreurs**
- Pages d'erreur redirigées vers `index.html`
- Support des favicons et ressources statiques

### 🔧 Configuration Post-Déploiement

1. **Vérifiez les logs de console** pour détecter d'éventuelles erreurs 403
2. **Testez les modales** - elles doivent s'ouvrir correctement
3. **Contrôlez les performances** avec les outils dev du navigateur

## 🚨 Résolution des Problèmes Courants

### Modales qui ne s'ouvrent pas
**Symptôme** : Clics sans effet sur les cartes

**Vérifications** :
1. Console navigateur pour erreurs JavaScript
2. Chargement correct des modules dans `main.js`
3. Données disponibles dans `newsData`, `gamesData` ou `teamData`

### Images non affichées
**Symptôme** : Placeholders au lieu des images

**Solutions** :
1. Vérifiez les chemins dans `data/games.js`, `data/news.js` et `data/team.js`
2. Confirmez que les images sont uploadées dans `assets/`

### Modules manquants
**Symptôme** : `⚠️ Modules manquants: teamManager` dans la console

**Solutions** :
1. Vérifiez que `scripts/modules/teamManager.js` est uploadé
2. Vérifiez que `data/team.js` est accessible
3. Contrôlez les erreurs de chargement dans la console

## ✨ Fonctionnalités

### 🎮 Interface Utilisateur
- ✅ **Design moderne** : Dégradés violets/cyan, responsive design
- ✅ **Modales interactives** : Jeux et actualités en overlay
- ✅ **Navigation fluide** : Menu mobile, animations CSS
- ✅ **Accessibilité** : Support clavier, ARIA labels, focus management

### 🔧 Architecture Technique  
- ✅ **Composants réutilisables** : Footer modulaire, système extensible
- ✅ **Modules dynamiques** : Chargement conditionnel des fonctionnalités
- ✅ **Gestion d'erreur robuste** : Fallbacks JavaScript, logs détaillés
- ✅ **Performance optimisée** : Cache, compression, lazy loading

### 🌐 SEO & PWA
- ✅ **SEO-friendly** : Métadonnées complètes, Open Graph, schemas JSON-LD
- ✅ **PWA Ready** : Manifest, favicons multi-résolutions
- ✅ **Sécurité** : Headers CSP, HSTS, protection XSS
- ✅ **Multi-hébergeur** : Compatible Apache, Nginx, CDN

### 📊 Gestion de Contenu
- ✅ **Données JSON** : Structure claire et maintenable
- ✅ **Fallback JavaScript** : Compatibilité hébergeurs restrictifs  
- ✅ **Images optimisées** : WebP, compression, lazy loading
- ✅ **Actualités dynamiques** : Système de news avec HTML riche

## 🛠️ Technologies Utilisées

- **Frontend** : HTML5, CSS3 (Grid/Flexbox), JavaScript ES6+
- **Architecture** : Modules ES6, Composants Web, PWA
- **Performance** : Compression GZIP, Cache navigateur, Lazy loading
- **SEO** : Métadonnées, Open Graph, JSON-LD, Sitemap
- **Hébergement** : Apache/Nginx compatible, CDN ready

## 🤝 Contribution

### Structure de Développement
```bash
# Cloner le repo
git clone https://github.com/LaCorbeille/lacorbeille.studio.git
cd lacorbeille.studio

# Lancer le serveur de développement
npx http-server -p 8080 -c-1

# Ou utiliser Live Server dans VS Code
```

### Ajouter du Contenu

#### **Nouveau Jeu**
1. Ajoutez les données dans `data/games.js`
2. Placez les assets dans `assets/games/NomDuJeu/`
3. Le système se charge automatiquement de l'affichage

#### **Nouvelle Actualité**  
1. Ajoutez l'entrée dans `data/news.js`
2. Ajoutez l'image dans `assets/news/`
3. La modale news affichera automatiquement le contenu

#### **Nouveau Module**
1. Créez `scripts/modules/monModule.js`
2. Ajoutez-le à la liste dans `scripts/main.js`
3. Le système le chargera automatiquement

### 🔍 Tests et Validation

- **Console navigateur** : Vérifiez qu'aucune erreur n'apparaît
- **Lighthouse** : Score > 90 en Performance/SEO/Accessibilité
- **Responsive** : Testez sur mobile/tablette/desktop
- **PWA** : Validez le manifest avec Chrome DevTools

## 📈 Version et Historique

**Version actuelle** : 2.0.0 (Juillet 2025)

### Changelog récent
- ✨ Système de modales interactives pour jeux et actualités
- 🔧 Architecture modulaire avec chargement dynamique
- 🛡️ Système de fallback robuste pour l'hébergement Apache
- 🎨 Design moderne avec dégradés et responsive design
- 📱 Support PWA complet avec manifest et favicons
- 🚀 Optimisations performance et SEO avancées

---

## 📞 Contact

**LaCorbeille STUDIO**  
🌐 [lacorbeille.studio](https://lacorbeille.studio)  
📧 Contact via le formulaire du site  
⭐ [Laisser un avis Google](https://share.google/zZhVolTMXj5qokXrK)

---

*Développé avec ❤️ par LaCorbeille STUDIO*
