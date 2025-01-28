let user_type = document.getElementById("user-type-selector");
user_type.addEventListener('change', selectChangeListener);

let search_box = document.getElementById('search_text');
search_box.addEventListener('input', searchTextChangeListener);
document.getElementById('search-bar-form').addEventListener('submit', (event) => { event.preventDefault(); });

let searchDelayTimer;
const SEARCH_DELAY = 500;

search_box.addEventListener('keydown', () => {
    clearTimeout(searchDelayTimer);
})

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

    req.open('GET', `../../control/admin/get_users.php?type=${user_type.value.toLowerCase()}&page=${1}`, true);
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

        req.open('GET', `../../control/admin/search_users.php?type=${user_type.value.toLowerCase()}&query=${search_box.value}&page=${1}`, true);
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