document.addEventListener("DOMContentLoaded", function() {
    const courseForm = document.querySelector(".add_courses");
    const courseTitle = document.getElementById("course-title");
    const courseDescription = document.getElementById("course-description");
    const instructorId = document.getElementById("instructor_id");

    courseForm.addEventListener("submit", function(event) {
        event.preventDefault();

        const formData = new FormData();
        formData.append("title", courseTitle.value);
        formData.append("description", courseDescription.value);
        formData.append("instructor_id", instructorId.value);

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "../../control/instructor/add_course_control.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);
                if (data.success) {
                    // Course creation successful, redirect the user
                    window.location.href = data.redirect;
                } else {
                    // Course creation failed, display an error message
                    alert("Failed to create course: " + data.error);
                }
            }
        };
        xhr.onerror = function() {
            console.error("Error creating course:", xhr.statusText);
            alert("An error occurred while creating the course. Please try again later.");
        };
        xhr.send(formData);
    });
});
