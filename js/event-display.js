window.onload = () => {
  const urlParams = new URLSearchParams(window.location.search);
  const eventId = urlParams.get('ev_id');
  const eventName = urlParams.get('ev_name');

  document.getElementById('event-title').textContent = eventName;
};
