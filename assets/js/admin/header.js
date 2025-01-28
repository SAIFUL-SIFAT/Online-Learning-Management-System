let notification_list = document.getElementById('notification-list');
let notification_icon = document.getElementById('notification');
notification_icon.addEventListener('click', function(event) {
    notification_list.classList.toggle('hide-notification');
});

document.addEventListener('DOMContentLoaded', function(event) {
    let req = new XMLHttpRequest();
    req.onload = function() {
        notification_list.innerHTML = '';
        setNotifications(JSON.parse(this.response));
    };

    req.open('GET', '../../control/admin/get_notifications.php');
    req.send();
});

function setNotifications(response) {
    let notifications = '';
    response.forEach(notification => {
        notifications += `
            <div id="notification-item">
                <span id="notification-message">${notification['message']}</span>
                <span id="notification-time">${notification['created_at']}</span>
            </div>
        `;
    });
    notification_list.innerHTML = notifications;
}
