//Includes Js for appointment booking form


let doctorList = []; // Declare the doctorList variable globally

document.addEventListener("DOMContentLoaded", function () {
    fetchOrganizationTypes(); // Fetch organization types on page load
    fetchUserDetails();

    const orgTypeDropdown = document.getElementById("orgType");
    const orgDropdown = document.getElementById("organizationID");
    const doctorDropdown = document.getElementById("doctorDropdown");

    // Event listener for organization type change
    orgTypeDropdown.addEventListener("change", function () {
        const selectedOrgType = orgTypeDropdown.value;
        console.log("Selcted Org Tyep Value", selectedOrgType)
        if (selectedOrgType) {
            fetchOrganizationsByType(selectedOrgType); // Fetch organizations based on type
        }
    });

    // Event listener for organization change (to fetch doctors)
    orgDropdown.addEventListener("change", function () {
        const selectedOrganization = orgDropdown.value;
        if (selectedOrganization) {
            fetchDoctorsByOrganization(selectedOrganization); // Fetch doctors based on selected organization
        }
    });
});

// Fetch and populate organization types
function fetchOrganizationTypes() {
    fetch("/api/orgType") // Replace with your endpoint for organization types
        .then(response => response.json())
        .then(data => {
            const orgTypeDropdown = document.getElementById("orgType");

            data.forEach(orgType => {
                const option = document.createElement("option");
                option.value = orgType.typeId;
                option.textContent = orgType.type;
                orgTypeDropdown.appendChild(option);
            });
        })
        .catch(error => {
            console.error("Error fetching organization types:", error);
        });
}

// Fetch and populate organizations by type
function fetchOrganizationsByType(orgType) {
    fetch(`/api/organizations/byType/${orgType}`) // Use appropriate endpoint
        .then(response => response.json())
        .then(data => {
            const orgDropdown = document.getElementById("organizationID");
            orgDropdown.innerHTML = '<option value="" disabled selected>Select organization</option>'; // Clear existing options

            data.forEach(organization => {
                const option = document.createElement("option");
                option.value = organization.organizationId;
                option.textContent = organization.name;
                orgDropdown.appendChild(option);
            });
        })
        .catch(error => {
            console.error("Error fetching organizations:", error);
        });
}

