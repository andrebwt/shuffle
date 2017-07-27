<?php
session_start();
// Create new session variable
//$_SESSION["activeDeck"] = "none";

$username = $_SESSION['username'];
$userFolder = $username . '/';
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

<h1 class="page-heading">User Homepage</h1>
<div class="divider"></div>

<div class="status-info">

    <input type = "button" value="<?php echo $username . ' is logged in.';?>">
    <input type = "button" value="<?php echo 'The active deck is: ' . $activeDeck;?>">





    <?php
    $deckLocation = '../../../models/tests/decks/';

    // Supress missing directory error
    $decksDir = @opendir($deckLocation . $username . '/');

    if($decksDir){
        while(($deck = readdir($decksDir)) !== false){
            if($deck != '.' && $deck != '..' && $deck != '.htaccess'){

                //echo "<button onclick=\"window.location='$deckLocation$userFolder$deck'\">$deck</button><br>";
                echo "<button onclick=\"window.location='$deckLocation$userFolder$deck'\">$deck</button><br>";

            }
        }
        closedir($decksDir);
    }
    ?>

    <button type="button" style="background:darkred" onclick="window.location='import-deck.php'; ">
        add new deck</button>


    <?php

    ?>
</div>

<div class="status-info">
    <button type="button" onclick="window.location='../../../views/tests/user-logins/user-logins.html';">
        log out</button>
</div>
</body>
</html>
