const target = document.getElementById("menu");
target.addEventListener('click', () => {
  target.classList.toggle('open');
  const nav = document.getElementById("nav");
  nav.classList.toggle('in');
});


  const back = document.getElementById('btn--back');
  back.addEventListener('click', (e) => {
  history.back();
  return false;
  });


