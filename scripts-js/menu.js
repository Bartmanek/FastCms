const menuIcon = document.querySelector(".menu_icon");
const openContent = document.querySelector(".nav_open");

let flag = false;

menuIcon.onclick = function () {
  menuIcon.classList.toggle("change");
  setTimeout(
    () => {
      openContent.classList.toggle("open_nav");
    },
    flag ? 0 : 200
  );
  flag = !flag;
};
