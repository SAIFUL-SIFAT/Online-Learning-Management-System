const instructorSelect = document.getElementById("instructor-select");
const instructorId = document.getElementById("instructor_id");

document.getElementById("instructor-query").addEventListener("input", function () {
    const query = this.value;
    if (query === '') return;

    instructorId.value = "";

    const req = new XMLHttpRequest();

    req.open("GET", `../../control/admin/search_instructors.php?query=${query}` );
    req.onload = function () {
        const data = JSON.parse(req.response);
        instructorSelect.innerHTML = `<option value="" disabled selected>Select an instructor</option>`;

        try {
            data.forEach((instructor) => {
                const option = document.createElement("option");
                option.value = instructor['instructor_id'];
                option.textContent = instructor['full_name'];
                instructorSelect.appendChild(option);
            });
        } catch (e) {
        }
    };
    req.send();
});

instructorSelect.addEventListener("change", function (event) {
    instructorId.value = event.target.value;
});