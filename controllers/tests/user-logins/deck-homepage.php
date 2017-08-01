<?php
session_start();
$username = $_SESSION['username'];
$activeDeck = $_SESSION['activeDeck'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Test User Logins</title>
    <link rel="stylesheet" type="text/css" href="../../../views/styles.css">
</head>

<body>

<h1 class="page-heading">Deck Homepage</h1>
<div class="divider"></div>

<div class="status-info">

    <input type = "button" value="<?php echo $username . ' is logged in.';?>">
    <input type = "button" value="<?php echo $activeDeck . ' : is selected ';?>">

    <!-- Draw a table-->
    <button type="button" onclick="window.location='choose-deck.php';">
        revise questions</button>

    <button type="button" onclick="window.location='test-cards.php';">
        start testing</button>

    <!-- Start study countdown, what session variables do I need to track>
    <button type="button" onclick="window.location='../../../views/tests/user-logins/user-logins.html';">
        test questions</button>

    <?php

    ?>
</div>

<div class="status-info">
    <button type="button" onclick="window.location='../../../views/tests/user-logins/user-logins.html';">
        log out</button>
</div>
</body>
</html>
