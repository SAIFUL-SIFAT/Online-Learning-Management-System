document.getElementById('signup_form').addEventListener('submit', function(event) {
    let prev_errors = document.getElementsByClassName('show-validation-error');
    if (prev_errors.length > 0) {
        for (let err of prev_errors) {
            err.classList.remove('show-validation-error');
        }
    }

    let formIsValid = true;

    let username = document.getElementById('username').value;
    if (username.length < 4) {
        document.getElementById('username-error').classList.add('show-validation-error');
        formIsValid = false;
    }

    let password = document.getElementById('password').value;
    if (password.length < 6) {
        document.getElementById('password-error').classList.add('show-validation-error');
        formIsValid = false;
    }

    let confirmPassword = document.getElementById('confirm_password').value;
    if (password !== confirmPassword) {
        document.getElementById('confirm-password-error').classList.add('show-validation-error');
        formIsValid = false;
    }

    let authCode = document.getElementById('admin_auth_code').value;
    if (!authCode) {
        document.getElementById('auth-code-error').classList.add('show-validation-error');
        formIsValid = false;
    }

    let phone = document.getElementById('phone').value;
    if (!phone) {
        document.getElementById('phone-error').classList.add('show-validation-error');
        formIsValid = false;
    }

    if (!formIsValid) {
        event.preventDefault();
    }
});
