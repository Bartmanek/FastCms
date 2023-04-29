window.onresize = window.onload = function () {
  width = this.innerWidth;
  if (width < 1100) {
    window.location.href = "./error.html";
  }
};
