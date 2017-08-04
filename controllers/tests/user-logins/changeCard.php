<?php
// Testing PHP functions here
include 'unsorted-functions.php';

session_start();

$activeDeck = $_SESSION['activeDeck'];
$_SESSION['activeCard'] = getNewCard($activeDeck);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="../../../views/styles.css">
    </head>

    <body>
        <script>window.location='test-cards.php';</script>
    </body>
</html>


