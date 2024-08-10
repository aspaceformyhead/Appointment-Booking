const texts = document.querySelectorAll('.text');
texts.forEach(text => {
    text.innerHTML = text.textContent.replace(/\S/g, "<span>$&</span>");
    const elements = text.querySelectorAll('span');
    for (let i = 0; i < elements.length; i++) {
        elements[i].style.transform = "rotate(" + i * (360 / elements.length) + "deg)";
    }
});

const loginToggleBtn = document.getElementById('login-toggle-btn'); // Changed ID
const signupToggleBtn = document.getElementById('signup-toggle-btn'); // Changed ID
const loginForm = document.getElementById('login-form');
const signupForm = document.getElementById('signup-form');

loginToggleBtn.addEventListener('click', function () {
    // Switching from Login to Sign Up
    loginForm.classList.remove('show');
    loginForm.classList.add('hide');
    signupForm.classList.remove('hide');
    signupForm.classList.add('show');
});

signupToggleBtn.addEventListener('click', function () { // Added event listener for signup form toggle
    // Switching from Sign Up to Login
    signupForm.classList.remove('show');
    signupForm.classList.add('hide');
    loginForm.classList.remove('hide');
    loginForm.classList.add('show');
});


const interior = document.querySelector('.interior');
const rep = document.querySelector('.rep');
const nailstud = document.querySelector('.nailstud');
const hairCut = document.querySelector('.hairCut');

interior.addEventListener('mouseenter', () => {
    rep.style.animation = 'slideInFromBottom 1s ease-out forwards';
    nailstud.style.animation = 'slideInFromBottom 1s ease-out 0.2s forwards';
    hairCut.style.animation = 'slideInFromBottom 1s ease-out 0.5s forwards';
});

interior.addEventListener('mouseleave', () => {
    rep.style.animation = '';
    nailstud.style.animation = '';
    hairCut.style.animation = '';
});











