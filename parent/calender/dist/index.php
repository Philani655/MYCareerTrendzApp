<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

    body {
    font-family: "Montserrat", sans-serif;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f4f4f4;
}

.container {
    border: 1px solid #fff;
    margin-top: 20px;
    background: #fff;
    border-radius: 6px;
}

h1 {
    font-family: "Montserrat", sans-serif;
    margin-left: 10px;
}

.menu-list {
    font-size: 15px;
    line-height: 20px;
}

.menu-list li{
    margin-top: 7px;
}

.calendar-container {
    margin-top: 50px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.month-calendar {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    padding: 15px;
    text-align: center;
}

.month-title {
    font-size: 1.2em;
    font-weight: bold;
    margin-bottom: 10px;
    color: #333;
}

.weekdays {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    font-weight: bold;
    margin-bottom: 5px;
    color: #666;
}

.days {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    text-align: center;
}

.day {
    padding: 5px;
    border: 1px solid #eee;
}

.day.today {
    background-color: #007bff;
    color: white;
    border-radius: 50%;
}

@media (max-width: 1024px) {
    .calendar-container {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 768px) {
    .calendar-container {
        grid-template-columns: 1fr;
    }

    footer{
        text-align: center;
    }
}

@media (max-width: 500px) {
    .calendar-container {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 100px) {
    .calendar-container {
        grid-template-columns: 1fr;
    }
}
</style>

<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="../../../image/Trendz-Logo.png">
        <title>School Calender</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        </head>
    <body>
        <!-- partial:index.partial.html -->
        <h1 style="text-align: center;"><img src="../../icons/calendar-1.png" width="30"> School Calender</h1>
        <div class="calendar-container" id="calendar-container">
        </div>

        <div class="container">
            <h1><img src="../../icons/holidays-1.png" width="28"> School Holidays</h1>
            <ul class="menu-list">
                <li><b>Term 1:</b> January 15th - March 28th</li>
                <li><b>Holidays:</b> March 29th - April 7th</li>
                <li><b>Term 2:</b> April 8th - June 27th</li>
                <li><b>Holidays:</b> June 28th - July 21st</li>
                <li><b>Term 3:</b> July 22nd - October 3rd</li>
                <li><b>Term 4:</b> October 13th - December 12th</li>
                <li><b>Summer Holiday:</b> December 12th - January 14th</li>
            </ul>
        </div>

        <?php
        $currentYear = date("Y");
        $nextYear = $currentYear + 1;
        $yearRange = $currentYear . '-' . $nextYear;
        ?>

        <footer class="main-footer" style="margin-top: 40px;">
            <center>
                <center>
                    <footer>
                        <img src="../../images/footer-Photoroom.png" alt="portfolio"> 
                    </footer>
                </center>
                <small>Copyright &copy; <?php echo $yearRange;?> <strong>MYCareerTrendz.</strong> All rights reserved.</small>               
            </center>
        </footer>

    </body>
</html>

<script>
    function generateCalendar(year) {
            const months = [
                'January', 'February', 'March', 'April', 'May', 'June', 
                'July', 'August', 'September', 'October', 'November', 'December'
            ];
            const weekdays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            const container = document.getElementById('calendar-container');

            months.forEach((month, index) => {
                const monthCalendar = document.createElement('div');
                monthCalendar.className = 'month-calendar';

                const monthTitle = document.createElement('div');
                monthTitle.className = 'month-title';
                monthTitle.textContent = `${month} ${year}`;
                monthCalendar.appendChild(monthTitle);

                const weekdaysElement = document.createElement('div');
                weekdaysElement.className = 'weekdays';
                weekdays.forEach(day => {
                    const dayEl = document.createElement('div');
                    dayEl.textContent = day;
                    weekdaysElement.appendChild(dayEl);
                });
                monthCalendar.appendChild(weekdaysElement);

                const daysElement = document.createElement('div');
                daysElement.className = 'days';

                const firstDay = new Date(year, index, 1);
                const lastDay = new Date(year, index + 1, 0);
                const startingDay = firstDay.getDay();
                const totalDays = lastDay.getDate();

                // Add empty cells for days before the first day
                for (let i = 0; i < startingDay; i++) {
                    const emptyDay = document.createElement('div');
                    emptyDay.className = 'day';
                    daysElement.appendChild(emptyDay);
                }

                // Add days of the month
                for (let day = 1; day <= totalDays; day++) {
                    const dayEl = document.createElement('div');
                    dayEl.className = 'day';
                    dayEl.textContent = day;

                    const currentDate = new Date(year, index, day);
                    const today = new Date();
                    if (currentDate.toDateString() === today.toDateString()) {
                        dayEl.classList.add('today');
                    }

                    daysElement.appendChild(dayEl);
                }

                monthCalendar.appendChild(daysElement);
                container.appendChild(monthCalendar);
            });
        }

        // Generate calendar for current year
        generateCalendar(new Date().getFullYear());
// generateCalendar(2025);
</script>