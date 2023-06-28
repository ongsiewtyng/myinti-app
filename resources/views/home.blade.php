@extends('layouts.main')

@section('content')
<body>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <!-- slide images start -->
            <div class="swiper-slide">
                <div class="container text-center">
                    <div class="card">
                        <div class="circle"></div>
                        <div class="card-body">
                        <a href="/service2">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2 style="color: #000000;" class="order">ORDER</h2>
                                    <h2 style="color: #000000;" class="now">NOW</h2>
                                    <p style="color: #000000;" class="text2">Hate queuing?! Order food directly from campus dining options, all in one place.</p>
                                </div>
                                <div class="col-md-6 text-right">
                                    <img src="{{ asset('image/icons/noodles.png') }}" class="noodle" alt="Banner Image 1">
                                    <img src="{{ asset('image/icons/queue.png') }}" class="queue" alt="Banner Image 2">
                                </div></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="container text-center">
                    <div class="card">
                        <div class="circle2"></div>
                        <div class="card-body">
                        <a href="/service1">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2 style="color: #000000;" class="need">NEED</h2>
                                    <h2 style="color: #000000;" class="approval">APPROVAL?</h2>
                                    <p style="color: #000000;" class="text3">Got a new event? Need stamp approval from INTIMA quick and smooth process. Submit your documents through our service.</p>
                                </div>
                                <div class="col-md-6 text-right">
                                    <img src="{{ asset('image/icons/folder.png') }}" class="folder" alt="Banner Image 1">
                                    <img src="{{ asset('image/icons/check.png') }}" class="check" alt="Banner Image 2">
                                </div></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="container text-center">
                    <div class="card">
                        <div class="circle3"></div>
                        <div class="card-body">
                        <a href="/service3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2 style="color: #000000;" class="free">FREE</h2>
                                    <h2 style="color: #000000;" class="time">TIME?</h2>
                                    <p style="color: #000000;" class="text4">Taking a break from class? Want to use the pool table but it being occupied? Use our service to book and pay for the facility before anyone.</p>
                                </div>
                                <div class="col-md-6 text-right">
                                    <img src="{{ asset('image/icons/basketball.png') }}" class="games" alt="Banner Image 1">
                                    <img src="{{ asset('image/icons/dice.png') }}" class="dice" alt="Banner Image 2">
                                </div></a>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <!-- Add pagination bullets -->
        <div class="swiper-pagination" style="position:inherit"></div>
            

        <!-- Initialize Swiper -->
        <script>
        var swiper = new Swiper('.swiper-container', {
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
        
            },
            autoplay: {
                delay: 4500,
            },
            loop: true,
        });

        </script>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="whats-new">
                <h2>What's New</h2>
                <table class="table events">
                    <tbody>
                        @foreach ($approvedEvents->sortByDesc(function ($event) {
                            return date('Y', strtotime($event->start_date));
                        }) as $event)
                            <tr>
                                <div class="col-lg-6">
                                    <div class="event-item">
                                        <div class="event-header">
                                            <!-- <div class="rounded-image">
                                                <img src="{{ $event->image }}" alt="Event Image">
                                            </div> -->
                                            <div class="event-details">
                                                <h3 class="card-title">{{ $event->event_title }}</h3>
                                                <p class="club-name"><em>{{ $event->club_name }}</em></p>
                                                <p class="date-time">
                                                    {{ date('j F Y', strtotime($event->start_date)) }} - {{ date('j F Y', strtotime($event->end_date)) }}
                                                    | {{ date('g:i A', strtotime($event->start_time)) }} - {{ date('g:i A', strtotime($event->end_time)) }}
                                                </p>
                                            </div>
                                            <div class="dropdown">
                                                <ion-icon class="chevron-icon" name="chevron-forward-outline"></ion-icon>
                                                <div class="dropdown-content" style="display: none;">
                                                    <p class="contact-info">Contact Information:</p>
                                                    <div class="social-media-links">
                                                        <a href="{{ $event->contact->email }}" target="_blank"><ion-icon name="mail-outline"></ion-icon></a>
                                                        <a href="{{ $event->contact->fb_link }}" target="_blank"><ion-icon name="logo-facebook"></ion-icon></a>
                                                        <a href="{{ $event->contact->ig_link }}" target="_blank"><ion-icon name="logo-instagram"></ion-icon></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination">
                    <a href="#" class="arrow-left" id="prevButton"><ion-icon name="caret-back-outline"></ion-icon></a>
                    <a href="#" class="arrow-right" id="nextButton"><ion-icon name="caret-forward-outline"></ion-icon></a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <body class="light">

            <div class="calendar">
                <div class="calendar-header">
                    <span class="month-picker" id="month-picker">February</span>
                    <div class="year-picker" id="year-picker">
                        <span class="year-change" id="prev-year">
                            <pre><</pre>
                        </span>
                        <span id="year">2021</span>
                        <span class="year-change" id="next-year">
                            <pre>></pre>
                        </span>
                    </div>
                </div>
                <div class="calendar-body">
                    <div class="calendar-week-day">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div class="calendar-days"></div>
                </div>
                <div class="month-list"></div>
                <div class="year-list"></div>
            </div>
            </body>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/ionicons@5.5.3/dist/ionicons/ionicons.min.js"></script>
    <script>        
        $(document).ready(function() {
            $('.dropdown').on('click', function() {
                var dropdownContent = $(this).find('.dropdown-content');
                var chevronIcon = $(this).find('.chevron-icon');

                dropdownContent.slideToggle();
                chevronIcon.toggleClass('open');

                if (chevronIcon.hasClass('open')) {
                    chevronIcon.attr('name', 'chevron-down-outline');
                } else {
                    chevronIcon.attr('name', 'chevron-forward-outline');
                }
            });
        });

        let calendar = document.querySelector('.calendar')

        const month_names = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']

        isLeapYear = (year) => {
            return (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) || (year % 100 === 0 && year % 400 ===0)
        }

        getFebDays = (year) => {
            return isLeapYear(year) ? 29 : 28
        }

        generateCalendar = (month, year) => {

            let calendar_days = calendar.querySelector('.calendar-days')
            let calendar_header_year = calendar.querySelector('#year')

            let days_of_month = [31, getFebDays(year), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]

            calendar_days.innerHTML = ''

            let currDate = new Date()
            if (!month) month = currDate.getMonth()
            if (!year) year = currDate.getFullYear()

            let curr_month = `${month_names[month]}`
            month_picker.innerHTML = curr_month
            calendar_header_year.innerHTML = year

            // get first day of month
            
            let first_day = new Date(year, month, 1)

            for (let i = 0; i <= days_of_month[month] + first_day.getDay() - 1; i++) {
                let day = document.createElement('div')
                if (i >= first_day.getDay()) {
                    day.classList.add('calendar-day-hover')
                    day.innerHTML = i - first_day.getDay() + 1
                    day.innerHTML += `<span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>`
                    if (i - first_day.getDay() + 1 === currDate.getDate() && year === currDate.getFullYear() && month === currDate.getMonth()) {
                        day.classList.add('curr-date')
                    }
                }

                day.addEventListener('click', () => {
                    const eventItems = document.querySelectorAll('.event-item-container');
                    const selectedDate = i - first_day.getDay() + 1;

                    eventItems.forEach((item) => {
                        const eventDate = parseInt(item.querySelector('.date-time').textContent, 10).split(' ')[0];
                        const title = item.querySelector('.title');

                        if (parseInt(eventDate, 10) === selectedDate) {
                            item.classList.toggle('expanded');
                            title.classList.toggle('expanded');
                        } else {
                            item.classList.remove('expanded');
                            title.classList.remove('expanded');
                        }
                    });
                });

                calendar_days.appendChild(day)
            }
        }

        let month_list = calendar.querySelector('.month-list')
        let year_list = calendar.querySelector('.year-list');

        month_names.forEach((e, index) => {
            let month = document.createElement('div')
            month.innerHTML = `<div data-month="${index}">${e}</div>`
            month.querySelector('div').onclick = () => {
                month_list.classList.remove('show')
                curr_month.value = index
                generateCalendar(index, curr_year.value)
            }
            month_list.appendChild(month)
        })

        let month_picker = calendar.querySelector('#month-picker')

        month_picker.onclick = () => {
            month_list.classList.add('show')
        }

        let currDate = new Date()

        let curr_month = {value: currDate.getMonth()}
        let curr_year = {value: currDate.getFullYear()}

        generateCalendar(curr_month.value, curr_year.value)

        document.querySelector('#prev-year').onclick = (event) => {
            if (!year_list.classList.contains('show')) {
                --curr_year.value;
                generateCalendar(curr_month.value, curr_year.value);
            }
        };

        document.querySelector('#next-year').onclick = (event) => {
            if (!year_list.classList.contains('show')) {
                ++curr_year.value;
                generateCalendar(curr_month.value, curr_year.value);
            }
        };

        let year_picker = calendar.querySelector('#year-picker');

        year_picker.onclick = (event) => {
            if (!event.target.closest('.year-change')) {
                year_list.classList.toggle('show');
            }
        };

        for (let i = currDate.getFullYear() - 10; i <= currDate.getFullYear() + 10; i++) {
            let year = document.createElement('div');
            year.innerHTML = `<div data-year="${i}">${i}</div>`;
            year.querySelector('div').onclick = () => {
                year_list.classList.remove('show');
                curr_year.value = i;
                generateCalendar(curr_month.value, curr_year.value);
            };
            year_list.appendChild(year);
        }

        
        $(document).ready(function() {
            var currentPage = 0; // Initialize the current page index

            // Set the number of items per page
            var itemsPerPage = 5; // Adjust this value according to your needs

            // Get the total number of events
            var totalEvents = {{ $approvedEvents->count() }};

            // Calculate the total number of pages based on the number of items and itemsPerPage
            var totalPages = Math.ceil(totalEvents / itemsPerPage);

            // Function to update the page content
            function updatePageContent() {
                // Hide all event items
                $('.event-item').hide();

                // Calculate the range of events to show based on the currentPage and itemsPerPage
                var startIndex = currentPage * itemsPerPage;
                var endIndex = (currentPage + 1) * itemsPerPage;

                // Show the events within the range
                $('.event-item').slice(startIndex, endIndex).show();
            }

            // Function to handle the click event on the previous button
            $('#prevButton').click(function(e) {
                e.preventDefault();
                if (currentPage > 0) {
                    currentPage--; // Decrease the current page index
                    updatePageContent(); // Update the page content
                }
            });

            // Function to handle the click event on the next button
            $('#nextButton').click(function(e) {
                e.preventDefault();
                if (currentPage < totalPages - 1) {
                    currentPage++; // Increase the current page index
                    updatePageContent(); // Update the page content
                } else if (currentPage === totalPages - 1) {
                    currentPage++; // Increase the current page index
                    updatePageContent(); // Update the page content

                }
            });

            // Initial update of the page content
            updatePageContent();
        });
