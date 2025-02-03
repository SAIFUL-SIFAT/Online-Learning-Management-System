// registrationValidation.js
function validateForm(event) {
    const studentId = document.getElementById('id').value;
    const fullName = document.getElementById('fullName').value;
    const lastName = document.getElementById('lastName').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confromPassword = document.getElementById('confromPassword').value;
    const phone = document.getElementById('phone').value;

    if (!studentId) {
        event.preventDefault();
        alert('Please enter your Student ID.');
        return false;
    }

    if (!fullName) {
        event.preventDefault();

        alert('Please enter your full name.');
        return false;
    }

    if (!lastName) {
        event.preventDefault();

        alert('Please enter your last name.');
        return false;
    }

    if (!email) {
        event.preventDefault();

        alert('Please enter your email address.');
        return false;
    }

    if (!password) {
        event.preventDefault();

        alert('Please enter your password.');
        return false;
    }

    if (password !== confromPassword) {
        event.preventDefault();

        alert('Passwords do not match.');
        return false;
    }

    if (!phone) {
        event.preventDefault();

        alert('Please enter your phone number.');
        return false;
    }

    return true; // Allow form submission
}
