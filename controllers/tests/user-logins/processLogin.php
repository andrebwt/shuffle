<?php

    $username = $_POST["username"];
    $password = $_POST["password"];
    $do_login = false;

    function userFound($xml, $username) {

        $userExists = false;
        foreach ($xml->children() as $user) {
            if ($username == $user->username) {
                $userExists = true;
            }
        }

        if ($userExists) {
            return true;
        } else {
            return false;
        }
    }

    function passCorrect($xml, $username, $password) {

        $goodPass = false;
        foreach ($xml->children() as $user) {
            if ($username == $user->username && $password == $user->password) {
                $goodPass = true;
            }
        }

        if ($goodPass) {
            return true;
        } else {
            return false;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <title>Test User Logins</title>
        <link rel="stylesheet" type="text/css" href="../../../views/styles.css">
    </head>

    <body>


        <div class="status-info">

            <input type="button" value = 'PROCESSING LOGIN...' style="background:#4CAF50;color: #FFFFFF">

            <input type = "button" value="<?php echo 'username entered: ' . $username;?>">
            <input type = "button" value="<?php echo 'password entered: ' . $password;?>" />

            <?php
                if(file_exists('../../../models/tests/user-logins/test-users.xml')){

                    echo '<input type="button" value = "USER DATABASE EXISTS" style="background:#4CAF50;color: #FFFFFF">';

                    $xml = new SimpleXMLElement('../../../models/tests/user-logins/test-users.xml', 0, true);

                    // Check user exists
                    if (userFound($xml, $username)){
                        echo '<input type="button" value = "USER FOUND" style="background:#4CAF50;color: #FFFFFF">';
                    } else {
                        echo '<input type="button" value = "USER NOT FOUND!" style="background:darkred;color: #FFFFFF">';
                    }

                    // Login if the password is correct
                    if ((userFound($xml, $username)) && (passCorrect($xml, $username, $password))){
                        $do_login = true;
                    }
                    // Print message if the password entered is wrong
                    if ((userFound($xml, $username)) && !(passCorrect($xml, $username, $password))) {
                        echo '<input type="button" value = "WRONG PASSWORD!" style="background:darkred;color: #FFFFFF">';
                    }

                    // If the username and password are both correct, start a new session
                    if($do_login) {

                        session_start();
                        $_SESSION['username'] = $username;
                        echo("<script>window.location = 'user-page.php';</script>");
                        die;
                    }
                } else {
                    echo '<input type="button" value = "USER DATABASE NOT FOUND!" style="background:darkred;color: #FFFFFF">';
                }
            ?>
        </div>

        <div class="status-info">
            <button type="button" onclick="window.location='../../../views/tests/user-logins/user-logins.html';">
                try again</button>
        </div>
    </body>
</html>
