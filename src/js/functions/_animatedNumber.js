// Animation Function //
function animateNumberFromZero(obj, start, end, duration) {
  let startTimestamp = null;
  const step = (timestamp) => {
    if (!startTimestamp) startTimestamp = timestamp;
    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
    obj.innerHTML = Math.floor(progress * (end - start) + start);
    if (progress < 1) {
      window.requestAnimationFrame(step);
    }
  };
  window.requestAnimationFrame(step);
}
const section_observe_options = {
  root: null,
  rootMargin: "0px",
  threshold: 0.3,
};
// Observer //
const class_to_observe = ".animated-number-jcst";
const callback = (entries, observer) => {
  entries.forEach(entry => {
    if (entry.isIntersecting && !entry.target.classList.contains("animation-completed")) {
      let number_entry = entry.target;
      let nunber_end = number_entry.innerHTML;
      number_entry.classList.add("animation-completed");
      animateNumberFromZero(number_entry, 0, nunber_end, 1750);
    }
  })
}
const observer = new IntersectionObserver(callback, section_observe_options);
const animatedElements = document.querySelectorAll(class_to_observe);
animatedElements.forEach(element => observer.observe(element));