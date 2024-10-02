const searchBar = document.getElementById('search');

searchBar.addEventListener('input', function() {
    const query = searchBar.value;
    // Execute your query here
    console.log('Query:', query);
});