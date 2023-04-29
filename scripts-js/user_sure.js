let delete_acc = document.querySelector("#delete");

delete_acc.addEventListener("click", deleteacc);

function deleteacc() {
  let a = confirm("Are u sure?");
  if (a == true) {
    window.location.assign("../../scripts-php/delete_acc.php");
  }
}
