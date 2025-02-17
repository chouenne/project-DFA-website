// scroll header js
window.addEventListener('scroll', function () {
  const header = document.getElementById('header');
  const scrollPosition = window.scrollY; // Get the current scroll position

  if (scrollPosition > window.innerHeight * 0.2) { // Check if scrolled down 20vh
    header.classList.add('scrolled'); // Add class for black background
  } else {
    header.classList.remove('scrolled'); // Remove class for transparent background
  }
});
