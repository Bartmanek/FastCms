var php = document.querySelector(".messages").innerHTML;
function showMess(mess) {
  if (mess.length == 0) {
    document.querySelector(".messages").innerHTML = ``;
    document.querySelector(".messages").innerHTML = php;
    let but2 = document.querySelectorAll("#del");
    but2.forEach((element) => element.addEventListener("click", deleteUserAcc));
    let but_prom2 = document.querySelectorAll("#prom");
    but_prom2.forEach((element) =>
      element.addEventListener("click", promoteUser)
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
          <span class="email">Email</span>
          <span class="username">Username</span>
          <span class="admin">Is admin?</span>
          <span class="action">Action</span>
      </div><div class=\"element\"><span class="email">No result</span></div>
        `;
        } else {
          document.querySelector(".messages").innerHTML = ``;
          document.querySelector(".messages").innerHTML = `                    
          <div class="legend">
          <span class="email">Email</span>
          <span class="username">Username</span>
          <span class="admin">Is admin?</span>
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
        <span class=\"email\">${array[i][1]}</span>
        <span class=\"username\">${array[i][2]}</span>
        <span class=\"admin\">${rank}</span>
        <span class=\"action\"><a rel=\"${array[i][3]}\" id=\"prom\" class=\"but\" name=\"${array[i][0]}\"><i class=\"fa-solid fa-arrow-up\"></i></a><a rel=\"${array[i][3]}\" id=\"del\" name=\"${array[i][0]}\" class=\"but\"><i class=\"fa-solid fa-trash\"></i></a></span></div>`;
          }
          let but3 = document.querySelectorAll("#del");
          but3.forEach((element) =>
            element.addEventListener("click", deleteUserAcc)
          );
          let but_prom3 = document.querySelectorAll("#prom");
          but_prom3.forEach((element) =>
            element.addEventListener("click", promoteUser)
          );
        }
      }
    };
  }
  xmlthttp.open("GET", "../../scripts-php/search_user.php?query=" + mess, true);
  xmlthttp.send();
}

let but = document.querySelectorAll("#del");
let but_prom = document.querySelectorAll("#prom");

but.forEach((element) => element.addEventListener("click", deleteUserAcc));
but_prom.forEach((element) => element.addEventListener("click", promoteUser));

function deleteUserAcc() {
  let a = confirm("Are u sure?");
  if (a == true) {
    id = this.getAttribute("name");
    admin_status = this.getAttribute("rel");
    window.location.assign(
      `../../scripts-php/delete_user_acc.php?name=${id}&admin=${admin_status}`
    );
  }
}

function promoteUser() {
  let b = confirm("Are u sure?");
  if (b == true) {
    id = this.getAttribute("name");
    admin_status = this.getAttribute("rel");
    window.location.assign(
      `../../scripts-php/promote_to_admin.php?name=${id}&admin=${admin_status}`
    );
  }
}
