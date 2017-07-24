<?php header('user-page.php');

    echo 'Processing login...' . '<br><br>';

    $username = $_POST["username"];
    $password = $_POST["password"];
    $do_login = false;

    echo 'username entered: ' . $username . '<br>';
    echo 'password entered: ' . $password . '<br><br>';

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

    if(file_exists('../../../models/tests/user-logins/test-users.xml')){

        echo 'user database exists' . '<br>';

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

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Test User Logins</title>
        <link rel="stylesheet" type="text/css" href="../../styles.css">
    </head>

    <body>
        <br><br>
        <a href="../../../views/tests/user-logins/user-logins.html">Try Again</a>
    </body>
</html>