</script>


</body>
@endsection

@section('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Unbounded&display=swap');

    .swiper-container {
        width: 100%;
        height: auto;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card-body{
        width: 1403px;
        height: 383px;
    }
    .card{
        position: relative;
        clip-path: inset(0);
    }
    .circle {
        width: 491px;
        height: 491px;
        background-color: #BEFFA0;
        border-radius: 50%;
        position: absolute;
        left: 910px;
        top: -190px;
        z-index: 1;
        }

    .circle2{
        width: 491px;
        height: 491px;
        background-color: #FFE870;
        border-radius: 50%;
        position: absolute;
        left: 910px;
        top: -190px;
        z-index: 1;
    }

    .circle3{
        width: 491px;
        height: 491px;
        background-color: #C2E2FF;
        border-radius: 50%;
        position: absolute;
        left: 910px;
        top: -190px;
        z-index: 1;
    }

    .order {
        position: absolute;
        width: 203px;
        height: 60px;
        left: 243px;
        top: 123px;

        font-family: 'Unbounded','sans-serif';
        font-weight: 400;
        font-size: 48px;
        line-height: 60px;
        /* identical to box height */
        display: flex;
        align-items: center;
    }

    .now {
        position: absolute;
        width: 180px;
        height: 60px;
        left: 345px;
        top: 193px;

        font-family: 'Unbounded','sans-serif';
        font-style: normal;
        font-weight: 400;
        font-size: 48px;
        line-height: 60px;
        /* identical to box height */

        display: flex;
        align-items: center;
        
    }
    .text2{
        font-size: 20px;
        margin-top: 50px;
        font-family: 'Anuphan', sans-serif;
        white-space: nowrap;
        position: absolute;
        width: 705px;
        height: 93px;
        left: 60px;
        top: 200px;
        line-height: 31px;
        display: flex;
        align-items: center;
    }

    .text3{
        position: absolute;
        width: 705px;
        height: 62px;
        left: 82px;
        top: 260px;

        font-family: 'Anuphan', sans-serif;
        font-size: 20px;
        line-height: 31px;
        display: flex;
        align-items: center;
    }

    .text4{
        position: absolute;
        width: 705px;
        height: 62px;
        left: 82px;
        top: 280px;

        font-family: 'Anuphan', sans-serif;
        font-size: 20px;
        line-height: 31px;
        display: flex;
        align-items: center;
    }

    .noodle {
        position:relative;
        width: 350px;
        height:350px;
        margin-top: -10px;
        left:600px;
        z-index: 2;
    }

    .queue{
        position: absolute;
        width: 300px;
        height: 300px;
        left: 5px;
        top: 35px;
    }

    .need{
        position: absolute;
        width: 162px;
        height: 50px;
        left: 243px;
        top: 110px;

        font-family: 'Unbounded','sans-serif';
        font-weight: 400;
        font-size: 48px;
        line-height: 60px;
        /* identical to box height */

        display: flex;
        align-items: center;
    }

    .approval{
        position: absolute;
        width: 343px;
        height: 50px;
        left: 318px;
        top: 183px;

        font-family: 'Unbounded','sans-serif';
        font-weight: 400;
        font-size: 48px;
        line-height: 60px;
        /* identical to box height */

        display: flex;
        align-items: center;
    }

    .folder{
        position: absolute;
        width: 350px;
        height: 350px;
        margin-top: -10px;
        right:100px;
        z-index: 2;

    }

    .check{
        position: absolute;
        width: 225px;
        height: 204px;
        left: 34px;
        top: 61px;
    }

    .free{
        position: absolute;
        width: 148px;
        height: 60px;
        left: 300px;
        top: 106px;

        font-family: 'Unbounded','sans-serif';
        font-weight: 400;
        font-size: 48px;
        line-height: 60px;
        /* identical to box height */
        display: flex;
        align-items: center;
    }

    .time{
        position: absolute;
        width: 177px;
        height: 60px;
        left: 400px;
        top: 178px;

        font-family: 'Unbounded','sans-serif';
        font-weight: 400;
        font-size: 48px;
        line-height: 60px;
        /* identical to box height */
        display: flex;
        align-items: center;
    }

    .games{
        position: absolute;
        width: 582px;
        height: 328px;
        left: 750px;
        top: 34px;
        z-index: 2;

    }

    .dice{
        position: absolute;
        width: 256px;
        height: 256px;
        left: 25px;
        top: 40.37px;
        transform: rotate(-19.48deg);
    }

    .year-change pre {
        margin: 0;
    }

    /* Add any additional CSS styles as needed */


    /* @media only screen and (max-width: 400px) {
        .card-body {
            width: auto;
            height: auto;
        }

        .circle,
        .circle2,
        .circle3 {
            width: 150px;
            height: 150px;
            left: 88%;
            top: -30px;
            transform: translateX(-50%);
        }

        .order,
        .now,
        .need,
        .approval,
        .free,
        .time {
            font-size: 24px;
            line-height: 30px;
            left: 110px;
            top: 70px;
        }

        .now{
            width: 180px;
            height: 60px;
            left: 136px;
            top: 100px;
        }

        .text2,
        .text3,
        .text4 {
            font-size: 16px;
            line-height: 20px;
            width: 100%;
            left: 0;
            top: 100px;
            text-align: center;
        }

        .noodle,
        .folder,
        .games {
            width: 120px;
            height: 120px;
            left: 45%;
            top: 64%;
            margin-top: 75px;
            transform: translate(-50%, -50%);
        }

        .queue {
            width: 150px;
            height: 150px;
            left: 15%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .check {
            width: 100px;
            height: 90px;
            left: 17px;
            top: 30px;
        }

        .dice {
            width: 100px;
            height: 100px;
            left: 12.5px;
            top: 20.19px;
        }
    } */
    
    :root {
    --dark-body: #4d4c5a;
    --dark-main: #141529;
    --dark-second: #79788c;
    --dark-hover: #323048;
    --dark-text: #f8fbff;

    --light-body: #f3f8fe;
    --light-main: #fdfdfd;
    --light-second: #c3c2c8;
    --light-hover: #edf0f5;
    --light-text: #151426;

    --blue: #0000ff;
    --white: #fff;

    --shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;

    --font-family: cursive;
    }


    .light {
    --bg-body: var(--light-body);
    --bg-main: var(--light-main);
    --bg-second: var(--light-second);
    --color-hover: var(--light-hover);
    --color-txt: var(--light-text);
    }

    * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    }

    .calendar {
    height: max-content;
    width: max-content;
    background-color: var(--bg-main);
    border-radius: 30px;
    padding: 20px;
    position: relative;
    overflow: hidden;
    }

    .light .calendar {
    box-shadow: var(--shadow);
    }

    .calendar-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 25px;
    font-weight: 600;
    color: var(--color-txt);
    padding: 10px;
    }

    .calendar-body {
    padding: 10px;
    }

    .calendar-week-day {
    height: 50px;
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    font-weight: 600;
    }

    .calendar-week-day div {
    display: grid;
    place-items: center;
    color: var(--bg-second);
    }

    .calendar-days {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 2px;
    color: var(--color-txt);
    }

    .calendar-days div {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 5px;
    position: relative;
    cursor: pointer;
    animation: to-top 1s forwards;
    }

    .calendar-days div span {
    position: absolute;
    }

    .calendar-days div:hover span {
    transition: width 0.2s ease-in-out, height 0.2s ease-in-out;
    }

    .calendar-days div span:nth-child(1),
    .calendar-days div span:nth-child(3) {
    width: 2px;
    height: 0;
    background-color: var(--color-txt);
    }

    .calendar-days div:hover span:nth-child(1),
    .calendar-days div:hover span:nth-child(3) {
    height: 100%;
    }

    .calendar-days div span:nth-child(1) {
    bottom: 0;
    left: 0;
    }

    .calendar-days div span:nth-child(3) {
    top: 0;
    right: 0;
    }

    .calendar-days div span:nth-child(2),
    .calendar-days div span:nth-child(4) {
    width: 0;
    height: 2px;
    background-color: var(--color-txt);
    }

    .calendar-days div:hover span:nth-child(2),
    .calendar-days div:hover span:nth-child(4) {
    width: 100%;
    }

    .calendar-days div span:nth-child(2) {
    top: 0;
    left: 0;
    }

    .calendar-days div span:nth-child(4) {
    bottom: 0;
    right: 0;
    }

    .calendar-days div:hover span:nth-child(2) {
    transition-delay: 0.2s;
    }

    .calendar-days div:hover span:nth-child(3) {
    transition-delay: 0.4s;
    }

    .calendar-days div:hover span:nth-child(4) {
    transition-delay: 0.6s;
    }

    .calendar-days div.curr-date,
    .calendar-days div.curr-date:hover {
    background-color: var(--blue);
    color: var(--white);
    border-radius: 50%;
    }

    .calendar-days div.curr-date span {
    display: none;
    }

    .month-picker {
    padding: 5px 10px;
    border-radius: 10px;
    cursor: pointer;
    }

    .month-picker:hover {
    background-color: var(--color-hover);
    }

    .year-picker {
    display: flex;
    align-items: center;
    }

    .year-picker span:hover {
        background-color: var(--color-hover);
    }

    .year-change {
    height: 40px;
    width: 40px;
    border-radius: 50%;
    display: grid;
    place-items: center;
    margin: 0 10px;
    cursor: pointer;
    }

    .year-change:hover {
    background-color: var(--color-hover);
    }

    .calendar-footer {
    padding: 10px;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    }

    .toggle {
    display: flex;
    }

    .toggle span {
    margin-right: 10px;
    color: var(--color-txt);
    }

    .month-list {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background-color: var(--bg-main);
    padding: 20px;
    grid-template-columns: repeat(3, auto);
    gap: 5px;
    display: grid;
    transform: scale(1.5);
    visibility: hidden;
    pointer-events: none;
    }

    .month-list.show {
    transform: scale(1);
    visibility: visible;
    pointer-events: visible;
    transition: all 0.2s ease-in-out;
    }

    .month-list > div {
    display: grid;
    place-items: center;
    }

    .month-list > div > div {
    width: 100%;
    padding: 5px 20px;
    border-radius: 10px;
    text-align: center;
    cursor: pointer;
    color: var(--color-txt);
    }

    .month-list > div > div:hover {
    background-color: var(--color-hover);
    }

    .year-list {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background-color: var(--bg-main);
        padding: 20px;
        grid-template-columns: repeat(4, auto);
        gap: 5px;
        display: grid;
        transform: scale(1.5);
        visibility: hidden;
        pointer-events: none;
    }

    .year-list.show {
        transform: scale(1);
        visibility: visible;
        pointer-events: visible;
        transition: all 0.2s ease-in-out;
    }

    .year-list > div {
        display: grid;
        place-items: center;
    }

    .year-list > div > div {
        width: 100%;
        padding: 5px 20px;
        border-radius: 10px;
        text-align: center;
        cursor: pointer;
        color: var(--color-txt);
    }

    .year-list > div > div:hover {
        background-color: var(--color-hover);
    }


    @keyframes to-top {
    0% {
        transform: translateY(100%);
        opacity: 0;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
    }

    /* Media Queries */

    @media only screen and (max-width: 600px) {
    .calendar {
        transform: scale(0.8);
    }

    .calendar-header {
        font-size: 20px;
    }

    .calendar-week-day {
        font-size: 14px;
    }

    .calendar-days div {
        width: 40px;
        height: 40px;
    }

    .month-picker {
        padding: 3px 8px;
        font-size: 14px;
    }

    .year-change {
        height: 30px;
        width: 30px;
        margin: 0 5px;
    }

    .toggle span {
        font-size: 14px;
    }
    }


</style>
@endsection
