//Includes JS for rendering Calendar, fetching and display appointment History, Cancel Appointments


//appointment fetching for patients
function loadAppointmentHistory() {
    fetch('api/appointment/getAppointmentHistory')  // Replace with actual API endpoint for fetching history
        .then(response => response.json())
        .then(data => {
            const appointmentList = document.querySelector('.appointment-list');
            appointmentList.innerHTML = ''; // Clear existing content

            // Check if there are any appointments
            if (data.length === 0) {
                appointmentList.innerHTML = '<p>No appointments found.</p>';
                return;
            }
            const currentDate=new Date();


            // Loop through the data and create appointment elements
            data.forEach(appointment => {
                const appDate = new Date(appointment.appDate).toLocaleDateString();
                const appTime = appointment.appTime;
                const row = document.createElement('tr');

                const isFutureAppointment=appDate> currentDate;

                // Add HTML content for each appointment's details
                row.innerHTML = `
                    <td>${appointment.doctor.firstName} &nbsp ${appointment.doctor.lastName}</td>
                    <td>${appDate}</td>
                    <td>${appTime}</td>
                    <td>${appointment.concern}</td>
                    <td>${appointment.status}</td>
                    <td>${appointment.status === 'confirmed'&& isFutureAppointment? `<button class='cancel-button' onclick="showCancelModal('${appointment.appointmentID}')">Cancel</button>`
        : 'None'
    }</td>
                `;
                appointmentList.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching appointment history:', error));
}
//displays screen for entering cancellation reason
    function showCancelModal(appointmentId) {
        appointmentToCancel = appointmentId;
        document.getElementById("cancelModal").style.display = "flex";
    }
    //closes cancelation screen

//fetching api for cancellation
     function cancelAppointment(appointmentId,cancellationReason) {

    if (!cancellationReason) {
        alert('Please provide a reason for cancellation.');
        return;
    }

    fetch(`/api/appointment/cancel/${appointmentId}`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            appointmentId: appointmentToCancel,
            cancellationReason: cancellationReason
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Appointment canceled successfully.');
            loadAppointmentHistory();
             alert("Appointment canceled sucessfully");// Reload the appointment history to reflect the cancellation
            closeModal();  // Close the modal
        } else {
            alert('Failed to cancel the appointment. Please try again.');
        }

    })
    .catch(error => console.error('Error canceling appointment:', error));
}
document.getElementById('confirmCancelButton').addEventListener('click', async()=> {
    const reason=document.getElementById("cancellationReason").value.trim();
    if (!reason) {
            alert("Please enter a reason for cancellation.");
            return;
        }
  await cancelAppointment(appointmentToCancel, reason);
  closeModal();// Call the correct function
});



    // Handle the back button in the cancel modal
    document.getElementById('backButton').addEventListener('click', function() {
        document.getElementById('cancelModal').style.display = 'none';
    });

    // Function to close the modal when the close button is clicked
    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('cancelModal').style.display = 'none';
    });

//setting appointments section as default section
            document.querySelector('a[href="#appointments"]').addEventListener('click', loadAppointmentHistory);