<link rel="stylesheet" href="../../static/css/admin/appointment.css">

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
        <script>
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
        </script>