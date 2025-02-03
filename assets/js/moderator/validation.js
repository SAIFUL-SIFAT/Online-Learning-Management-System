function validateSignupForm(event) {
    let fullName = document.getElementById("full_name").value.trim();
    let email = document.getElementById("email").value.trim();
    let username = document.getElementById("username").value.trim();
    let password = document.getElementById("password").value.trim();
    let confirmPassword = document.getElementById("confirm_password").value.trim();
    let phone = document.getElementById("phone_number").value.trim();
    
    if (fullName === "") {
        event.preventDefault();
        alert("Full Name is required");
        return false;
    }
    if (!email.includes("@") || !email.includes(".")) {
        event.preventDefault();

        alert("Invalid email format");
        return false;
    }
    if (username === "") {
        event.preventDefault();

        alert("Username is required");
        return false;
    }
    if (password.length < 6) {
        event.preventDefault();

        alert("Password must be at least 6 characters long");
        return false;
    }
    if (password !== confirmPassword) {
        event.preventDefault();

        alert("Passwords do not match");
        return false;
    }
    if (isNaN(phone) || phone.length < 10) {
        event.preventDefault();

        alert("Invalid phone number");
        return false;
    }
    return true;
}
