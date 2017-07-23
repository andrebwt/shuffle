<?php
echo 'Processing login...' . '<br><br>';

$username = $_POST["username"];
$password = $_POST["password"];

//$userExists = false;
$passwordCorrect = false;

echo 'username entered: ' . $username . '<br>';
echo 'password entered: ' . $password . '<br><br>';

function userFound($xml, $username) {
    $userExists = false;
    foreach ($xml->children() as $user) {
        if ($username == $user->username) {
            $userExists = true;
        }
    }
    return $userExists;
}



if(file_exists('../../../models/tests/user-logins/test-users.xml')){

    echo 'user database exists' . '<br>';

    $xml = new SimpleXMLElement('../../../models/tests/user-logins/test-users.xml', 0, true);

    // Look for user
    echo userFound($xml, $username) ? 'user ' . $username . ' was found.' . '<br>' :
        'user ' . $username . ' not found!' . '<br>';

/*
    if($userExists == true) {

        // Refactor as function. DRY
        foreach ($xml->children() as $user) {
            if ($username == $user->username && $password == $user->password) {
                echo '<br>' . 'password is good.';
            } else if($username == $user->username && $password != $user->password) {
                echo '<br>' . 'password is bad!';
            }
        }
    }
*/

}