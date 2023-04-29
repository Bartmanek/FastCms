let quit = document.querySelector("#quit");
let delete_acc = document.querySelector("#delete");

quit.addEventListener("click", quit_admin);
delete_acc.addEventListener("click", deleteacc);

function quit_admin() {
  let a = confirm("Are u sure?");
  if (a == true) {
    window.location.assign("../../scripts-php/quit_admin.php");
  }
}

function deleteacc() {
  let a = confirm("Are u sure?");
  if (a == true) {
    window.location.assign("../../scripts-php/delete_acc.php");
  }
}
