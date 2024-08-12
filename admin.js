var xValues = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
var yValues = [12, 15, 14, 20, 18, 22, 19]; // Example data for average appointments per day
var barColors = ["rgba(134, 179, 246, 1)", "rgb(246, 134, 134)", "rgb(119, 231, 255)", "rgb(246, 201, 134)", "rgb(228, 245, 161)", "rgba(252, 206, 206, 1)", "rgba(206, 224, 252, 1)"];


window.onload = function () {
    new Chart("incomeChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues,
                borderRadius: 5,
                borderSkipped: false,
            }]
        },

        options: {
            responsive: true,
            plugins: {
                legend: { display: true },
                title: {
                    display: true,
                    text: 'Daily Average Appointment'
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
}
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

document.addEventListener('DOMContentLoaded', function () {
    const calendarDays = document.getElementById('calendarDays');
    const monthYear = document.getElementById('monthYear');


    let currentMonth = new Date().getMonth();
    let currentYear = new Date().getFullYear();



    function renderCalendar(month, year) {
        calendarDays.innerHTML = '';
        const firstDay = new Date(year, month, 1).getDay();
        const lastDate = new Date(year, month + 1, 0).getDate();

        monthYear.textContent = `${month + 1}/${year}`;

        // Add empty cells for days of the week before the first day
        for (let i = 0; i < firstDay; i++) {
            calendarDays.innerHTML += '<div></div>';
        }

        // Add days of the month
        for (let day = 1; day <= lastDate; day++) {
            const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
            const hasAppointment = appointments[dateStr];
            const dayElement = document.createElement('div');
            dayElement.textContent = day;


            calendarDays.appendChild(dayElement);
        }
    }

    function changeMonth(direction) {
        if (direction === 'prev') {
            if (currentMonth === 0) {
                currentMonth = 11;
                currentYear--;
            } else {
                currentMonth--;
            }
        } else if (direction === 'next') {
            if (currentMonth === 11) {
                currentMonth = 0;
                currentYear++;
            } else {
                currentMonth++;
            }
        }
        renderCalendar(currentMonth, currentYear);
    }

    document.getElementById('prevMonth').addEventListener('click', () => changeMonth('prev'));
    document.getElementById('nextMonth').addEventListener('click', () => changeMonth('next'));

    renderCalendar(currentMonth, currentYear);
});



const dashboardLink = document.getElementById('dashboard');
const appointmentsLink = document.getElementById('appointments');
const dashboardSection = document.querySelector('.default');
const appointmentsSection = document.querySelector('.appointments');
const reviewLink = document.getElementById('reviewLink');
const reviewSection = document.querySelector('.review');


dashboardLink.addEventListener('click', function (event) {
    event.preventDefault();
    dashboardSection.classList.add('active');
    dashboardSection.classList.remove('hide');

    appointmentsSection.classList.remove('active');
    appointmentsSection.classList.add('hide');
    reviewSection.classList.remove('active');
    reviewSection.classList.add('hide');
});

reviewLink.addEventListener('click', function (event) {
    event.preventDefault();
    reviewSection.classList.add('active');
    reviewSection.classList.remove('hide');

    dashboardSection.classList.remove('active');
    dashboardSection.classList.add('hide');
    appointmentsSection.classList.remove('active');
    appointmentsSection.classList.add('hide');
});

appointmentsLink.addEventListener('click', function (event) {
    event.preventDefault();
    appointmentsSection.classList.add('active');
    appointmentsSection.classList.remove('hide');

    dashboardSection.classList.remove('active');
    dashboardSection.classList.add('hide');
    reviewSection.classList.remove('active');
    reviewSection.classList.add('hide');
});
document.addEventListener('DOMContentLoaded', function () {
    const appointments = [
        { date: '2024-08-15', client: 'John Doe', status: 'confirmed' },
        { date: '2024-08-16', client: 'Jane Smith', status: 'pending' },
        { date: '2024-08-17', client: 'Alice Johnson', status: 'canceled' },
        // Add more appointments as needed
    ];

    const appointmentTableBody = document.querySelector('#appointmentTable tbody');
    const searchAppointments = document.getElementById('searchAppointments');
    const statusFilter = document.getElementById('statusFilter');


    function renderAppointments(filteredAppointments) {
        appointmentTableBody.innerHTML = '';
        filteredAppointments.forEach(appointment => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${appointment.date}</td>
                <td>${appointment.client}</td>
                <td>${appointment.status}</td>
                <td><button class="secondary">View</button></td>
            `;
            appointmentTableBody.appendChild(row);
        });
    }

    function filterAppointments() {
        const searchQuery = searchAppointments.value.toLowerCase();
        const statusQuery = statusFilter.value;

        const filteredAppointments = appointments.filter(appointment => {
            const matchesSearch = appointment.client.toLowerCase().includes(searchQuery);
            const matchesStatus = statusQuery === 'all' || appointment.status === statusQuery;
            return matchesSearch && matchesStatus;
        });

        renderAppointments(filteredAppointments);
    }

    searchAppointments.addEventListener('input', filterAppointments);
    statusFilter.addEventListener('change', filterAppointments);


    // Initial render
    renderAppointments(appointments);
});

function toggleResponseForm(button) {
    const responseForm = button.nextElementSibling;
    responseForm.classList.toggle('hide');
}

function applyTemplate(select) {
    const responseText = select.previousElementSibling;
    if (select.value) {
        responseText.value = select.value;
    }
}

function sendResponse(button) {
    const responseForm = button.parentElement;
    const responseText = responseForm.querySelector('.response-text').value;
    const responseType = responseForm.querySelector('input[name="response-type"]:checked').value;

    if (responseText.trim() === "") {
        alert("Please enter a response before sending.");
        return;
    }

    // Simulate sending the response
    alert(`Response sent as ${responseType}:\n${responseText}`);

    // Update the status indicator
    const responseStatus = responseForm.nextElementSibling;
    responseStatus.textContent = "Responded";
    responseStatus.style.color = "#4caf50";

    // Hide the response form after sending
    responseForm.classList.add('hide');
}

