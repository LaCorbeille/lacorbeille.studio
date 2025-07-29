// Données des actualités - Version JavaScript
const newsData = {
  "website": {
    "title": "Nouveau site web en ligne !",
    "date": "28 Juillet 2025",
    "image": "assets/news/news_website.webp",
    "content": "<p>Nous sommes ravis de vous présenter le nouveau site web de LaCorbeille STUDIO ! Après plusieurs mois de développement, nous avons créé une plateforme moderne qui reflète notre identité et nos valeurs.</p><h4>🎨 Design moderne et responsif</h4><p>Le nouveau design utilise notre palette de couleurs signature avec des dégradés violets et cyan. Le site s'adapte parfaitement à tous les appareils, du mobile au desktop.</p><h4>⚡ Performance optimisée</h4><p>Nous avons mis l'accent sur la performance avec un temps de chargement ultra-rapide, des images optimisées et une architecture CSS modulaire utilisant les dernières technologies web.</p><h4>🎮 Présentation de nos jeux</h4><p>Découvrez nos projets en cours avec des modales interactives, des captures d'écran haute qualité et des informations détaillées sur chaque jeu.</p><h4>📱 SEO et accessibilité</h4><p>Le site est entièrement optimisé pour les moteurs de recherche et respecte les standards d'accessibilité pour être utilisable par tous.</p><p>Nous espérons que cette nouvelle expérience vous plaira ! N'hésitez pas à nous faire part de vos retours.</p>",
    "action": {
      "text": "Laisser un avis Google",
      "url": "https://share.google/zZhVolTMXj5qokXrK",
      "icon": "⭐"
    }
  },
  "lelab": {
    "title": "LeLAB entre en phase de développement",
    "date": "20 Juillet 2025",
    "image": "assets/news/news_lelab.jpg",
    "content": "<p>C'est avec une grande fierté que nous annonçons le passage de LeLAB en phase de développement actif ! Ce FPS dynamique met l'accent sur des affrontements rapides entre amis dans des arènes personnalisables.</p><h4>🎯 FPS dynamique et compétitif</h4><p>Le LAB encourage des stratégies basées sur la mobilité et des réflexes instantanés. Avec des mécaniques de déplacement avancées, chaque partie devient un défi tactique unique.</p><h4>🛠️ Création de cartes sans limite</h4><p>Les joueurs auront la possibilité de créer leurs propres cartes, favorisant une créativité sans limite. Chaque carte se présente sous un style de \"level prototyping\", utilisant des textures, formes et structures simples.</p><h4>⚡ Mécaniques innovantes</h4><p>Le jeu propose de nombreuses mécaniques sympas, comme des plateformes de gravité qui révolutionnent les déplacements et ouvrent de nouvelles possibilités stratégiques.</p><h4>👥 Orienté vers la compétition amicale</h4><p>Le LAB offre aux joueurs l'opportunité de défier leurs amis dans des environnements qu'ils ont eux-mêmes conçus, créant une expérience personnalisée et compétitive.</p><p>Préparez-vous à découvrir un FPS qui redéfinit les codes du genre !</p>",
    "action": {
      "text": "Découvrir LeLAB",
      "scrollTo": "lelab",
      "icon": "🎯"
    }
  },
  "ricebattle": {
    "title": "Rice Battle : Premier prototype jouable",
    "date": "15 Juillet 2025",
    "image": "assets/news/news_ricebattle.jpg",
    "content": "<p>Le moment que vous attendiez est arrivé ! Le premier prototype jouable de Rice Battle est maintenant disponible et nous sommes impatients de recueillir vos premiers retours.</p><h4>🥢 Combat 2.5D unique</h4><p>RiceBattle propose une expérience de combat inédite en 2.5D où les environnements sont modélisés en 3D tandis que les personnages et éléments d'interaction restent en 2D, créant un style visuel distinctif.</p><h4>🍙 Personnages culinaires</h4><p>Les combattants incarnent divers aliments emblématiques de la cuisine asiatique : onigiris, boulettes de riz, sushis... chaque personnage apporte ses propres techniques de combat !</p><h4>🌶️ Items et interactions</h4><p>Au cours des manches, des items spéciaux comme la sauce soja et le wasabi apparaissent pour offrir aux joueurs des buffs temporaires. Les personnages peuvent aussi interagir avec le décor pour créer des opportunités tactiques.</p><h4>🎮 Combats personnalisables</h4><p>Le jeu propose des combats entièrement personnalisables : définissez le nombre de manches, choisissez votre type de contrôleur (manette ou clavier) et affrontez vos amis dans des duels épiques !</p><h4>🚀 Version prototype</h4><p>Cette version contient les mécaniques de base et plusieurs personnages jouables. Vos retours nous aideront à enrichir l'expérience avec de nouveaux combattants et fonctionnalités.</p><p>Prêt à livrer votre première bataille culinaire ?</p>",
    "action": {
      "text": "Voir Rice Battle",
      "scrollTo": "rice-battle",
      "icon": "🥢"
    }
  }
};

// Export pour utilisation dans d'autres modules
if (typeof module !== 'undefined' && module.exports) {
    module.exports = newsData;
} else if (typeof window !== 'undefined') {
    window.newsData = newsData;
}
