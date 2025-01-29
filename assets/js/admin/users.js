let user_type = document.getElementById("user-type-selector");
let search_box = document.getElementById('search_text');
let previous_button = document.getElementById('previous-page-button');
let next_button = document.getElementById('next-page-button');

user_type.addEventListener('change', selectChangeListener);
search_box.addEventListener('input', searchTextChangeListener);
previous_button.addEventListener('click', previousPageListener);
next_button.addEventListener('click', nextPageListener);

document.getElementById('search-bar-form').addEventListener('submit', (event) => { event.preventDefault(); });

let currentPage = 1;
let searchDelayTimer;
const SEARCH_DELAY = 500;
let limit = 7;

search_box.addEventListener('keydown', () => {
    clearTimeout(searchDelayTimer);
})

function previousPageListener(event) {
    if (currentPage === 2) previous_button.disabled = true;
    currentPage -= 1;

    let req = new XMLHttpRequest();
    req.onload = function() {
        const response = JSON.parse(this.response);
        if (response) {
            setTable(response);
        } else {
            clearTable();
        }
    };

    req.open('GET', `../../control/admin/get_users.php?type=${user_type.value.toLowerCase()}&page=${currentPage}`, true);
    req.send();
}

function nextPageListener(event) {
    previous_button.disabled = false;
    currentPage += 1;

    let req = new XMLHttpRequest();
    req.onload = function() {
        const response = JSON.parse(this.response);
        if (response) {
            setTable(response);
        } else {
            clearTable();
        }
    };

    req.open('GET', `../../control/admin/get_users.php?type=${user_type.value.toLowerCase()}&page=${currentPage}`, true);
    req.send();
}


function selectChangeListener(event) {
    let req = new XMLHttpRequest();
    req.onload = function() {
        const response = JSON.parse(this.response);
        // fill table with the response array
        if (response) {
            setTable(response);
        } else {
            clearTable();
        }
    };

    req.open('GET', `../../control/admin/get_users.php?type=${user_type.value.toLowerCase()}&page=${1}&limit=${limit}`, true);
    req.send();
}

function searchTextChangeListener(event) {
    clearTimeout(searchDelayTimer);
    searchDelayTimer = setTimeout(() => {
        let req = new XMLHttpRequest();
        req.onload = function() {
            const response = JSON.parse(this.response);
            // fill table with the response array
            if (response) {
                setTable(response);
            } else {
                clearTable();
            }
        };

        req.open('GET', `../../control/admin/search_users.php?type=${user_type.value.toLowerCase()}&query=${search_box.value}&page=${currentPage}&limit=${limit}`, true);
        req.send();

    }, SEARCH_DELAY);
}

function clearTable() {
    const table = document.getElementById("users-table");
    table.innerHTML = "";
}

function setTable(response) {
    const table = document.getElementById("users-table");

    table.innerHTML = "";

    if (response.length > 0) {
        const keys = Object.keys(response[0]);
        const headerRow = document.createElement("tr");
        keys.forEach(key => {
            const th = document.createElement("th");
            th.textContent = key;
            headerRow.appendChild(th);
        });
        headerRow.innerHTML += `<th>Action</th>`;
        table.appendChild(headerRow);

        response.forEach(row => {
            const tableRow = document.createElement("tr");
            keys.forEach(key => {
                const td = document.createElement("td");
                td.textContent = row[key];
                tableRow.appendChild(td);
            });

            tableRow.innerHTML += `<td><a class='link-button' id='user-action' href='../../control/admin/delete_course.php?id=${row[keys[0]]})'><img src='../../assets/uploads/admin/delete-red.png'>Delete</a></td>`;

            table.appendChild(tableRow);
        });
    }
}