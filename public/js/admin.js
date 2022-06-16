let title = document.getElementById('h2-title');
let formNewMovie = document.getElementById('new-movie');
let formAddMerch = document.getElementById('add-merch');
let formEditMovie = document.getElementById('edit-movie');
let formEditMerch = document.getElementById('edit-merch');

let buttonNewMovie = document.getElementById('new-movie-button');
let buttonAddMerch = document.getElementById('add-merch-button');
let buttonEditMovie = document.getElementById('edit-movie-button');
let buttonEditMerch = document.getElementById('edit-merch-button');

buttonNewMovie.onclick = function() {
    formAddMerch.style.display = 'none';
    formEditMovie.style.display = 'none';
    formEditMerch.style.display = 'none';  
    formNewMovie.style.display = 'block';
    title.innerHTML = 'AÑADIR PELÍCULA';
};

buttonAddMerch.onclick = function() {
    formNewMovie.style.display = 'none';
    formEditMovie.style.display = 'none';
    formEditMerch.style.display = 'none';  
    formAddMerch.style.display = 'block';
    title.innerHTML = 'AÑADIR MERCH';
};

buttonEditMovie.onclick = function() {
    formNewMovie.style.display = 'none';
    formAddMerch.style.display = 'none';
    formEditMerch.style.display = 'none';  
    formEditMovie.style.display = 'block';
    title.innerHTML = 'EDITAR PELÍCULAS';
};

buttonEditMerch.onclick = function() {
    formNewMovie.style.display = 'none';
    formAddMerch.style.display = 'none';
    formEditMovie.style.display = 'none';
    formEditMerch.style.display = 'block';  
    title.innerHTML = 'EDITAR MERCH';

}