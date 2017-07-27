<?php
session_start();
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Test User Logins</title>
    <link rel="stylesheet" type="text/css" href="../../../views/styles.css">
</head>

<body>

<h1 class="page-heading">User Homepage</h1>
<div class="divider"></div>

<div class="status-info">

    <input type = "button" value="<?php echo $username . ' is logged in.';?>">

    <button type="button" onclick="window.location='choose-deck.php';">
        choose a deck</button>

    <button type="button" onclick="window.location='../../../views/tests/user-logins/user-logins.html';">
        set password</button>

    <?php

    ?>
</div>

<div class="status-info">
    <button type="button" onclick="window.location='../../../views/tests/user-logins/user-logins.html';">
        log out</button>
</div>
</body>
</html>
