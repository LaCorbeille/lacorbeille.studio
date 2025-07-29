// Données des jeux - Version JavaScript
const gamesData = {
  "lelab": {
    "title": "LeLAB",
    "status": "En développement",
    "platforms": ["Windows", "Linux"],
    "description": "Le LAB est un FPS dynamique qui met l'accent sur des affrontements rapides entre amis dans des arènes personnalisables. Avec des mécaniques de déplacement avancées, Le LAB encourage des stratégies basées sur la mobilité et des réflexes instantanés. Les joueurs auront la possibilité de créer leurs propres cartes, favorisant une créativité sans limite. Chaque carte se présente sous un style de \"level prototyping\", utilisant des textures, formes et structures simples.",
    "features": [
      "Mécaniques de déplacement avancées",
      "Éditeur de cartes intégré",
      "Style \"level prototyping\"",
      "Plateformes de gravité",
      "Compétition amicale"
    ],
    "screenshots": ["assets/games/LeLAB/LeLAB - Banner.jpg"],
    "releaseDate": "T2 2025",
    "genre": "First-Person Shooter (FPS) / Action / 3D"
  },
  "rice-battle": {
    "title": "Rice Battle",
    "status": "Prototype",
    "platforms": ["Windows", "Linux", "Switch"],
    "description": "RiceBattle est un jeu de combat en 2.5D pour deux joueurs, où les environnements sont modélisés en 3D tandis que les personnages et les éléments d'interaction sont en 2D. Le jeu se déroule dans un univers inspiré par la cuisine asiatique dans lequel les personnages peuvent interagir avec l'environnement. Les combattants incarnent divers aliments emblématiques comme des onigiris, des boulettes de riz et des sushis.",
    "features": [
      "Combat 2.5D (décors 3D, personnages 2D)",
      "Personnages inspirés de la cuisine asiatique",
      "Items spéciaux (sauce soja, wasabi)",
      "Interaction avec le décor",
      "Combats personnalisables"
    ],
    "screenshots": ["assets/games/Rice Battle/RiceBattle - Banner.jpg"],
    "releaseDate": "T4 2025",
    "genre": "Fighter / 2.5D"
  },
  "little-adventure": {
    "title": "A Little Adventure",
    "status": "Prototype",
    "platforms": ["Windows", "Linux"],
    "description": "A Little Adventure est un jeu de plateforme en 3D où le joueur explore un monde coloré rempli de défis en tout genre. Il sera amené à se battre contre des monstres, résoudre de petites énigmes et s'aventurer dans des niveaux de plus en plus difficiles. Son objectif est simple : compléter tous les niveaux et trouver les jetons cachés dans chacun d'entre eux.",
    "features": [
      "Plateforme 3D colorée",
      "Combat contre des monstres",
      "Énigmes à résoudre",
      "Jetons cachés à collecter",
      "Difficulté progressive"
    ],
    "screenshots": ["assets/games/A Little Adventure/ALittleAdventure - Banner.jpg"],
    "releaseDate": "T1 2026",
    "genre": "Platformer / Aventure / Puzzle / 3D"
  },
  "bot-anic": {
    "title": "BOT A.N.I.C",
    "status": "Concept",
    "platforms": ["Windows", "Linux", "PlayStation", "Xbox"],
    "description": "A.N.I.C (Androïde avec Noyau Intelligent de Combat) s'éveille dans un laboratoire souterrain en ruine de NEMESIS Corp, envahi par des racines et plantes mutantes. Dans ce monde post-apocalyptique où la nature a triomphé de l'humanité, A.N.I.C doit maîtriser ses compétences pour survivre face aux plantes agressives et machines corrompues, tout en découvrant l'origine de cette invasion.",
    "features": [
      "Action-aventure à la troisième personne",
      "Monde post-apocalyptique immersif",
      "Combats stratégiques",
      "Choix moraux impactants",
      "Gestion des ressources"
    ],
    "screenshots": ["https://placehold.co/800x400?text=BOT+A.N.I.C+Banner"],
    "releaseDate": "TBD",
    "genre": "Aventure / Puzzle / 3D / FPS"
  },
  "archipel": {
    "title": "Archipel",
    "status": "Concept",
    "platforms": ["Windows", "Linux"],
    "description": "Archipel est un jeu solo en 3D stylisé en vue à la troisième personne, mêlant aventure, exploration, stratégie, combat et gestion de ressources. Le joueur incarne un personnage qui se réveille sur une île flottante dans son village natal après avoir échoué lors d'une exploration. Chaque île propose des environnements uniques et des activités variées selon l'humeur du joueur.",
    "features": [
      "Exploration d'îles flottantes uniques",
      "Combat stratégique et apprivoisement",
      "Système de crafting et construction",
      "Personnalisation du personnage",
      "Activités variées (pêche, chasse, photographie)"
    ],
    "screenshots": ["https://placehold.co/800x400?text=Archipel+Banner"],
    "releaseDate": "TBD",
    "genre": "Troisième personne / Aventure / Stratégie / 3D"
  }
};

// Export pour utilisation dans d'autres modules
if (typeof module !== 'undefined' && module.exports) {
    module.exports = gamesData;
} else if (typeof window !== 'undefined') {
    window.gamesData = gamesData;
}
