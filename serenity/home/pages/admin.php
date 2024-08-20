
<?php require_once __DIR__ . '/../../app/controller.php';
    $controller = new Controller();
    ?>
<html>
    <head>
<link rel="stylesheet" href="../../static/css/admin/admin.css">

    </head>

<body class="admin">
    <?php $controller->menu() ?>
    <main>
        <header>
        <?php $controller->nav();?>
        </header>
        <?php
        $controller->dashboard();
        $controller->reviews();
        $controller->adAppointment();
        $controller->inventory();
        $controller->settings();
        ?>

    </main>
    
    <script>
        const dashboardLink = document.getElementById('dashboard');
const dashboardSection = document.querySelector('.default');

const appointmentsLink = document.getElementById('appointments');
const appointmentsSection = document.querySelector('.appointments');

const reviewLink = document.getElementById('reviewLink');
const reviewSection = document.querySelector('.review');

const inventoryLink = document.getElementById('store');
const inventorySection = document.querySelector('.inventory');

const settingLink = document.getElementById('settings');
const settingSection = document.querySelector('.account');

const links = [dashboardLink, appointmentsLink, reviewLink, inventoryLink, settingLink];


function showSection(sectionToShow) {
    [dashboardSection, appointmentsSection, reviewSection, inventorySection, settingSection].forEach(section => {
        if (section === sectionToShow) {
            section.classList.add('active');
            section.classList.remove('hide');
        } else {
            section.classList.remove('active');
            section.classList.add('hide');
        }
    });
}
function setActiveLink(clickedLink) {
    links.forEach(link => {
        if (link === clickedLink) {
            link.classList.add('clicked');
        } else {
            link.classList.remove('clicked');
        }
    });
}

dashboardLink.addEventListener('click', function (event) {
    event.preventDefault();
    showSection(dashboardSection);
    setActiveLink(dashboardLink);

});

reviewLink.addEventListener('click', function (event) {
    event.preventDefault();
    showSection(reviewSection);
    setActiveLink(reviewLink);
});

appointmentsLink.addEventListener('click', function (event) {
    event.preventDefault();
    showSection(appointmentsSection);
    setActiveLink(appointmentsLink);
});

inventoryLink.addEventListener('click', function (event) {
    event.preventDefault();
    showSection(inventorySection);
    setActiveLink(inventoryLink);
});

settingLink.addEventListener('click', function (event) {
    event.preventDefault();
    showSection(settingSection);
    setActiveLink(settingLink);
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
    </script>


</html>