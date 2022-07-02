let page = document.getElementById('page');

let buttonForward = document.getElementById('forward');
let buttonBackward = document.getElementById('backward');
let index = page.innerHTML.indexOf(" ");
let pageNumber = parseInt(page.innerHTML.substring(0, index));

if (buttonForward) {
    buttonForward.onclick = function () {
        pageNumber = pageNumber + 1;
        console.log(pageNumber)
        location.href="http://localhost/index.php?page="+pageNumber;
    }
}


if (buttonBackward) {
    buttonBackward.onclick = function () {
        console.log("holaa");
        if (pageNumber > 1) {
            pageNumber = pageNumber - 1;
            location.href="http://localhost/index.php?page="+pageNumber;
        }
    }
}

