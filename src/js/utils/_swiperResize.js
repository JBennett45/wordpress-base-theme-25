// src/utils/sliderUtils.js

/**
 * Equalizes the height of all elements matching a selector inside a container.
 * @param {string} containerSelector - The CSS selector for the slider container.
 * @param {string} itemSelector - The CSS selector for the individual slides.
 */
export function equalizeSlideHeights(containerSelector, itemSelector = '.slide-item') {
  const container = document.querySelector(containerSelector)
  if (!container) return null

  const slides = container.querySelectorAll(itemSelector)
  if (slides.length === 0) return null

  function resetAndMaxHeight() {
    let maxHeight = 0

    // 1. Reset heights to auto so we measure the natural height on resize
    slides.forEach((slide) => {
      slide.style.height = 'auto'
    })

    // 2. Find the tallest slide
    slides.forEach((slide) => {
      const slideHeight = slide.offsetHeight
      if (slideHeight > maxHeight) {
        maxHeight = slideHeight
      }
    })

    // 3. Apply the max height to all slides
    slides.forEach((slide) => {
      slide.style.height = `${maxHeight}px`
    })
  }

  // Run immediately
  resetAndMaxHeight()

  // Handle resize efficiently
  let resizeTimer
  const handleResize = () => {
    clearTimeout(resizeTimer)
    resizeTimer = setTimeout(resetAndMaxHeight, 100)
  }

  window.addEventListener('resize', handleResize)

  // Return a cleanup function in case you need to destroy it later (great for SPAs/React/Vue)
  return () => {
    window.removeEventListener('resize', handleResize)
  }
}
