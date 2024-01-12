let button = document.querySelector(".menu"),
  links = document.querySelector(".links");

button.addEventListener("click", () => {
  links.classList.toggle("animate");
  button.children[0].classList.toggle("menu1");
  button.children[1].classList.toggle("menu2");
  button.children[2].classList.toggle("menu3");
});
