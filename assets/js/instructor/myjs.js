const addCourseButton = document.querySelector('.add-course');
const courseModal = document.querySelector('.course-modal');
const closeModalButton = document.querySelector('.close-modal');
const courseForm = document.querySelector('.course-modal form');

// Show the course modal when the "Add Course" button is clicked
addCourseButton.addEventListener('click', () => {
  courseModal.classList.remove('hidden');
});

// Hide the course modal when the close button is clicked
closeModalButton.addEventListener('click', () => {
  courseModal.classList.add('hidden');
});

// Handle the course form submission
courseForm.addEventListener('submit', (event) => {
  event.preventDefault();

  // Get the form values
  const courseTitle = document.getElementById('course-title').value;
  const courseDescription = document.getElementById('course-description').value;

  // Create a new course element and add it to the courses section
  const newCourse = createCourseElement(courseTitle, courseDescription);
  document.querySelector('.courses').appendChild(newCourse);

  // Reset the form and hide the modal
  courseForm.reset();
  courseModal.classList.add('hidden');
});

// Helper function to create a new course element
function createCourseElement(title, description) {
  // Create the new course element and return it
  // (similar to the existing course elements in the HTML)
  const courseElement = document.createElement('div');
  courseElement.classList.add('course');

  const titleElement = document.createElement('h3');
  titleElement.textContent = title;

  const descriptionElement = document.createElement('p');
  descriptionElement.textContent = description;

  courseElement.appendChild(titleElement);
  courseElement.appendChild(descriptionElement);

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
