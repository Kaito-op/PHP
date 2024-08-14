<?php
// Get the current time from the server
date_default_timezone_set('Asia/Manila'); // Set your timezone
$hour = date('H');
$minute = date('i');
$second = date('s');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clock</title>
</head>
<body>
<div id="clock"></div>

<script>
    // Initialize the clock with PHP values
    let hour = <?php echo $hour; ?>;
    let minute = <?php echo $minute; ?>;
    let second = <?php echo $second; ?>;

    function startClock() {
        second++;
        if (second == 60) {
            second = 0;
            minute++;
        }
        if (minute == 60) {
            minute = 0;
            hour++;
        }
        if (hour == 24) {
            hour = 0;
        }

        // Format the time
        let formattedTime = 
            (hour < 10 ? '0' : '') + hour + ':' +
            (minute < 10 ? '0' : '') + minute + ':' +
            (second < 10 ? '0' : '') + second;

        // Display the time
        document.getElementById('clock').innerHTML = formattedTime;

        // Update the clock every second
        setTimeout(startClock, 1000);
    }

    // Start the clock
    startClock();
</script>
</body>
</html>