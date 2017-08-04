<?php

// Testing PHP functions here
include 'unsorted-functions.php';

session_start();

// Declare new session variable
$_SESSION['activeCard'];

$username = $_SESSION['username'];
$activeDeck = $_SESSION['activeDeck'];
$activeCard = $_SESSION['activeCard'];

$activeQuestion = getField($activeDeck, $activeCard, 'question')


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Test Features</title>
    <link rel="stylesheet" type="text/css" href="../../../views/styles.css">

    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

    <script src="../../../views/tests/countdown/countdown.js"></script>
    <script src="reveal.js"></script>

</head>

<body>

<script>
    countdown();
</script>

<input type="button" style='float: right' value ='show/hide details and tools' onclick="hideDiv()"/><br>




<h1 class="page-heading">Test study card</h1>
    <div class="divider"></div>

    <div class="status-info">

        <form action="../../../controllers/tests/countdown/processAnswer.php" method="post">

            <input type = "button" value="PLEASE TRANSLATE" style="background:#006db9; color: white">

            <input type = "button"
                   style="background:#006db9; color: white" value="<?php echo '\'' . $activeQuestion . '\'';?>">




            <input placeholder="answer here" type="text" name="suppliedAnswer" style="text-align:center"/>

            <div class="divider"></div>
            <button type="submit">check my answer</button>
            <input type = "text"  id="seconds" background="#4CAF50" style="text-align:center;" name="secondsRemaining" >


        </form>


    </div>

    <div id = "showHide">

        ===============================<br><br>
        <?php echo 'ACTIVE DECK: ' . $activeDeck?><br>
        <?php echo 'ACTIVE CARD: ' . $activeCard?><br>


        <!--<?php echo 'NEW CARD STILL TO TEST: ' . newCardsTotal($activeDeck)?><br>-->
        <?php echo 'NEW CARDS IN DECK: ' . newCardsTotal($activeDeck)?><br><br>

        <form onsubmit="loadCard()" method="post">

        <button type="submit" >next new card</button>

        </form><br><br>





        <form">
            <input id="testSubmit" type="submit" value="Submit">
        </form>

        <script>
            var submit_button = $('#testSubmit');

            submit_button.click(function() {

               //window.alert("did you click?");
               var update_div = $('#update_div');

                $.ajax({
                    type: 'GET',
                    url: 'process_form.php',
                    success: function(response) {
                       //alert(response);
                        update_div.html(response);
                    }
                });
            });
        </script>

        <div id="update_div"></div>



    </div>

</body>
</html>
