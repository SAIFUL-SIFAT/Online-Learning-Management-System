// registrationValidation.js
function validateForm() {
    const studentId = document.getElementById('id').value;
    const fullName = document.getElementById('fullName').value;
    const lastName = document.getElementById('lastName').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confromPassword = document.getElementById('confromPassword').value;
    const phone = document.getElementById('phone').value;

    if (!studentId) {
        alert('Please enter your Student ID.');
        return false;
    }

    if (!fullName) {
        alert('Please enter your full name.');
        return false;
    }

    if (!lastName) {
        alert('Please enter your last name.');
        return false;
    }

    if (!email) {
        alert('Please enter your email address.');
        return false;
    }

    if (!password) {
        alert('Please enter your password.');
        return false;
    }

    if (password !== confromPassword) {
        alert('Passwords do not match.');
        return false;
    }

    if (!phone) {
        alert('Please enter your phone number.');
        return false;
    }

    return true; // Allow form submission
}
