var php = document.querySelector(".messages").innerHTML;
function showMess(mess) {
  if (mess.length == 0) {
    document.querySelector(".messages").innerHTML = ``;
    document.querySelector(".messages").innerHTML = php;
    let but2 = document.querySelectorAll("#del");
    but2.forEach((element) => element.addEventListener("click", deleteMes));
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
            <span class="topic">Topic</span>
            <span class="cont_of">Content</span>
            <span class="action">Action</span>
        </div><div class=\"element\"><span class="email">No result</span></div>
        `;
        } else {
          document.querySelector(".messages").innerHTML = ``;
          document.querySelector(".messages").innerHTML = `                    
        <div class="legend">
        <span class="email">Email</span>
        <span class="topic">Topic</span>
        <span class="cont_of">Content</span>
        <span class="action">Action</span>
    </div>`;
          for (let i = 0; i < array.length; i++) {
            document.querySelector(".messages").innerHTML += `
        <div class=\"element\">
        <span class=\"email\">${array[i][1]}</span>
        <span class=\"topic\">${array[i][2]}</span>
        <span class=\"cont_of\">${array[i][3]}</span>
        <span class=\"action\"><a class=\"but\" href=\"mailto:${array[i][1]}\"><i class=\"fa-solid fa-comments\"></i></a><a id=\"del\" name=\"${array[i][0]}\" class=\"but\"><i class=\"fa-solid fa-trash\"></i></a></span>
        </div>`;
          }
        }
        let but3 = document.querySelectorAll("#del");
        but3.forEach((element) => element.addEventListener("click", deleteMes));
      }
    };
  }
  xmlthttp.open("GET", "../../scripts-php/search_mes.php?query=" + mess, true);
  xmlthttp.send();
}

let but = document.querySelectorAll("#del");
but.forEach((element) => element.addEventListener("click", deleteMes));

function deleteMes() {
  let a = confirm("Are u sure?");
  if (a == true) {
    id = this.getAttribute("name");
    window.location.assign(`../../scripts-php/delete_mes.php?name=${id}`);
  }
}
