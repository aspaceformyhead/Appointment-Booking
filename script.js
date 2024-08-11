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







document.addEventListener('DOMContentLoaded', function () {
    var ctx1 = document.getElementById('acquisitionPieChart').getContext('2d');
    var ctx2 = document.getElementById('demographicsLineChart').getContext('2d');

    // Customer Acquisition Pie Chart
    new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: ['Social Media', 'Referrals', 'Ads', 'Website'],
            datasets: [{
                data: [30, 25, 20, 25],  // Replace with actual data
                backgroundColor: ['#4CAF50', '#FFC107', '#2196F3', '#FF5722']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: true },
                title: {
                    display: true,
                    text: 'Customer Acquisition Sources'
                }
            }
        }
    });

    // Customer Demographics Line Chart
    new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],  // Example labels
            datasets: [{
                label: 'Number of Customers',
                data: [50, 60, 70, 65, 80, 90, 85],  // Replace with actual data
                borderColor: '#2196F3',
                backgroundColor: 'rgba(33, 150, 243, 0.2)',
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: true },
                title: {
                    display: true,
                    text: 'Customer Demographics'
                }
            },
            scales: {
                x: {
                    title: { display: true, text: 'Month' }
                },
                y: {
                    title: { display: true, text: 'Number of Customers' },
                    beginAtZero: true
                }
            }
        }
    });
});




