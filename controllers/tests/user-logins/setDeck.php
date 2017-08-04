<?php
session_start();
//print_r($_POST);
$_SESSION['activeDeck'] = $_POST['active'];

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="../../../views/styles.css">
    </head>

    <body>
        <script>window.location='deck-homepage.php';</script>
    </body>
</html>


