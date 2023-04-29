var php = document.querySelector(".messages").innerHTML;
function showMess(mess) {
  if (mess.length == 0) {
    document.querySelector(".messages").innerHTML = ``;
    document.querySelector(".messages").innerHTML = php;
    let del2 = document.querySelectorAll("#del");
    del2.forEach((element) => element.addEventListener("click", deleteGallery));
    let view2 = document.querySelectorAll("#view");
    view2.forEach((element) => element.addEventListener("click", viewGallery));
    let edit2 = document.querySelectorAll("#edit");
    edit2.forEach((element) => element.addEventListener("click", editGallery));
    return (mess = 0);
  } else {
    var xmlthttp = new XMLHttpRequest();
    xmlthttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        var array = JSON.parse(this.responseText);
        if (array[0] == "No result") {
          document.querySelector(".messages").innerHTML = ``;
          document.querySelector(".messages").innerHTML = `        
          <div class="legend">
          <span class="gallery">Gallery name</span>
          <span class="action">Action</span>
      </div><div class=\"element\"><span class="gallery">No result</span></div>
        `;
        } else {
          document.querySelector(".messages").innerHTML = ``;
          document.querySelector(".messages").innerHTML = `                    
          <div class="legend">
          <span class="gallery">Gallery name</span>
          <span class="action">Action</span>
      </div>`;
          for (let i = 0; i < array.length; i++) {
            document.querySelector(".messages").innerHTML += `
        <div class=\"element\">
        <span class=\"gallery\">${array[i][1]}</span>
        <span class=\"action\"><a rel=\"${array[i][2]}\" id=\"view\" class=\"but\" name=\"${array[i][0]}\"><i class=\"fa-solid fa-eye\"></i></a><a id=\"edit\" name=\"${array[i][0]}\" class=\"but\"><i class=\"fa-solid fa-pen-to-square\"></i></a><a id=\"del\" name=\"${array[i][0]}\" class=\"but\"><i class=\"fa-solid fa-trash\"></i></a></span>`;
          }
          let del3 = document.querySelectorAll("#del");
          del3.forEach((element) =>
            element.addEventListener("click", deleteGallery)
          );
          let view3 = document.querySelectorAll("#view");
          view3.forEach((element) =>
            element.addEventListener("click", viewGallery)
          );
          let edit3 = document.querySelectorAll("#edit");
          edit3.forEach((element) =>
            element.addEventListener("click", editGallery)
          );
        }
      }
    };
  }
  xmlthttp.open(
    "GET",
    "../../scripts-php/search_yourg.php?query=" + mess,
    true
  );
  xmlthttp.send();
}

let del = document.querySelectorAll("#del");
let view = document.querySelectorAll("#view");
let edit = document.querySelectorAll("#edit");

del.forEach((element) => element.addEventListener("click", deleteGallery));
view.forEach((element) => element.addEventListener("click", viewGallery));
edit.forEach((element) => element.addEventListener("click", editGallery));

function deleteGallery() {
  let a = confirm("Are u sure?");
  if (a == true) {
    id = this.getAttribute("name");
    window.location.assign(`../../scripts-php/delete_mg.php?name=${id}`);
  }
}

function editGallery(){
  let c = confirm("Are u sure?");
  if (c == true) {
    let id = this.getAttribute("name");
    window.location.assign(
      `../../subpages/user/edit_site.php?id=${id}`
    );
  }
}

function viewGallery() {
  let b = confirm("Are u sure?");
  if (b == true) {
    id = this.getAttribute("name");
    user_id = this.getAttribute("rel");
    window.location.assign(
      `../../scripts-php/view_site.php?name=${id}&user=${user_id}`
    );
  }
}