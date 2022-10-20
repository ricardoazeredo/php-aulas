<?php

function msToTime($duration) {
    $milliseconds = intval(($duration%1000)/100);
    $seconds = intval(($duration/1000)%60);
    $minutes = intval(($duration/(1000*60))%60);
    $hours = intval(($duration/(1000*60*60))%24);

    $hours = ($hours < 10) ? "0" + $hours : $hours;
    $minutes = ($minutes < 10) ? "0" + $minutes : $minutes;
    $seconds = ($seconds < 10) ? "0" + $seconds : $seconds;

    return "$hours : $minutes : $seconds . $milliseconds";
}

echo "<br/>";
$duration = 90000;
echo msToTime($duration);