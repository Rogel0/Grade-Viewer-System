document.addEventListener('DOMContentLoaded', (event) => {
    var currentDate = new Date();
    var dateElement = document.getElementById("date");
    if(dateElement) {
        dateElement.innerHTML = currentDate.toDateString();
    }

    function updateTime() {
        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var seconds = currentTime.getSeconds();

        // Add leading zero to hours, minutes and seconds if less than 10
        hours = (hours < 10 ? "0" : "") + hours;
        minutes = (minutes < 10 ? "0" : "") + minutes;
        seconds = (seconds < 10 ? "0" : "") + seconds;

        // Build the time string
        var timeString = hours + ":" + minutes + ":" + seconds;

        // Update the clock element
        var clockElement = document.getElementById("clock");
        if(clockElement) {
            clockElement.innerHTML = timeString;
        }
    }

    function displayTime() {
        var date = new Date();

        var hours = date.getHours();
        var minutes = date.getMinutes();
        var seconds = date.getSeconds();
        var ampm = hours >= 12 ? 'PM' : 'AM';

        hours = hours % 12;
        hours = hours ? hours : 12;
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        var time = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
        var clockElement = document.getElementById("clock");
        if(clockElement) {
            clockElement.innerText = time;
        }

        setTimeout(displayTime, 1000);
    }

    displayTime();
});