function getUser(id) {
    for (let i = 0; i < userData.users.length; i++) {
        if (userData.users[i].id === id) {
            return userData.users[i];
        }
    }
    return null;
}

fetch("./json/users.json")
.then(response => response.json())
.then(data => {
  const userList = document.getElementById("user-list");
  const userData = data.users;

  userData.forEach(user => {
    const listItem = document.createElement("li");
    listItem.innerHTML = `
      <a href="login.php?loginMail=${encodeURIComponent(user.email)}&loginPass=${encodeURIComponent(user.password)}">
      <h3>${user.username}</h3>  
      <p><strong>Email:</strong> ${user.email}</p>  
      <p><strong>Group:</strong> ${user.group}</p>  
      </a>
    `;
    userList.appendChild(listItem);
  });
})
.catch(error => console.error("Error fetching JSON:", error));
