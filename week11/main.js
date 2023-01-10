const validateEmail = email => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
const validateTel = tel =>  /^[+]?[(]?[0-9]{3}[)]?[-\s.]?[0-9]{3}[-\s.]?[0-9]{4,6}$/im.test(tel);
function handleInput() {
  const input = this;
  const error = input.parentElement.querySelector(".error");
  error.textContent = input.value ? "" : `${input.placeholder} can't be blank`;
  if(input.type === 'email') {
    error.textContent = validateEmail(input.value) ? "" : 'Email invalid';
  }
  else if(input.type === 'tel') {
    error.textContent = validateTel(input.value) ? "" : 'Telephone invalid';
  }
}

const inputs = document.querySelectorAll("input");
Array.from(inputs).forEach(input => input.addEventListener('input', handleInput.bind(input)));