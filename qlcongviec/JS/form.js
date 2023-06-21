const btnGetStarted = document.querySelector('.open-login-form');
const wrapper = document.querySelector('.wrapper');

const loginForm = document.querySelector('.login');
const registerForm = document.querySelector('.register');

const closeLogin = document.querySelector('.login-close');
const closeRegister = document.querySelector('.register-close');

const registerLink = document.querySelector('.register-link');
const loginLink = document.querySelector('.login-link');

function openWrapper() {
  if (!registerForm.classList.contains('active')) {
    wrapper.classList.add('active-wrapper');
    loginForm.classList.add('active');
  }
}

// btnGetStarted.addEventListener('click', ()=>{
//   wrapper.classList.add('active-wrapper');
//   registerForm.classList.add('active');
// });

closeLogin.addEventListener('click', ()=>{
  loginForm.classList.remove('active');
  wrapper.classList.remove('active-wrapper');
});

closeRegister.addEventListener('click', ()=>{
  registerForm.classList.remove('active');
  wrapper.classList.remove('active-wrapper');
});

registerLink.addEventListener('click', ()=>{
  loginForm.classList.remove('active');
  registerForm.classList.add('active');
});

loginLink.addEventListener('click', ()=>{
  registerForm.classList.remove('active');
  loginForm.classList.add('active');
});

