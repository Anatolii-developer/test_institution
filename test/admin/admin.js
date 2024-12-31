document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('.sidebar a').forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault();
            const sectionId = event.target.getAttribute('onclick').split("'")[1];
            document.querySelectorAll('.content-section').forEach(section => {
                section.style.display = 'none';
            });
            document.getElementById(sectionId).style.display = 'block';
        });
    });
});

function fetchUsers() {
    fetch('./get_users.php')
        .then(response => response.json())
        .then(users => {
            const userTable = document.getElementById('user-table');
            userTable.innerHTML = users.map(user => `
                <tr>
                    <td>${user.id}</td>
                    <td>${user.username}</td>
                    <td>${user.role}</td>
                    <td>
                        <button onclick="editUser(${user.id})">Edit</button>
                        <button onclick="deleteUser(${user.id})">Delete</button>
                    </td>
                </tr>
            `).join('');
        })
        .catch(error => console.error('Error fetching users:', error));
}

document.addEventListener("DOMContentLoaded", fetchUsers);


function generatePracticeReport() {
    alert("Practice report generated! (Simulated)");
}
