<?php

// Upload file
$target_path = "./uploads/";
$target_path = $target_path . basename( $_FILES['csv-file']['name']);

$inputFile = $_FILES['csv-file']['tmp_name'];
$outputFilename   = './decks/output.xml';

$tmp = fopen($_FILES['csv-file']['tmp_name'], 'rt');

// New empty xml document with just deck tags
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><deck></deck>');
$headers = array('Rank', 'Question', 'Answer','TimesRepeated', 'ReviewDate');
$bom = pack("CCC", 0xef, 0xbb, 0xbf);

while ( ($line = fgets($tmp)) !== false) {

    $card = $xml->addChild('card');

    //Add csv data

    //Remove BOM from start of string
    if (0 == strncmp($line, $bom, 3)) {
        $line = substr($line, 3);
    }

    //$line = utf8_decode($line);

    //Remove newline from end of string
    $line = str_replace(array("\n","\r"), '', $line) . ',testReviewVal';

    //Separate data items
    $data = explode(",", $line);
    print_r($data);

    for ($i = 0; $i <4; $i++) {
        $card->addChild($headers[$i], $data[$i]);
    }
}

//Output formatted xml

$dom = new DOMDocument('1.0');
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->loadXML($xml->asXML());
$dom->save($outputFilename);

echo "<br>";

if(move_uploaded_file($_FILES['csv-file']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['csv-file']['name']).
        " has been uploaded.";
} else {
    echo "There was an error uploading the file!";
}

echo "<br>" . "<br>";

echo "<b>Uploaded files:</b>";
echo "<br>";

$files = scandir("./uploads/");
$ignore = array(".", "..");

foreach ($files as $doc) {
    if (!in_array($doc, $ignore)) {
        echo $doc . "<br>";
    }
}

?>

<br>
<a href="./decks/output.xml">View xml</a><br>
<a href="functionTesting.html">Return to Main Page</a>