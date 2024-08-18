<link rel="stylesheet" href="serenity\static\css\admin\dashboard.css">

<section class=" default active">
    <section class="dashboard ">

        <div class="user">

            <div class="userStat">
                <div class="userCount">
                    <i class="fa fa-user-plus fa-2x" aria-hidden="true"></i>
                    <h6>New Customers</h6>
                    <h1>20</h1>


                </div>
                <div class="userCount">
                    <i class="fa fa-user-plus fa-2x" aria-hidden="true"></i>
                    <h6>Product Sold</h6>
                    <h1>1.1K</h1>

                </div>
                <div class="userCount">
                    <i class="fa fa-money fa-2x" aria-hidden="true"></i>
                    <h6>Total Sales</h6>
                    <h1>Rs. 10.5k</h1>

                </div>
                <div class="userCount">
                    <i class="fa fa-certificate fa-2x" aria-hidden="true"></i>
                    <h6>Top Service</h6>
                    <h1>Haircut</h1>

                </div>
            </div>

            <div class="avg_appointments">
                <script src="https://cdn.jsdelivr.net/npm/chart.js"> </script>

                <canvas id="incomeChart"></canvas>
                <script>

                </script>

            </div>

        </div>
        <div class="customer-insights">
            <div class="insight-card">
                <canvas id="acquisitionPieChart"></canvas>
            </div>
            <div class="insight-card">
                <canvas id="demographicsLineChart"></canvas>
            </div>
            <script>

            </script>
        </div>


    </section>
    <div class="reviews">
        <table>
            <tr>
                <th>Customer Name</th>
                <th>Ratings</th>
                <th>Feedbacks</th>
            </tr>
            <tr>
                <td>Alfreds Futterkiste</td>
                <td>
                    <div>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </td>
                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
            </tr>
            <tr>
                <td>Centro comercial Moctezuma</td>
                <td>Francisco Chang</td>
                <td>Mexico</td>
            </tr>
        </table>
    </div>
</section>

<script>
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