<?php
session_start();
//print_r($_POST);
$_SESSION['activeDeck'] = $_POST['active'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Test User Logins</title>
    <link rel="stylesheet" type="text/css" href="../../../views/styles.css">
</head>

<body>

<script>window.location='deck-homepage.php';</script>

</body>
</html>


