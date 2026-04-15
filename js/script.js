const toggle = document.getElementById("menuToggle");
const nav = document.getElementById("navLinks");
const navbar = document.getElementById("navbar");

/* Toggle mobile menu */
toggle.addEventListener("click", () => {
  nav.classList.toggle("active");
});

/* Mobile dropdown */
document.querySelectorAll(".dropdown > a").forEach(item => {
  item.addEventListener("click", function(e) {
    if (window.innerWidth <= 768) {
      e.preventDefault();

      const parent = this.parentElement;

      document.querySelectorAll(".dropdown").forEach(el => {
        if (el !== parent) el.classList.remove("active");
      });

      parent.classList.toggle("active");
    }
  });
});

/* Sticky scroll */
window.addEventListener("scroll", () => {
  navbar.classList.toggle("scrolled", window.scrollY > 50);
});










function closeModal() {
  const modal = document.getElementById("successModal");
  if (modal) modal.style.display = "none";
}