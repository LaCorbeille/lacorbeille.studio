const searchBar = document.getElementById('searchBar');
const searchButton = document.getElementById('searchButton');

searchButton.addEventListener('click', function (event) {
    event.preventDefault();
    searchBar.disabled = true;
    searchButton.disabled = true;
    if (searchBar.value.trim() !== '') {
        window.location.href = '?search=' + encodeURIComponent(searchBar.value.trim());
    }
});