const signinbtn = document.querySelector('.signinbtn')
const signupbtn = document.querySelector('.signupbtn')
const formbox = document.querySelector('.form-box')
const submit = document.querySelector('.submit')
const body = document.querySelector('body')

signinbtn.onclick = function() {
  formbox.classList.remove('active')
  body.classList.remove('active')
}

signupbtn.onclick = function() {
  formbox.classList.add('active')
  body.classList.add('active')
}

submit.onclick = function() {
    window.location.href = "index.html";
  }