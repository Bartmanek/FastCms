var php = document.querySelector(".messages").innerHTML;
function showMess(mess) {
  if (mess.length == 0) {
    document.querySelector(".messages").innerHTML = ``;
    document.querySelector(".messages").innerHTML = php;
    let but2 = document.querySelectorAll("#del");
    but2.forEach((element) =>
      element.addEventListener("click", deleteUserProject)
    );
    let but_view2 = document.querySelectorAll("#view");
    but_view2.forEach((element) =>
      element.addEventListener("click", viewGallery)
    );
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
          <span class="username">Username</span>
          <span class="admin">Is creator an admin?</span>
          <span class="action">Action</span>
      </div><div class=\"element\"><span class="gallery">No result</span></div>
        `;
        } else {
          document.querySelector(".messages").innerHTML = ``;
          document.querySelector(".messages").innerHTML = `                    
          <div class="legend">
          <span class="gallery">Gallery name</span>
          <span class="username">Username</span>
          <span class="admin">Is creator an admin?</span>
          <span class="action">Action</span>
      </div>`;
          let rank;
          for (let i = 0; i < array.length; i++) {
            if (array[i][3] == 1) {
              rank = "Yes";
            } else {
              rank = "No";
            }
            document.querySelector(".messages").innerHTML += `
        <div class=\"element\">
        <span class=\"gallery\">${array[i][1]}</span>
        <span class=\"username\">${array[i][2]}</span>
        <span class=\"admin\">${rank}</span>
        <span class=\"action\"><a rel=\"${array[i][4]}\" id=\"view\" class=\"but\" name=\"${array[i][0]}\"><i class=\"fa-solid fa-eye\"></i></a><a type=\"${array[i][3]}\" rel=\"${array[i][4]}\" id=\"del\" name=\"${array[i][0]}\" class=\"but\"><i class=\"fa-solid fa-trash\"></i></a></span>
      `;
          }
          let but3 = document.querySelectorAll("#del");
          but3.forEach((element) =>
            element.addEventListener("click", deleteUserProject)
          );
          let but_view3 = document.querySelectorAll("#view");
          but_view3.forEach((element) =>
            element.addEventListener("click", viewGallery)
          );
        }
      }
    };
  }
  xmlthttp.open(
    "GET",
    "../../scripts-php/search_user_gallery.php?query=" + mess,
    true
  );
  xmlthttp.send();
}

let but = document.querySelectorAll("#del");
let but_view = document.querySelectorAll("#view");

but.forEach((element) => element.addEventListener("click", deleteUserProject));
but_view.forEach((element) => element.addEventListener("click", viewGallery));

function deleteUserProject() {
  let a = confirm("Are u sure?");
  if (a == true) {
    project_id = this.getAttribute("name");
    user_id = this.getAttribute("rel");
    admin_status = this.getAttribute("type");
    window.location.assign(
      `../../scripts-php/delete_user_project.php?project_id=${project_id}&user_id=${user_id}&admin=${admin_status}`
    );
  }
}

function viewGallery() {
  let b = confirm("Are u sure?");
  if (b == true) {
    let id = this.getAttribute("name");
    let user_id = this.getAttribute("rel");
    window.location.assign(
      `../../scripts-php/view_site.php?name=${id}&user=${user_id}`
    );
  }
}
