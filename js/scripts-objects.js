function getUrlParam(name) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name);
}

const eventName = getUrlParam("name");

  fetch("../json/events.json")
    .then(response => response.json())
    .then(data => showSelectedEvent(data, eventName))
    .catch(error => console.error("Error fetching JSON:", error));

function showSelectedEvent(data) {
        const eventDetailsDiv = document.getElementById("event-details");
        const selectedEvent = data.events.find(event => event.name === eventName);
    
        if (selectedEvent) {
          eventDetailsDiv.innerHTML = `
            <h3>${selectedEvent.name}</h3>
            <p><strong>Date:</strong> ${selectedEvent.date}</p>
            <p><strong>Location:</strong> ${selectedEvent.location}</p>
            <p><strong>Participants:</strong> ${selectedEvent.participants}</p>
            <p><strong>Rating:</strong> ${selectedEvent.rating}</p>
            <p><strong>Activity:</strong> ${selectedEvent.activity}</p>
          `;
        } else {
          // If the event is not found, display an error message
          eventDetailsDiv.innerHTML = `<p>Event not found.</p>`;
        }    
}
