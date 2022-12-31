const game = document.querySelector("#game");
const files = document.querySelector("#files").value;
const timeCount = document.querySelector("#time-count");
const movesCount = document.querySelector("#moves-count");
let firstCard = "";
let secondCard = "";
let timer = null;
let minutes = 0;
let seconds = 0;

const createElement = (tag, className) => {
  const element = document.createElement(tag);
  element.className = className;
  return element;
};

const endGame = () => {
  clearInterval(timer);
  toggleModal("win");
};

const checkEndGame = () => {
  const matchCards = document.querySelectorAll(".match");
  if (matchCards.length === 12) endGame();
};

const resetCards = () => {
  firstCard = "";
  secondCard = "";
};

const toggleDisabledAllCards = () => {
  const cards = document.querySelectorAll(".card");
  cards.forEach((card) => card.classList.toggle("disabled"));
};

const checkCards = () => {
  const firstImage = firstCard.getAttribute("data-file");
  const secondImage = secondCard.getAttribute("data-file");

  if (firstImage === secondImage) {
    firstCard.firstChild.classList.add("match");
    secondCard.firstChild.classList.add("match");
    resetCards();
    checkEndGame();
  } else {
    toggleDisabledAllCards();
    setTimeout(() => {
      firstCard.classList.remove("flip");
      secondCard.classList.remove("flip");
      resetCards();
      toggleDisabledAllCards();
    }, 350);
  }
};

const updateMovementsCount = () => ++movesCount.innerHTML;

const flipCard = ({ currentTarget  }) => {
  const card = currentTarget;
  console.log("click card", currentTarget );
  if (card.className.includes("flip")) return;
  card.classList.add("flip");

  updateMovementsCount();

  if (!firstCard) {
    firstCard = card;
  } else if (!secondCard) {
    secondCard = card;

    checkCards();
  }
};

const createCard = (file) => {
  const card = createElement("div", "card");
  const front = createElement("div", "face front");
  const back = createElement("div", "face back");

  front.style.backgroundImage = `url('../actions/card/${file}')`;

  card.appendChild(front);
  card.appendChild(back);

  back.innerText = "🧠 Memory card";

  card.addEventListener("click", flipCard);
  card.setAttribute("data-file", file);

  return card;
};

const startTimer = () => {
  timer = setInterval(() => {
    seconds = parseInt(seconds, 10) + 1;
    minutes = parseInt(minutes, 10);

    if (seconds >= 60) {
      minutes += 1;
      seconds = 0;
    }

    seconds = seconds < 10 ? "0" + seconds : seconds;
    minutes = minutes < 10 ? "0" + minutes : minutes;

    timeCount.innerText = minutes + ":" + seconds;
  }, 1000);
};

const startGame = () => {
  const duplicateFiles = [...files.split(","), ...files.split(",")];

  const shuffledFiles = duplicateFiles.sort(() => Math.random() - 0.5);

  shuffledFiles.forEach((file) => {
    const card = createCard(file);
    game.appendChild(card);
  });
};

window.onload = () => {
  startGame();
  startTimer();
};
