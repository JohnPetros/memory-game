const templateCard = document.querySelector(".template-card");
const input = document.querySelector("input[type='file']");

const handleInput = ({ target }) => {
  file = target.files[0].name;
  if (file) templateCard.submit();
};

input.addEventListener("change", handleInput);
