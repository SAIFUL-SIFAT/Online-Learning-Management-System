const addCourseButton = document.querySelector('.add-course');
const courseModal = document.querySelector('.course-modal');
const closeModalButton = document.querySelector('.close-modal');
const courseForm = document.querySelector('.course-modal form');
const coursesContainer = document.querySelector('.courses');

// Show the course modal when the "Add Course" button is clicked
addCourseButton.addEventListener('click', () => {
  courseModal.classList.remove('hidden');
});

// Hide the course modal when the close button is clicked
closeModalButton.addEventListener('click', () => {
  courseModal.classList.add('hidden');
  courseForm.reset();
});

// Handle the course form submission
courseForm.addEventListener('submit', (event) => {
  event.preventDefault();

  // Get the form values
  const courseTitle = document.getElementById('course-title').value;
  const courseDescription = document.getElementById('course-description').value;

  // Create a new course element and add it to the courses section
  const newCourse = createCourseElement(courseTitle, courseDescription);
  coursesContainer.appendChild(newCourse);

  // Reset the form and hide the modal
  courseForm.reset();
  courseModal.classList.add('hidden');
});

// Helper function to create a new course element
function createCourseElement(title, description) {
  const courseElement = document.createElement('div');
  courseElement.classList.add('course');

  const titleElement = document.createElement('h3');
  titleElement.textContent = title;

  const descriptionElement = document.createElement('p');
  descriptionElement.textContent = description;

  const linkElement = document.createElement('a');
  linkElement.href = '#';
  linkElement.classList.add('course-link');
  linkElement.appendChild(titleElement);

  const studentsElement = document.createElement('span');
  studentsElement.textContent = '0 students';

  courseElement.appendChild(linkElement);
  courseElement.appendChild(descriptionElement);
  courseElement.appendChild(studentsElement);

  return courseElement;
}




// for course video elements
const courseTitles = document.querySelectorAll('.course-link');

courseTitles.forEach(title => {
    title.addEventListener('click', (event) => {
        event.preventDefault();
        const videoContainer = title.closest('.course').querySelector('.video-container');
        console.log('Clicked:', title);
        console.log('Video Container:', videoContainer);
        videoContainer.style.display = videoContainer.style.display === 'none' ? 'block' : 'none';
        console.log('New Display:', videoContainer.style.display);
    });
});


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
