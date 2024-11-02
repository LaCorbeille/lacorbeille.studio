const searchBar = document.getElementById('searchBar');
const searchButton = document.getElementById('searchButton');

searchButton.addEventListener('click', function (event) {
    event.preventDefault();
    if (searchBar.value.trim() !== '') {
        searchBar.disabled = true;
        searchButton.disabled = true;
        window.location.href = '?search=' + encodeURIComponent(searchBar.value.trim());
    }
});