/**
 * Calculates the correct top offset for a mobile menu overlay
 * based on current scroll position and header height.
 * * @param {string} headerTarget - The CSS selector for the header element
 * @return {number} The calculated top offset in pixels
 */
export function getOverlayOffset(headerTarget) {
  const header = headerTarget

  if (!header) {
    console.warn(`Header element with selector "${headerTarget}" not found.`)
    return 0
  }

  const scrollTop = window.scrollY || document.documentElement.scrollTop
  const headerHeight = header.getBoundingClientRect().height
  const visibleHeaderHeight = headerHeight - scrollTop

  return Math.max(0, visibleHeaderHeight)
}
