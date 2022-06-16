const searchBar = document.getElementById('search-bar');
searchBar.onkeyup = function () {saveSearch();}
const searchButton = document.getElementById('search-button');
searchButton.onclick = function () {searchMovies();}

let search;
function saveSearch() {
    search = searchBar.value;
}

function searchMovies() {
    location.href="http://localhost/index.php?search="+search;
}