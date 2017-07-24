<?php
session_start();
$username = $_SESSION['username'];
echo $username . ' is logged in';