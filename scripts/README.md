# Architecture JavaScript Modulaire - LaCorbeille STUDIO

## 📁 Structure des fichiers

```
scripts/
├── main.js                          # Point d'entrée principal
├── components.js                     # Composants réutilisables
├── modules/                          # Modules fonctionnels
│   ├── modalManager.js              # Gestionnaire centralisé des modales
│   ├── navigation.js                # Système de navigation et menu mobile
│   ├── gameModal.js                 # Système de modales de jeux
│   ├── newsModal.js                 # Système de modales d'actualités
│   ├── contactForm.js               # Gestionnaire de formulaire de contact
│   └── animations.js                # Gestionnaire d'animations et effets visuels

data/
├── games.js                         # Données des jeux (JavaScript natif)
├── news.js                          # Données des actualités (JavaScript natif)
└── team.js                          # Données de l'équipe (JavaScript natif)
```

## 🔧 Modules disponibles

### **ModalManager** (`modalManager.js`)
- **Rôle** : Gestionnaire centralisé pour toutes les modales
- **Fonctionnalités** :
  - Gestion des événements (Échap, clic extérieur, bouton fermer)
  - Animations d'ouverture/fermeture
  - API unifiée pour ouvrir/fermer les modales
- **API** : `window.modalManager`

### **Navigation** (`navigation.js`)
- **Rôle** : Gestion de la navigation et du menu mobile
- **Fonctionnalités** :
  - Smooth scrolling
  - Menu mobile responsive
  - Mise à jour automatique du lien actif
  - Effet de scroll sur le header
- **API** : `window.navigation`

### **GameModal** (`gameModal.js`)
- **Rôle** : Système de modales pour les jeux
- **Fonctionnalités** :
  - Chargement des données depuis `data/games.js`
  - Affichage des détails des jeux
  - Intégration avec le ModalManager
- **API** : `window.gameModal`

### **NewsModal** (`newsModal.js`)
- **Rôle** : Système de modales pour les actualités
- **Fonctionnalités** :
  - Chargement des données depuis `data/news.js`
  - Affichage du contenu des news
  - Actions personnalisées (liens externes, navigation interne)
- **API** : `window.newsModal`

### **ContactForm** (`contactForm.js`)
- **Rôle** : Gestionnaire du formulaire de contact
- **Fonctionnalités** :
  - Validation des données
  - Génération des liens mailto
  - Gestion des sujets prédéfinis
- **API** : `window.contactForm`

### **AnimationManager** (`animations.js`)
- **Rôle** : Gestionnaire d'animations et effets visuels
- **Fonctionnalités** :
  - Animations au scroll (Intersection Observer)
  - Effets de transition
  - Animations d'apparition progressive
- **API** : `window.animationManager`

## 📄 Fichiers de données JSON

### **games.json**
Contient toutes les informations des jeux :
- Métadonnées (titre, statut, plateformes)
- Descriptions détaillées
- Caractéristiques
- Images et captures d'écran
- Dates de sortie et genres

### **news.json**
Contient toutes les actualités :
- Contenu riche en HTML
- Images et métadonnées
- Actions personnalisées (liens, navigation)

## 🚀 Avantages de cette architecture

### **Modularité**
- Chaque module a une responsabilité claire
- Possibilité de développer/débugger les modules indépendamment
- Réutilisabilité des composants

### **Maintenabilité**
- Code organisé et facile à comprendre
- Séparation des données et de la logique
- Architecture évolutive

### **Performance**
- Chargement asynchrone des données JSON
- Modules chargés en parallèle avec `defer`
- Code optimisé et sans duplication

### **Séparation des responsabilités**
- **Données** : Fichiers JSON centralisés
- **Logique** : Modules JavaScript spécialisés
- **Présentation** : CSS modulaire (déjà implémenté)

## 🔄 Architecture modulaire

La nouvelle architecture apporte :

1. **Utilise du JavaScript natif** pour les données
2. **Modularise le code** en modules spécialisés
3. **Centralise la gestion** des modales
4. **Améliore la lisibilité** et la maintenabilité
5. **Garantit la compatibilité** avec tous les hébergeurs

## 🛠️ Utilisation

Tous les modules s'initialisent automatiquement au chargement de la page. L'ordre de chargement est :

1. `modalManager.js` (base pour les autres modales)
2. `navigation.js`, `gameModal.js`, `newsModal.js`, `contactForm.js`, `animations.js` (en parallèle)
3. `main.js` (vérification et orchestration)

## 📝 Développement futur

Cette architecture permet facilement :
- **Ajout de nouveaux modules** dans `/modules/`
- **Extension des données** via les fichiers JSON
- **Intégration d'APIs externes** pour le contenu dynamique
- **Tests unitaires** par module
- **Optimisation du chargement** (lazy loading, bundling)
