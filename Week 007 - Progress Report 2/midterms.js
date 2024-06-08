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
