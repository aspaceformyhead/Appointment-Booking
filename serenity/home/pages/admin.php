
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
        document.addEventListener('DOMContentLoaded', function () {
    const sections = {
        dashboard: document.querySelector('.default'),
        appointments: document.querySelector('.appointments'),
        review: document.querySelector('.review'),
        inventory: document.querySelector('.inventory'),
        settings: document.querySelector('.account')
    };

    const links = {
        dashboard: document.getElementById('dashboard'),
        appointments: document.getElementById('appointments'),
        review: document.getElementById('reviewLink'),
        inventory: document.getElementById('store'),
        settings: document.getElementById('settings')
    };

    function showSection(sectionName) {
        // Hide all sections and remove active state from all links
        Object.values(sections).forEach(section => {
            section.classList.remove('show');
            section.classList.add('hide');
        });

        Object.values(links).forEach(link => {
            link.classList.remove('clicked');
        });

        // Show the selected section and set the active link
        if (sections[sectionName]) {
            sections[sectionName].classList.add('show');
            sections[sectionName].classList.remove('hide');
        }

        if (links[sectionName]) {
            links[sectionName].classList.add('clicked');
        }
    }

    // Set up event listeners for navigation links
    Object.keys(links).forEach(key => {
        links[key].addEventListener('click', function (event) {
            event.preventDefault();
            showSection(key);
        });
    });

    // Determine the section to show based on URL parameters or default to 'dashboard'
    const urlParams = new URLSearchParams(window.location.search);
    console.log(urlParams.get('section'));
    const sectionToShow = urlParams.get('section') || 'dashboard';
    showSection(sectionToShow);
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