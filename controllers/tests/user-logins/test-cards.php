<?php

// Testing PHP functions here
include 'unsorted-functions.php';

session_start();
$username = $_SESSION['username'];
$activeDeck = $_SESSION['activeDeck'];

$_SESSION['activeCard'] = firstNewCard($activeDeck);
$activeCard = $_SESSION['activeCard'];




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Test Features</title>
    <link rel="stylesheet" type="text/css" href="../../../views/styles.css">
    <script src="../../../views/tests/countdown/countdown.js"></script>
    <script src="reveal.js"></script>

</head>

<body>

<script>

    countdown();
</script>

<input type="button" style='float: right' value ='show/hide details' onclick="hideDiv()"/><br>




<h1 class="page-heading">Test study card</h1>
    <div class="divider"></div>

    <div class="status-info">

        <form action="../../../controllers/tests/countdown/processAnswer.php" method="post">

            <input type = "button" value="PLEASE TRANSLATE" style="background:#006db9; color: white">
            <input type = "button"  style="background:#006db9; color: white" value="<?php echo '\'' . $activeCard . '\'';?>">




            <input placeholder="answer here" type="text" name="suppliedAnswer" style="text-align:center"/>

            <div class="divider"></div>
            <button type="submit">check my answer</button>
            <input type = "text"  id="seconds" background="#4CAF50" style="text-align:center;" name="secondsRemaining" >


        </form>


    </div>

    <div id = "showHide">

        ===============================<br><br>
        <?php echo 'ACTIVE DECK: ' . $activeDeck?><br>
        <?php echo 'ACTIVE CARD: ' . $activeCard?><br><br>

        <button type="submit">next new card</button>



    </div>

</body>
</html>
