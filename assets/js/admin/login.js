let url_params = new URLSearchParams(window.location.search);
let invalid_cred = document.getElementById('invalid-credentials');
let error = url_params.get('error');

let username = document.getElementById('username');
let password = document.getElementById('password');

username.style.border = '';
password.style.border = '';
invalid_cred.style.display = '';

if (error == 1) {
    username.style.border = '1px solid red';
    password.style.border = '1px solid red';
    invalid_cred.style.display = 'block';
}