<?php
echo 'Processing login...' . '<br>';

$email = $_POST["email"];
$password = $_POST["password"];
$userExists = false;

echo 'Email ' . $email . '<br>';
echo 'Password: ';
echo $password . '<br>';

if(file_exists('../../../models/tests/user-logins/test-users.xml')){
    echo 'user database exists' . '<br>';

    $xml = new SimpleXMLElement('../../../models/tests/user-logins/test-users.xml', 0, true);

    //print_r($xml) . '<br>';


    /*
    // loop through users and print
    foreach ($xml->children() as $user) {
        echo $user->email . '<br>';
        echo $user->password . '<br>';
    }
    */

    foreach ($xml->children() as $user) {
        if ($email == $user->email) {
            echo 'User Exists!' . '<br>';
        } else {
            echo 'User does not Exist!' . '<br>';
        }
    }

/*
    if($password == $xml->password) {
        echo 'password good!';
    }
*/


}