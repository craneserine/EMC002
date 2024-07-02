const hamburger = document.querySelector('.header .nav-bar .nav-list .hamburger');
const mobile_menu = document.querySelector('.header .nav-bar .nav-list ul');
const menu_item = document.querySelectorAll('.header .nav-bar .nav-list ul li a');
const header = document.querySelector('.header.container');

hamburger.addEventListener('click', () => {
	hamburger.classList.toggle('active');
	mobile_menu.classList.toggle('active');
});

document.addEventListener('scroll', () => {
	var scroll_position = window.scrollY;
	if (scroll_position > 250) {
		header.style.backgroundColor = '#574e41';
	} else {
		header.style.backgroundColor = 'transparent';
	}
});

menu_item.forEach((item) => {
	item.addEventListener('click', () => {
		hamburger.classList.toggle('active');
		mobile_menu.classList.toggle('active');
	});
});

// cart

// Calculate cart total
const cartTotal = document.getElementById('cart-total');
const calculateCartTotal = () => {
  let total = 0;
  cart.forEach((item) => {
    total += 1; // Replace this with the actual price calculation
  });
  cartTotal.textContent = total;
};

// Add a click event listener to the confirm checkout button
document.querySelector('#confirm-checkout').addEventListener('click', () => {
  // Clear the cart
  cart = [];
  localStorage.removeItem('cart');

  // Redirect to the "index.html" page
  window.location.href = 'index.html';
});

// Update cart total
calculateCartTotal();