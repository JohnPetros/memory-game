const buttonMobile = document.querySelector("#button-mobile");
const buttonLogout = document.querySelector("#button-logout");

const toggleMenu = () => {
  buttonMobile.classList.toggle("active");
};

const logout = () => {
  toggleModal("logout");
  const buttonCancel = document.querySelector("button.white");
  buttonCancel.addEventListener("click", toggleModal);
};

buttonMobile.addEventListener("click", toggleMenu);
buttonLogout.addEventListener("click", logout);
