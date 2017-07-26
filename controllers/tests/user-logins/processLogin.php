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
            echo 'user ' . $username . ' was found.' . '<br>';
            return true;
        } else {
            echo 'user ' . $username . ' not found!' . '<br>';
            return false;
        }
    }

    function passCorrect($xml, $username, $password) {
        foreach ($xml->children() as $user) {
            if ($username == $user->username && $password == $user->password) {
                echo '<br>' . 'password is good.';
                return true;
            } else if ($username == $user->username && $password != $user->password) {
                echo '<br>' . 'password is bad!';
                return false;
            }
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

                //echo 'user database exists' . '<br>';
                echo '<input type="button" value = "USER DATABASE EXISTS" style="background:#4CAF50;color: #FFFFFF">';

                $xml = new SimpleXMLElement('../../../models/tests/user-logins/test-users.xml', 0, true);

                // If  user is found check the password is correct
                if (userFound($xml, $username)){
                    $do_login = passCorrect($xml, $username, $password);
                }

                // If the username and password are correct, start a new session
                if($do_login) {
                    echo '<br>' . 'Starting session...';

                    session_start();
                    $_SESSION['username'] = $username;
                    echo("<script>window.location = 'user-page.php';</script>");
                    die;
                }
            }
            ?>



        </div>

        <div class="status-info">
            <button type="button" onclick="window.location='../../../views/tests/user-logins/user-logins.html';">
                try again</button>
        </div>



    </body>
    </body>
</html>
