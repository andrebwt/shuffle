<?php

// Set the timezone for date related functions
date_default_timezone_set('Europe/London');

// Returns todays date
function getTodaysDate () {
    return date('Y-m-d');
}

// Returns date n days after today
function addDays ($days) {
    return date('Y-m-d', strtotime("+" . $days . " days"));
}





// Save xml file
function saveXml($xml, $xmlName) {
    $outputFilename = (string)$xml;
    $dom = new DOMDocument('1.0');
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xml->asXML());
    $dom->save($xmlName);
}


// Return the number of new cards in the deck
function newCardsTotal($xmlName) {

    $xml = new SimpleXMLElement($xmlName, 0, true);

    $totalCards = 0;

    foreach ($xml->children() as $card) {

        if ($card->new == "true") {
            $totalCards += 1;
        }
    }
    return $totalCards;
}


// Returns rank of first card marked as new
function getNewCard($xmlName) {

    $xml = new SimpleXMLElement($xmlName, 0, true);

    foreach ($xml->children() as $card) {
        if ($card->new == "true") {
            $card->new = "false";
            saveXml($xml, $xmlName);
            return (string)$card->rank;
        }
    }
}

function getField($deck, $rank, $field) {

    $xml = new SimpleXMLElement($deck, 0, true);

    foreach ($xml->children() as $card) {
        if ($rank == $card->rank) {
            return (string)$card->$field;
        }
    }
}

// Load the next card
function loadCard() {
    window.alert("sometext");
}