let gameCards = document.querySelectorAll('.game-card');
hideMoreGames();

function showMoreGames() {
    if (gameCards.length > 0) {
        gameCards.forEach((card) => {
            card.style.display = 'block';
        });
        document.querySelector('button[onclick="showMoreGames()"]').outerHTML =
            '<button onclick="hideMoreGames()">Réduire les jeux</button>';
        window.location.href = '#games-section';
    }
}

function hideMoreGames() {
    if (gameCards.length > 0) {
        gameCards.forEach((card, index) => {
            if (index >= 4) {
                card.style.display = 'none';
            }
        });
        document.querySelector('button[onclick="hideMoreGames()"]').outerHTML =
            '<button onclick="showMoreGames()">Voir tous les jeux</button>';
        window.location.href = '#games-section';
    }
}