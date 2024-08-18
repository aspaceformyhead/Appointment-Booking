<link rel="stylesheet" href="serenity\static\css\admin\appointment.css">

<section class="appointments hide">


            <div class="calendar">

                <div class="header">
                    <button id="prevMonth" class="secondary">Prev</button>
                    <span id="monthYear"></span>
                    <button id="nextMonth" class="secondary">Next</button>
                </div>
                <div class="days-of-week">
                    <div>Sun</div>
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div>Sat</div>
                </div>
                <div class="days" id="calendarDays"></div>
            </div>

            <div id="appointmentDetails" class="appointment-details">
                <h3>Appointment Details</h3>
                <div>
                    <input type="text" id="searchAppointments" placeholder="Search by client name...">
                    <select id="statusFilter">
                        <option value="all">All</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="pending">Pending</option>
                        <option value="canceled">Canceled</option>
                    </select>
                </div>
                <table id="appointmentTable">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Client</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Rows will be populated by JavaScript -->
                    </tbody>
                </table>

        </section>