const tabWrapper = document.querySelector(".tab-wrapper")
const tabButtons = document.querySelectorAll(".tab-button")
const tabContents = document.querySelectorAll(".tab-content")

let {tab} = tabButtons[0].dataset
tabWrapper.addEventListener("click", (event) => {
  tab = event.target.dataset.tab
  if (tab) {
    tabButtons.forEach((tabButton) => tabButton.classList.remove("active"))
    event.target.classList.add("active")

    tabContents.forEach((tabContent) => {
      tabContent.classList.remove("visible")
      tabContent.classList.add("hidden")
    })

    const tabCurrentContent = document.querySelector(`#${tab}`)
    tabCurrentContent.classList.remove("hidden")
    tabCurrentContent.classList.add("visible")
  }
})

window.addEventListener("load", () => {
  tabButtons.forEach((tabButton) => tabButton.classList.remove("active"))
  tabButtons[0].classList.add("active")

  tabContents.forEach((tabContent) => {
    tabContent.classList.remove("visible")
    tabContent.classList.add("hidden")
  })

  tabContents[0].classList.remove("hidden")
  tabContents[0].classList.add("visible")
})

// Slider
const slider = document.querySelector("#slider")
const slideSize = slider.querySelector(".slide").clientWidth

slider.querySelector("#next-slide").addEventListener("click", () => {
  slider.scrollBy(slideSize, 0)
})

slider.querySelector("#prev-slide").addEventListener("click", () => {
  slider.scrollBy(-slideSize, 0)
})
