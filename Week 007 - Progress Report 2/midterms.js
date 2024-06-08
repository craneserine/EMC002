// Select the wrapper element
const wrapper = document.querySelector('.wrapper');
// Select the login and register links
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPop = document.querySelector('.btnLogin-popup');
// Select the close button element
const closeButton = document.querySelector('.icon-close');

// Event listener for the register link
registerLink.addEventListener('click', ()=> {
    // Add the active class to the wrapper
    wrapper.classList.add('active');
});

// Event listener for the login link
loginLink.addEventListener('click', ()=> {
    // Remove the active class from the wrapper
    wrapper.classList.remove('active');
});

btnPop.addEventListener('click', ()=> {
    // Add the active class to the wrapper
    wrapper.classList.add('active-popup');
});

// Event listener for closing the popup when clicking on the close button
closeButton.addEventListener('click', () => {
    // Remove the active class from the wrapper to close the popup
    wrapper.classList.remove('active-popup');
});


// Select the element with the ID 'menu-icon' and assign it to the variable 'menu'.
let menu = document.querySelector('#menu-icon');

// Select the element with the class 'navlist' and assign it to the variable 'navlist'.
let navlist = document.querySelector('.navlist');

// Define a function to be executed when the 'menu' element is clicked.
menu.onclick = () => {
    // Toggle the class 'bx-x' on the 'menu' element, adding it if it's not present, removing it if it's present.
    menu.classList.toggle('bx-x');
    
    // Toggle the class 'open' on the 'navlist' element, adding it if it's not present, removing it if it's present.
    navlist.classList.toggle('open');
};

// Initialize ScrollReveal with specific configurations.
const sr = ScrollReveal({
    // Set the distance at which the elements start their animation.
    distance: '65px',
    
    // Set the duration of the animation in milliseconds.
    duration: 2600,
    
    // Set the delay before the animation starts in milliseconds.
    delay: 450,
    
    // Set whether the animations should be reset every time they are triggered.
    reset: true
});

// Apply ScrollReveal animation to elements with the class 'info-text', revealing from the top with a delay of 200 milliseconds.
sr.reveal('.info-text', { delay: 200, origin: 'top' });

// Apply ScrollReveal animation to elements with the class 'icons', revealing from the left with a delay of 500 milliseconds.
sr.reveal('.icons', { delay: 500, origin: 'left' });

// Apply ScrollReveal animation to elements with the class 'scroll-down', revealing from the right with a delay of 500 milliseconds.
sr.reveal('.scroll-down', { delay: 500, origin: 'right' });

// Mouse trail

// Array to store dot elements
const dots = [];

// Object to track cursor position
const cursor = {
  x: 0,
  y: 0,
};

// Create 40 dots and append them to the document body
for (let i = 0; i < 40; i++) {
  const dot = document.createElement("div");
  dot.className = "dot"; // Set class name for styling
  document.body.appendChild(dot); // Append dot element to the document body
  dots.push(dot); // Add dot element to the dots array
}

// Event listener to update cursor position on mousemove
document.addEventListener("mousemove", (e) => {
  cursor.x = e.clientX; // Update cursor x-coordinate
  cursor.y = e.clientY; // Update cursor y-coordinate
});

// Function to draw the mouse trail effect
function draw() {
  let x = cursor.x; // Initialize x-coordinate with cursor x-coordinate
  let y = cursor.y; // Initialize y-coordinate with cursor y-coordinate

  dots.forEach((dot, index) => {
    const nextDot = dots[index + 1] || dots[0]; // Get the next dot or the first dot if it's the last one

    dot.style.left = x + "px"; // Set dot's left position
    dot.style.top = y + "px"; // Set dot's top position

    // Update x and y coordinates for the next dot based on the difference between current and next dot positions
    x += (nextDot.offsetLeft - dot.offsetLeft) * 0.5;
    y += (nextDot.offsetTop - dot.offsetTop) * 0.5;
  });
}

setInterval(draw, 10);

// PORTFOLIO
const initSlider = () => {
  const imageList = document.querySelector(".slider-wrapper .image-list");
  const slideButtons = document.querySelectorAll(".slider-wrapper .slide-button");
  const sliderScrollbar = document.querySelector(".container .slider-scrollbar");
  const scrollbarThumb = sliderScrollbar.querySelector(".scrollbar-thumb");
  const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;
  
  // Handle scrollbar thumb drag
  scrollbarThumb.addEventListener("mousedown", (e) => {
      const startX = e.clientX;
      const thumbPosition = scrollbarThumb.offsetLeft;
      const maxThumbPosition = sliderScrollbar.getBoundingClientRect().width - scrollbarThumb.offsetWidth;
      
      // Update thumb position on mouse move
      const handleMouseMove = (e) => {
          const deltaX = e.clientX - startX;
          const newThumbPosition = thumbPosition + deltaX;
          // Ensure the scrollbar thumb stays within bounds
          const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
          const scrollPosition = (boundedPosition / maxThumbPosition) * maxScrollLeft;
          
          scrollbarThumb.style.left = `${boundedPosition}px`;
          imageList.scrollLeft = scrollPosition;
      }
      // Remove event listeners on mouse up
      const handleMouseUp = () => {
          document.removeEventListener("mousemove", handleMouseMove);
          document.removeEventListener("mouseup", handleMouseUp);
      }
      // Add event listeners for drag interaction
      document.addEventListener("mousemove", handleMouseMove);
      document.addEventListener("mouseup", handleMouseUp);
  });
  // Slide images according to the slide button clicks
  slideButtons.forEach(button => {
      button.addEventListener("click", () => {
          const direction = button.id === "prev-slide" ? -1 : 1;
          const scrollAmount = imageList.clientWidth * direction;
          imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
      });
  });
   // Show or hide slide buttons based on scroll position
  const handleSlideButtons = () => {
      slideButtons[0].style.display = imageList.scrollLeft <= 0 ? "none" : "flex";
      slideButtons[1].style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "flex";
  }
  // Update scrollbar thumb position based on image scroll
  const updateScrollThumbPosition = () => {
      const scrollPosition = imageList.scrollLeft;
      const thumbPosition = (scrollPosition / maxScrollLeft) * (sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth);
      scrollbarThumb.style.left = `${thumbPosition}px`;
  }
  // Call these two functions when image list scrolls
  imageList.addEventListener("scroll", () => {
      updateScrollThumbPosition();
      handleSlideButtons();
  });
}
window.addEventListener("resize", initSlider);
window.addEventListener("load", initSlider);