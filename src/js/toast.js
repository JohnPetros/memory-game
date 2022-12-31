const toast = document.querySelector(".toast");
const closeToast = document.querySelector(".close");

closeToast.addEventListener(
  "click",
  () => (toast.style.transform = "translateX(135%)")
);