// Fetch and populate doctors by organization
function fetchDoctorsByOrganization(organizationId) {
    fetch(`/api/doctor/byOrganization/${organizationId}`) // Endpoint to fetch doctors
        .then(response => response.json())
        .then(doctorsList => {
        doctorList=doctorsList;
            const doctorDropdown = document.getElementById("doctorDropdown");
            doctorDropdown.innerHTML = '<option value="" disabled selected>Select a doctor</option>'; // Clear existing options

            // Populate doctors dropdown
            doctorsList.forEach(doctor => {
                if (doctor.display) { // Assuming 'display' indicates if doctor should be shown
                    const option = document.createElement("option");
                    option.value = doctor.doctorId;
                    option.textContent = `${doctor.firstName} ${doctor.lastName}`;
                    doctorDropdown.appendChild(option);
                }
            });

            // Optional: If you want to update available times once a doctor is populated
            updateAvailableTimes();
        })
        .catch(error => {
            console.error("Error fetching doctors:", error);
        });
}

        function convertTo12HourFormat(hour, minute) {
            const period = hour >= 12 ? 'PM' : 'AM';
            hour=hour%12;
            hour=hour?hour:12;

            return `${hour}:${minute} ${period}`;
        }
        function convertTo24HourFormat(time12) {
        const [time, modifier] = time12.split(' '); // Split the time and AM/PM
        let [hours, minutes] = time.split(':'); // Split hours and minutes

        if (modifier === 'PM' && hours !== '12') {
            hours = String(Number(hours) + 12); // Convert PM hours to 24-hour format
        }
        if (modifier === 'AM' && hours === '12') {
            hours = '00'; // Convert 12 AM to 00 hours
        }

        return `${hours}:${minutes}`;
    }

        function updateAvailableTimes() {
            const dropdown = document.getElementById('doctorDropdown');
            const selectedDoctor = doctorList.find(doctor => doctor.doctorId === dropdown.value); // Use the global doctorList
            const appTimeSelect = document.getElementById('appTime');

            // Clear the time dropdown
            appTimeSelect.innerHTML = '<option value="" disabled selected>Select a time</option>';

            console.log("Selected Doctor",selectedDoctor);
            if (selectedDoctor) {
                // Get the doctor's start and end time
                const startTime = selectedDoctor.start_time.split(':').map(Number);
                const endTime = selectedDoctor.end_time.split(':').map(Number);
                const avgTime = selectedDoctor.avg_time; // Average time in minutes
                const availableTimes = [];

                // Generate available time slots based on average duration
                for (let hour = startTime[0]; hour <= endTime[0]; hour++) {
                    for (let min = (hour === startTime[0] ? startTime[1] : 0); min < 60; min += avgTime) {
                        if (hour === endTime[0] && min >= endTime[1]) break;

                        // Add leading zero to minutes for proper formatting
                        const formattedMin = String(min).padStart(2, '0');
                        const formattedTime = `${hour}:${formattedMin}:00`; // Keep in 24-hour format or convert as needed
                        availableTimes.push(formattedTime);


                    }
                }


                // Populate the time dropdown with available times
                availableTimes.forEach(time => {
                    const option = document.createElement('option');
                    option.value = time;
                    option.textContent = convertTo12HourFormat(...time.split(':').map(Number)); // Convert to 12-hour format for display
                    appTimeSelect.appendChild(option);
                });
            }
        }

            function updateAvailableDates() {
                const appDateInput = document.getElementById('appDate');
                const selectedDate = new Date(appDateInput.value);
                const day = selectedDate.getUTCDay(); // 0 = Sunday, 1 = Monday, ..., 6 = Saturday

                // Check if the selected date is a Saturday
                if (day === 6) { // 6 represents Saturday
                    appDateInput.value = ""; // Clear the date input
                }
            }

            function disableSaturdays() {
                const today = new Date();
                const dateInput = document.getElementById('appDate');
                const maxDate = new Date();
                maxDate.setFullYear(today.getFullYear() + 1); // Disable dates beyond one year from today

                // Set the min date to today
                dateInput.min = today.toISOString().split("T")[0];
                dateInput.max = maxDate.toISOString().split("T")[0];

                // Disable Saturdays
                const disableSaturdays = (date) => {
                    const day = date.getUTCDay();
                    return day === 6; // Saturday
                };

                // Initialize datepicker with disabled Saturdays
                const todayDate = new Date();
                for (let i = 0; i < 365; i++) {
                    const futureDate = new Date(todayDate);
                    futureDate.setDate(todayDate.getDate() + i);
                    if (disableSaturdays(futureDate)) {
                        // Set the date to a disabled state
                        const dateStr = futureDate.toISOString().split("T")[0];
                        // Mark it disabled, but since HTML5 date inputs don't allow custom disabling, just avoid selecting it
                        if (dateInput.value === dateStr) {
                            dateInput.value = "";
                        }
                    }
                }
            }
            function setDoctorID() {
            const dropdown = document.getElementById('doctorDropdown');
            const doctorIDInput = document.getElementById('doctorID');
            doctorIDInput.value = dropdown.value; // Set the hidden input value to the selected doctor's ID
    }

    function fetchUserDetails() {
        fetch("/api/user/details", {
            method: "GET",
            headers: {
                "Content-Type": "application/json"
            }
        })
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error("Failed to fetch user details");
            }
        })
        .then(user => {
            document.getElementById("firstName").value = user.firstName || "";
            document.getElementById("middleName").value = user.middleName || "";
            document.getElementById("lastName").value = user.lastName || "";
            document.getElementById("email").value = user.email || "";
            document.getElementById("mobileNumber").value = user.mobileNumber || "";
        })
        .catch(error => {
            console.error("Error fetching user details:", error);
        });
    }



                // Call the function to populate the dropdown when the page loads
                window.onload = populateDropdown;


