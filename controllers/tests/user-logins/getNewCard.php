<?php

session_start();

function firstNewCard($xml) {

    foreach ($xml->children() as $card) {
        if ($card->new == 'true') {
            $userExists = true;
        }
    }

    if ($userExists) {
        return true;
    } else {
        return false;
    }
}