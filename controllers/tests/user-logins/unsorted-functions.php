<?php

// Set the timezone for date related functions
date_default_timezone_set('Europe/London');

// Returns todays date
function getTodaysDate () {
    return date('Y-m-d');
}

// Returns date n days after today
function addDays ($days) {
    return date('Y-m-d', strtotime("+" . $days . " days"));
}