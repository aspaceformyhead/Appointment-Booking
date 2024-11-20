function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("collapsed");}


        // JavaScript to handle navigation and content display
        const menuItems = document.querySelectorAll('.sidebar a ');
        const contentSections = document.querySelectorAll('.content > div');

        menuItems.forEach(item => {
            item.addEventListener('click', function(event) {
                event.preventDefault();
                // Remove active class from all menu items and hide all content sections
                menuItems.forEach(i => i.classList.remove('active'));
                contentSections.forEach(section => section.style.display = 'none');

                // Set clicked menu item to active and display corresponding content section
                item.classList.add('active');
                const sectionId = item.getAttribute('href').substring(1);
                document.getElementById(sectionId).style.display = 'flex';
                document.getElementById(sectionId).style.flexDirection = 'column';

            });
        });
        document.getElementById("bookAppointments").style.display = "block";
    


        function toggleProfileSection() {
    const navItems = document.querySelectorAll('.nav-label');
    const profileSections = document.querySelectorAll('#profile > section');

    navItems.forEach(item => {
        item.addEventListener('click', function(event) {
            event.preventDefault();
            // Remove 'active' class from all nav items and hide all profile sections
            navItems.forEach(i => i.classList.remove('active'));
            profileSections.forEach(section => section.style.display = 'none');

            // Set the clicked nav item to 'active' and display the corresponding section
            item.classList.add('active');
            const sectionId = item.getAttribute('href').substring(1);
            const targetSection = document.getElementById(sectionId);
            if (targetSection) {
                targetSection.style.display = 'flex';
                targetSection.style.flexDirection = 'column';
            }
        });
    });

    // Display default section on load
    document.getElementById("editProfile").style.display = "flex";
    document.getElementById("editProfile").style.flexDirection = "column";

}
toggleProfileSection();

// Logout functionality
const logoutLink = document.getElementById("logoutLink");
if (logoutLink) {
    logoutLink.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default behavior
        // Perform the logout request
        fetch('api/user/logout', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
        })
        .then(response => {
            if (response.ok) {
                alert('Logout Successful');
                window.location.href = '/login'; // Redirect to the login page
            } else {
                alert('Logout failed. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error during logout:', error);
            alert('Logout failed. Please try again.');
        });
    });
}