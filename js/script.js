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








document.addEventListener("DOMContentLoaded", function () {

  const slides = document.querySelectorAll(".slide");
  const nextBtn = document.querySelector(".next");
  const prevBtn = document.querySelector(".prev");

  if (!slides.length) return; // safety

  let current = 0;

  function showSlide(index) {
    slides.forEach(slide => slide.classList.remove("active"));
    slides[index].classList.add("active");
  }

  function nextSlide() {
    current = (current + 1) % slides.length;
    showSlide(current);
  }

  function prevSlide() {
    current = (current - 1 + slides.length) % slides.length;
    showSlide(current);
  }

  /* BUTTONS SAFE CHECK */
  if (nextBtn) nextBtn.addEventListener("click", nextSlide);
  if (prevBtn) prevBtn.addEventListener("click", prevSlide);

  /* AUTO SLIDE */
  setInterval(nextSlide, 5000);

});







function closeModal() {
  const modal = document.getElementById("successModal");
  if (modal) modal.style.display = "none";
}

document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("successModal");
  const btn = document.getElementById("closeModalBtn");

  if (modal && btn) {
    btn.onclick = () => modal.remove();
    modal.onclick = (e) => {
      if (e.target === modal) modal.remove();
    };
  }
});


























document.addEventListener("DOMContentLoaded", function () {

  const topBtn = document.getElementById("topBtn");

  /* Show button when scroll down */
  window.addEventListener("scroll", function () {
    if (window.scrollY > 200) {
      topBtn.style.display = "block";
    } else {
      topBtn.style.display = "none";
    }
  });

  /* Scroll to top */
  topBtn.addEventListener("click", function () {
    window.scrollTo({
      top: 0,
      behavior: "smooth"
    });
  });

});