const modal = document.querySelector(".modal");
const fade = document.querySelector(".fade");

const createModal = (type) => {
  const header = modal.querySelector(".modal-header");
  const body = modal.querySelector(".modal-body");
  const footer = modal.querySelector(".modal-footer");

  switch (type) {
    case "win":
      header.innerText = "Parabéns, você venceu! 🎉";
      body.innerHTML = `
        <ul>
            <li>
                <div>
                    <i class="fa-solid fa-arrow-pointer"></i>
                    &nbsp;
                    Movimentos:
                </div>
                <span id="moves-count-endgame">${movesCount.innerText}</span>
            </li>
            <li>
                <div>
                    <i class="fa-solid fa-stopwatch"></i>
                    &nbsp;
                    Tempo:
                </div>
                <span id="time-count-endgame">${timeCount.innerText}</span>
            </li>
        </ul>
        `;
      footer.innerHTML = `
      <form action="../actions/user/updateGameStatus.php" method="POST" class="buttons">
        <input type="hidden" name="moves" value="${movesCount.innerText}" />
        <input type="hidden" name="time" value="00:${timeCount.innerText}" />
        <button class="success button" type="submit" value="game" name="page">Jogar novamente</button>
        <button class="primary button" type="submit" value="deck" name="page">Alterar baralho</button>
        <button class="primary button" type="submit" value="leaderboard" name="page">Ver leaderboard</button>
      </form>
        `;
      break;
    case "delete-all-cards":
      header.innerText = "Calma aí rapaz! 🤨";
      body.innerHTML = `
        <p>Deseja mesmo deletar tudo?<p>
    `;
      footer.innerHTML = `
      <button class="danger button">Deletar tudo</button>
      <button class="white button">Cancelar</button>
    `;
      break;
    case "delete-card":
      header.innerText = "Alerta! 😲";
      body.innerHTML = `
          <p>Deseja mesmo deletar esta carta?<p>
      `;
      footer.innerHTML = `
      <button class="danger button">Deletar</button>
      <button class="white button">Cancelar</button>
      `;
      break;
    case "update-avatar":
      header.innerText = "Escolha um dos avatares 😝";

      const currentAvatar = document.getElementById("avatar").src;
      let avatars = "";
      for (let index = 1; index <= 6; index++) {
        const selectedAvatar = currentAvatar.includes("avatar-" + index)
          ? "checked"
          : "";
        avatars += `
        <label class="avatar" for="avatar-${index}">
          <input type="radio" name="avatar" id="avatar-${index}" value="avatar-${index}" ${selectedAvatar} selected required>
          <img src="../assets/avatars/avatar-${index}.png" alt="Avatar">
        </label>
        `;
      }
      body.innerHTML = `
        <form id="update-avatar_" class="avatars" action="../actions/user/updateAvatar.php" method="POST">
          ${avatars}
        </form>
      `;

      footer.innerHTML = `
          <button class="danger button" type="submit" form="update-avatar_">Alterar avatar</button>
          <button class="white button">Cancelar</button> 
      `;
      break;
    case "update-username":
      header.innerText = "Alteração de nome de usuário. 😏";

      const username = document.getElementById("username").textContent;
      body.innerHTML = `
          <form id="update-username_" action="../actions/user/updateUsername.php" method="POST">
            <input class="username" type="text" name="username" value="${username}" />
          </form>
      `;
      footer.innerHTML = `
          <button class="primary button" type="submit" form="update-username_">Alterar nome de usuário</button>
          <button class="white button">Cancelar</button>
      `;
      break;
    case "logout":
      header.innerText = "Por favor, não vá embora! 😢";

      body.innerHTML = `
            <form id="logout" action="../actions/user/logout.php" method="POST">
              <p>Deseja mesmo sair da sua conta?</p>
            </form>
        `;

      footer.innerHTML = `
            <button type="submit" class="danger button" form="logout">Sair da conta</button>
            <button class="white button">Cancelar</button>
        `;
      break;
    case "delete-user":
      header.innerText = "Preste a fazer algo altamente perigoso 😱";

      body.innerHTML = `
              <form id="delete-user_" action="../actions/user/delete.php" method="POST">
                <p>Deseja mesmo deletar sua conta???</p>
              </form>
          `;

      footer.innerHTML = `
              <button class="danger button" type="submit" form="delete-user_">Deletar conta</button>
              <button class="white button">Cancelar</button>
          `;
      break;
    default:
      return;
  }
};

const toggleModal = (type) => {
  createModal(type);
  [modal, fade].forEach((element) => element.classList.toggle("hidden"));
};
