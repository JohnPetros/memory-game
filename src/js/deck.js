const templateCard = document.querySelector("#template-card");
const cards = document.querySelectorAll(".card");
const input = document.querySelector("input[type='file']");
const playButton = document.querySelector(".play");
const deleteCardButtons = document.querySelectorAll(".delete");
const deleteAllButton = document.querySelector(".delete-all");

const deleteCard = (id) => {
  location.href = `../actions/card/delete.php?id=${id}`;
};

const handleInput = ({ target }) => {
  const areThereFiles = target.files[0].name;
  if (areThereFiles) templateCard.submit();
};

const handleDeleteButton = ({ target }) => {
  const id = target.id;
  toggleModal("delete-card");

  const deleteButton = modal.querySelector(".danger");
  const cancelButton = modal.querySelector(".white");

  deleteButton.addEventListener("click", () => deleteCard(id));
  cancelButton.addEventListener("click", toggleModal);
};

const updateTemplateCard = (cards) => {
  if (cards >= 6) templateCard.classList.remove("hidden");
};

const updatePlayButton = (cards) => {
  if (cards >= 6) playButton.classList.remove("disabled");
};

const updateCardsCount = () => {
  const cardsCount = document.querySelector(".cards-count");
  cardsCount.textContent = cards.length + "/6";

  updateTemplateCard(cards.length);
  updatePlayButton(cards.length);
};

const deleteAllCards = (id) => {
  location.href = `../actions/card/deleteAll.php?id=${id}`;
};

const handleDeleteAllButton = ({ target }) => {
  const id = target.id
  createModal("delete-all-cards");
  toggleModal();

  const deleteButton = modal.querySelector(".danger");
  const cancelButton = modal.querySelector(".white");

  deleteButton.addEventListener("click", () => deleteAllCards(id));
  cancelButton.addEventListener("click", toggleModal);
};

const showDeleteAllButton = () => {
  if (cards.length > 0) deleteAllButton.classList.remove("hidden");
  deleteAllButton.addEventListener("click", handleDeleteAllButton);
};

input.addEventListener("change", handleInput);
deleteCardButtons.forEach((button) =>
  button.addEventListener("click", handleDeleteButton)
);

window.onload = () => {
  updateCardsCount();
  showDeleteAllButton();
};
