<link rel="stylesheet" href="../../static/css/menu/appt.css">



<head>
<link rel="stylesheet" href="../../static/css/menu/appt.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div class="appointment-container">
    <div class="heading">
        <h3>Book an Appointment</h3>
        <button class="secondary" id="backbtn"><i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i></button>
    </div>
        <form id="appointmentForm" class="aptForm">
            <label for="service">Select Service:</label>
            <select id="service" name="service">
                <option value="manicure">Manicure</option>
                <option value="pedicure">Pedicure</option>
                <option value="haircut">Haircut</option>
                <option value="facial">Facial</option>
            </select>

            <label for="date">Select Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="time">Select Time:</label>
            <input type="time" id="time" name="time" required>

            <label for="notes">Additional Notes:</label>
            <textarea id="notes" name="notes" placeholder="Enter any specific requests here..."></textarea>

            <button type="submit" class="secondary">Book Appointment</button>
        </form>
    </div>

</body>
<script>
    const backBtn = document.getElementById('backbtn');
    backBtn.addEventListener('click', function () {
            window.history.back();
        });
</script>
</html>