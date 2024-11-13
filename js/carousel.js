const gameCards = document.querySelectorAll('.gameCard');
if (gameCards.length > 0) {
    gameCards[0].classList.add('active');

    updateContentWrapper(gameCards[0]);
}

gameCards.forEach(card => {
    card.addEventListener('click', () => {
        gameCards.forEach(c => c.classList.remove('active'));
        card.classList.add('active');

        updateContentWrapper(card);
    });
});

const prevBtn = document.querySelector('#arrowLeft');
const nextBtn = document.querySelector('#arrowRight');

prevBtn.addEventListener('click', () => {
    const activeCard = document.querySelector('.gameCard.active');
    const prevCard = activeCard.previousElementSibling;

    if (prevCard) {
        gameCards.forEach(c => c.classList.remove('active'));
        prevCard.classList.add('active');

        updateContentWrapper(prevCard);
    }
});

nextBtn.addEventListener('click', () => {
    const activeCard = document.querySelector('.gameCard.active');
    const nextCard = activeCard.nextElementSibling;

    if (nextCard) {
        gameCards.forEach(c => c.classList.remove('active'));
        nextCard.classList.add('active');

        updateContentWrapper(nextCard);
    }
});

function updateContentWrapper(card) {
    // Empty contentWrapper
    const contentWrapper = document.querySelector('#contentWrapper');
    contentWrapper.innerHTML = '';

    // Get card data
    const cardTitle = card.querySelector('.contentWrapperInfo .title').textContent || 'Titre non défini';
    const cardDescription = card.querySelector('.contentWrapperInfo .description').textContent || 'Description non disponible';
    const cardTags = card.querySelector('.contentWrapperInfo .tags').textContent || '';
    const cardButton = card.querySelector('.contentWrapperInfo .action').textContent;
    const cardActionLink = card.querySelector('.contentWrapperInfo .actionLink').textContent;
    const tagsArray = cardTags ? cardTags.split(',') : [];
    const platformImages = Array.from(card.querySelectorAll('.platforms img'));

    // Create new elements
    const contentWrapperTitle = document.createElement('h1');
    contentWrapperTitle.textContent = cardTitle;

    const contentWrapperDescription = document.createElement('a');
    contentWrapperDescription.id = 'gameDescription';
    contentWrapperDescription.textContent = cardDescription;

    const contentWrapperTagsWrapper = document.createElement('div');
    contentWrapperTagsWrapper.id = 'gameTags';

    tagsArray.forEach(tag => {
        const tagElement = document.createElement('a');
        tagElement.textContent = tag;
        contentWrapperTagsWrapper.appendChild(tagElement);
    });

    const contentWrapperPlatformsWrapper = document.createElement('div');
    contentWrapperPlatformsWrapper.id = 'gamePlatforms';
    platformImages.forEach(img => {
        const platformImg = document.createElement('img');
        platformImg.src = img.src;
        platformImg.alt = img.alt;
        contentWrapperPlatformsWrapper.appendChild(platformImg);
    });


    // Add new elements to the contentWrapper
    contentWrapper.appendChild(contentWrapperTitle);
    contentWrapper.appendChild(contentWrapperDescription);
    contentWrapper.appendChild(contentWrapperTagsWrapper);
    contentWrapper.appendChild(contentWrapperPlatformsWrapper);
    if (cardButton) {
        const contentWrapperButton = document.createElement('button');
        contentWrapperButton.textContent = cardButton;
        contentWrapperButton.addEventListener('click', () => {
            window.location.href = cardActionLink;
        });
        contentWrapper.appendChild(contentWrapperButton);
    }
}