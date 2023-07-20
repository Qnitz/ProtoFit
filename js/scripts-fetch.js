fetch("../json/events.json")
.then(response => response.json())
.then(data => {
  const eventsList = document.getElementById("event-list");
  const eventsData = data.events;
  eventsData.forEach(event => {
    const listItem = document.createElement("li");
    listItem.innerHTML = ` <a href="object.html?name=${encodeURIComponent(event.name)}">
      <h3>${event.name}</h3>
      <p><strong>Date:</strong> ${event.date}</p>
      <p><strong>Location:</strong> ${event.location}</p>
      <p><strong>Participants:</strong> ${event.participants}</p>
      <p><strong>Rating:</strong> ${event.rating}</p>
      <p><strong>Activity:</strong> ${event.activity}</p>
      </a>
    `;
    eventsList.appendChild(listItem);
  });
})
.catch(error => console.error("Error fetching JSON:", error));
