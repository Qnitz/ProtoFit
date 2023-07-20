document.getElementById('rating').addEventListener('click', function(e) {
    if(e.target.tagName === 'A') {
      e.preventDefault();
      clearActive();
      e.target.classList.add('active');
      let rating = e.target.getAttribute('data-rate');
      postRating(rating);
    }
  });
  
  function clearActive() {
    let stars = document.querySelectorAll('.rating a');
    for(let star of stars) {
      star.classList.remove('active');
    }
  }
  
  function postRating(rating) {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'storeRating.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if(this.readyState === XMLHttpRequest.DONE && this.status === 200) {
        console.log(this.responseText);
      }
    }
    xhr.send('rating=' + rating);
  }
  