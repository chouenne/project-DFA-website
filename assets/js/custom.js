window.addEventListener('scroll', function () {
  const header = document.getElementById('header');
  const scrollPosition = window.scrollY;

  if (scrollPosition > window.innerHeight * 0.2) {
    header.classList.add('scrolled');
  } else {
    header.classList.remove('scrolled');
  }
});


document.querySelector('.navbar-toggler').addEventListener('click', function () {
  const header = document.getElementById('header');
  if (!header.classList.contains('scrolled')) {
    header.classList.add('scrolled');
  }
});
