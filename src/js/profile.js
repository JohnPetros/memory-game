const updateUsernameButton = document.querySelector(".update-username");
const updateAvatarButton = document.querySelector(".update-avatar");
const deleteUserButton = document.querySelector(".delete-user");

const buttons = document.querySelectorAll(".profile .button");

const handleButton = ({ target }) => {
  const action = target.id;

  createModal(action);
  toggleModal();

  const cancelButton = modal.querySelector(".white");
  cancelButton.addEventListener("click", toggleModal);

};

buttons.forEach((button) => button.addEventListener("click", handleButton));
