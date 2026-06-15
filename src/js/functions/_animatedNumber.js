class AnimatedNumber extends HTMLElement {
  constructor() {
    super()
    this.observer = null
    this.handleIntersect = this.handleIntersect.bind(this)
  }

  connectedCallback() {
    const options = {
      root: null,
      rootMargin: '0px',
      threshold: 0.3,
    }

    this.observer = new IntersectionObserver(this.handleIntersect, options)
    this.querySelectorAll('.animated-number-cst').forEach((element) => {
      this.observer.observe(element)
    })
  }

  disconnectedCallback() {
    if (this.observer) {
      this.observer.disconnect()
      this.observer = null
    }
  }

  handleIntersect(entries) {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) {
        return
      }

      const numberEntry = entry.target
      if (numberEntry.classList.contains('animation-completed')) {
        return
      }

      const endValue = parseInt(numberEntry.textContent.trim(), 10)
      if (Number.isNaN(endValue)) {
        numberEntry.classList.add('animation-completed')
        return
      }

      numberEntry.classList.add('animation-completed')
      this.animateNumberFromZero(numberEntry, 0, endValue, 1750)
    })
  }

  animateNumberFromZero(obj, start, end, duration) {
    let startTimestamp = null

    const step = (timestamp) => {
      if (!startTimestamp) startTimestamp = timestamp
      const progress = Math.min((timestamp - startTimestamp) / duration, 1)
      obj.innerHTML = Math.floor(progress * (end - start) + start)

      if (progress < 1) {
        window.requestAnimationFrame(step)
      }
    }

    window.requestAnimationFrame(step)
  }
}

customElements.define('animated-number', AnimatedNumber)
