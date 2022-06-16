let page = document.getElementById('page');

let buttonForward = document.getElementById('forward');
let buttonBackward = document.getElementById('backward');
let index = page.innerHTML.indexOf(" ");
let pageNumber = parseInt(page.innerHTML.substring(0, index));


buttonForward.onclick = function () {
    pageNumber = pageNumber + 1;
    console.log(pageNumber)
    location.href="http://localhost/index.php?page="+pageNumber;
}


if (pageNumber > 1) {
    buttonBackward.onclick = function () {
        pageNumber = pageNumber - 1;
        location.href="http://localhost/index.php?page="+pageNumber;
    }
}