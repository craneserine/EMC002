const signinbtn = document.querySelector('.signinbtn')
const signupbtn = document.querySelector('.signupbtn')
const formbox = document.querySelector('.form-box')
const body = document.querySelector('body')

signinbtn.onclick = function() {
  formbox.classList.remove('active')
  body.classList.remove('active')
}

signupbtn.onclick = function() {
  formbox.classList.add('active')
  body.classList.add('active')
}

// Get the sign in button element
const signInButton = document.querySelector('input[type="submit"][value="Sign In"]');

// Add an event listener to the button
signInButton.addEventListener('click', (e) => {
  // Prevent the default form submission behavior
  e.preventDefault();

  // Simulate a successful sign-in (replace with actual authentication logic)
  const username = document.querySelector('input[type="text"][placeholder="Username"]').value;
  const password = document.querySelector('input[type="password"][placeholder="Password"]').value;

  if (username === 'your_username' && password === 'your_password') {
    // Redirect to index.html
    window.location.href = 'index.html';
  } else {
    alert('Invalid username or password');
  }
});