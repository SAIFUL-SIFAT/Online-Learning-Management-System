document.getElementById('registrationForm').addEventListener('submit', function(event) {
    let errors = [];

    const fullName = document.getElementById('fullName').value.trim();
    if (!fullName) {
        errors.push("Full Name is required.");
        document.getElementById('full_name_error').textContent = "Full Name is required.";
    } else if (!/^[a-zA-Z\s]+$/.test(fullName)) {
        errors.push("Full Name can only contain letters and spaces.");
        document.getElementById('full_name_error').textContent = "Full Name can only contain letters and spaces.";
    } else if (fullName.length > 40) {
        errors.push("Full Name can be a maximum of 40 characters.");
        document.getElementById('full_name_error').textContent = "Full Name can be a maximum of 40 characters.";
    } else {
        document.getElementById('full_name_error').textContent = "";
    }

    const lastName = document.getElementById('lastName').value.trim();
    if (!lastName) {
        errors.push("Last Name is required.");
        document.getElementById('last_name_error').textContent = "Last Name is required.";
    } else {
        document.getElementById('last_name_error').textContent = "";
    }
    const email = document.getElementById('email').value.trim();
    if (!email) {
        errors.push("Email Address is required.");
        document.getElementById('email_error').textContent = "Email Address is required.";
    } else if (!/\S+@\S+\.\S+/.test(email)) {
        errors.push("Email Address is invalid.");
        document.getElementById('email_error').textContent = "Email Address is invalid.";
    } else {
        document.getElementById('email_error').textContent = "";
    }

    const confirmPassword = document.getElementById('confromPassword').value;
    if (confirmPassword !== password) {
        errors.push("Passwords do not match.");
        document.getElementById('confirm_password_error').textContent = "Passwords do not match.";
    } else {
        document.getElementById('confirm_password_error').textContent = "";
    }

    const phone = document.getElementById('phone').value;
    if (!phone) {
        errors.push("Phone Number is required.");
        document.getElementById('phone_error').textContent = "Phone Number is required.";
    } else if (!/^0[0-9]{10}$/.test(phone)) {
        errors.push("Phone Number must start with 0 and be exactly 11 digits.");
        document.getElementById('phone_error').textContent = "Phone Number must start with 0 and be exactly 11 digits.";
    } else {
        document.getElementById('phone_error').textContent = "";
    }

    if (errors.length > 0) {
        event.preventDefault();
    }
});
