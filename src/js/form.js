const form = document.querySelector("form");
const username = document.querySelector("input[name='username']");
const email = document.querySelector("input[name='email']");
const password = document.querySelector("input[name='password']");
const confirmPassword = document.querySelector(
  "input[name='confirm-password']"
);

const setError = (input, message) => {
  const formGroup = input.parentElement;
  const small = formGroup.querySelector("small");

  small.innerText = message;
  formGroup.className = "form-group error";
};

const setSuccess = (input) => {
  const formControl = input.parentElement;

  formControl.className = "form-group success";
};

const escapeHtml = (input) => {
  const htmlCharacters = {
    "&": "&amp;",
    "<": "&lt;",
    ">": "&gt;",
    '"': "&quot;",
    "'": "&#039;",
  };

  return input.replace(/[&<>"']/g, (value) => htmlCharacters[value]);
};

const clearInputs = (...inputs) => {
  inputs.map((input) => {
    input.trim().replace("\\", "");
    escapeHtml(input);
    return input;
  });
};

const checkEmail = (email) => {
  return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
    email
  );
};

const checkInputs = () => {
  const usernameValue = username.value;
  const emailValue = email.value;
  const passwordValue = password.value;
  const confirmPasswordValue = confirmPassword.value;

  clearInputs(usernameValue, emailValue, passwordValue, confirmPasswordValue);

  if (usernameValue === "") {
    setError(username, "O nome de usuário é obrigatório");
  } else {
    setSuccess(username);
  }

  if (emailValue === "") {
    setError(email, "O email é obrigatório.");
  } else if (!checkEmail(emailValue)) {
    setError(email, "Por favor, insira um e-mail válido.");
  } else {
    setSuccess(email);
  }

  if (passwordValue === "") {
    setError(password, "A senha é obrigatória");
  } else if (passwordValue.length < 7) {
    setError(password, "A senha precisa ter no mínimo 7 caracteres.");
  } else {
    setSuccess(password);
  }

  if (confirmPasswordValue === "") {
    setError(confirmPassword, "A confirmação de senha é obrigatória.");
  } else if (confirmPasswordValue !== passwordValue) {
    setError(confirmPassword, "As senhas não conferem.");
  } else {
    setSuccess(confirmPassword);
  }

  const formGroups = form.querySelectorAll(".form-group");

  const formIsValid = [...formGroups].every(
    (formControl) => formControl.className === "form-group success"
  );

  if (formIsValid) {
    form.submit();
  }
};

form.addEventListener("submit", (event) => {
  event.preventDefault();

  checkInputs();
});
