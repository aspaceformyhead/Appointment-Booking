<link rel="stylesheet" href="serenity/static/css/appt.css">



<head>

    <link rel="stylesheet" href="forms.css">
</head>

<body>
    <div class="appointment-container">
        <h3>Book an Appointment</h3>
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

    <script src="script.js"></script>
</body>

</html>