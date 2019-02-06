let registerForm = document.getElementById('cz-register-form');
let loginForm = document.getElementById('cz-login-form');
let registerToggle = document.getElementById('registerToggle');
let loginToggle = document.getElementById('loginToggle');

loginToggle.addEventListener('click', function() {
    registerForm.style.display = 'none'
    loginForm.style.display = 'block';
})

registerToggle.addEventListener('click', function() {
    loginForm.style.display = 'none';
    registerForm.style.display = 'block';
})