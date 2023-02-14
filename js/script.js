const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", mobileMenu);

function mobileMenu() {
  hamburger.classList.toggle("active");
  navMenu.classList.toggle("active");
}

jQuery("#staff_recruit").multiselect({
  columns: 1,
  placeholder: "Select Staffs",
  search: true,
});
