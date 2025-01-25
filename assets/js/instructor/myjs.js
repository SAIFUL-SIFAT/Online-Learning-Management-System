//signup form validation
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('registrationForm').addEventListener('submit', function(event) {
    let errors = [];

    // Validate Full Name
    const fullName = document.getElementById('full_name').value.trim();
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
  
    // Validate Password
    const password = document.getElementById('pass').value;
    if (!password) {
        errors.push("Password is required.");
        document.getElementById('pass_error').textContent = "Password is required.";
    } else if (password.length < 6) {
        errors.push("Password must be at least 6 characters.");
        document.getElementById('pass_error').textContent = "Password must be at least 6 characters.";
    } else if (!/[a-z]/.test(password)) {
        errors.push("Password must contain at least one lowercase letter.");
        document.getElementById('pass_error').textContent = "Password must contain at least one lowercase letter.";
    } else {
        document.getElementById('pass_error').textContent = "";
    }
  
    // Validate Phone Number
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
  
    // Validate Teaching Experience
    const teachingExperience = document.getElementById('T_experience').value;
    if (!teachingExperience) {
        errors.push("Teaching Experience is required.");
        document.getElementById('T_experience_error').textContent = "Teaching Experience is required.";
    } else {
        document.getElementById('T_experience_error').textContent = "";
    }
  
    // Validate Institution
    const institution = document.getElementById('institution').value.trim();
    if (!institution) {
        errors.push("Institution is required.");
        document.getElementById('institution_error').textContent = "Institution is required.";
    } else {
        document.getElementById('institution_error').textContent = "";
    }
  
    // Show errors if any
    if (errors.length > 0) {
        event.preventDefault(); // Prevent form submission
    }
  });
});
