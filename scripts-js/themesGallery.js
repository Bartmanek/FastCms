var xhr;

if (window.XMLHttpRequest) {
    xhr = new XMLHttpRequest();
} else {
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}

var url = "../../scripts-php/display.php";
xhr.open("GET", url, false);
xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
xhr.onload = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
        let themesArray = JSON.parse(xhr.responseText);
        let place = document.getElementById("photoSpace");
        let leftArrow = document.querySelector(".left_arrow");
        let rightArrow = document.querySelector(".right_arrow");
        let name = document.querySelector("#names");
        let descriptionPlace = document.querySelector(".desc");
        let descriptionInsert = document.querySelector("#desc");
        let descriptionTrigger = document.querySelector("#alert");
        let close = document.querySelector("#close");
        place.innerHTML = `<img id="0" class="themeimg" src="${themesArray[0][2]}" alt="e.g photo of gallery" name="photo" draggable="false">`;
        name.innerHTML = themesArray[0][1];
        var arrayLength = themesArray.length;
        let postsArray = [];
        for (let i = 0; i < arrayLength; i++) {
            postsArray[
                i
            ] = `<img id="${i}" class="themeimg" src="${themesArray[i][2]}" alt="e.g photo of gallery" name="photo" draggable="false">`;
        }
        let length = postsArray.length;

        leftArrow.addEventListener("click", photoChangeLeft);
        rightArrow.addEventListener("click", photoChangeRight);
        descriptionTrigger.addEventListener("click", desc);
        close.addEventListener("click", desc2);
        let id = 0;

        function photoChangeLeft() {
            if (id == 0) {
                place.innerHTML = postsArray[length - 1];
                name.innerHTML = themesArray[length - 1][1];
                id = length - 1;
            } else {
                place.innerHTML = postsArray[id - 1];
                id = Number(themesArray[id - 1][0]) - 1;
                name.innerHTML = themesArray[id][1];
            }
        }

        function photoChangeRight() {
            if (id == length - 1) {
                place.innerHTML = postsArray[0];
                name.innerHTML = themesArray[0][1];
                id = 0;
            } else {
                place.innerHTML = postsArray[id + 1];
                id = Number(themesArray[id + 1][0]) - 1;
                name.innerHTML = themesArray[id][1];
            }
        }

        function desc() {
            descriptionPlace.classList.add("desc_open");
            descriptionInsert.innerHTML += themesArray[id][3];
        }

        function desc2() {
            descriptionPlace.classList.remove("desc_open");
            descriptionInsert.innerHTML = "";
        }

        console.log(themesArray);
    } else {
        console.log("error");
    }
};

xhr.send();
