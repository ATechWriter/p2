<?php

/*
Define variables:
words to build passwords (array),
counter for number of words in passwords,
the character to put between password elements,
options to add a number and/or character (array),
placeholder varaible that will hold the password elements,
message for server-side validation,
the text that will actually be displayed (password or message),
the class to assign to the display message (used to visually differentiate errors from passwords).
*/

$wordsArray = ['jabberwock', 'brillig', 'slithy', 'toves', 'gyre', 'gimble', 'wabe', 'mimsey', 'borogoves', 'mome', 'raths', 'outgrabe', 'jubjub', 'fruminous', 'bandersnatch', 'vorpal', 'manxome', 'tumtum', 'uffish', 'whiffling', 'tulgey',  'burbled', 'snicker', 'snack', 'galumphing', 'beamish', 'frabjous', 'callooh', 'callay'];
$wordCount = '';
$joiningChar = '';
$options = [];
$password = '';
$displayMessage = '';
$validationStatus = '';
$messageClass = 'error';

/*
Check whether the user has submitted any values yet.
If not, prompt user to enter the number of words.
*/

if (isset($_GET['wordCount']) && isset($_GET['joiningChar'])) {
    /*
    Validation (runs if user has submitted values)
    Show an error if the number entered is not 2-9
    */

    if (empty($_GET['wordCount'])) {
        $displayMessage = 'Enter a number of words to include.';
    } elseif (!is_numeric($_GET['wordCount'])) {
        $displayMessage = 'Integers only, please.';
    } elseif ($_GET['wordCount'] < 2) {
        $displayMessage = 'Too small! You need at least two words.';
    } elseif ($_GET['wordCount'] > 9) {
        $displayMessage = 'Too big! Longer is more secure, but will you really be able to remember more than nine words?';
    } else {
        $validationStatus = 'OK';
        $messageClass = 'password';
    }
}
else {
    $displayMessage = 'Enter a number of words to include.';
}

/*
If user submitted values and validation passes, generate a password
*/
if (isset($_GET['wordCount']) && isset($_GET['joiningChar'])) {

    if ($validationMessage = 'OK') {

        /*
        Shuffle the order of words in the array
        */

        shuffle($wordsArray);

        /*
        Put the user's values into the variables
        */

        $wordCount = $_GET['wordCount']-1;
        $joiningChar = $_GET['joiningChar'];

        if (!empty($_GET['addNumber'])) {
            array_push($options,$_GET['addNumber']);
        }
        if (!empty($_GET['addSymbol'])) {
            array_push($options,$_GET['addSymbol']);
        }

        /*
        Concatenate the specified number of words
        */

        for ($i = $wordCount; $i >= 0; $i--) {
            $password = $password . $wordsArray[$i];

            /*
            If it's not the last word, add the separator
            */

            if ($i > 0) {
                $password = $password . $joiningChar;
            }
        }

        /*
        If the user chose to add a number,
        pick a random digit (0-9) and add to the end of the password
        */

        if (in_array('number',$options)) {

            $password = $password . $joiningChar . rand(0,9);
        }

        /*
        If the user chose to add a symbol,
        pick a "chunk" of the ASCII series that contains only symbols
        (there are four such chunks), then pick a random number in that chunk
        and add to the end of the password
        */

        if (in_array('symbol',$options)) {

            $symbolSet = rand(1,4);

            if ($symbolSet == 1) {
                $symbolCode = rand(33,47);
            } elseif ($symbolSet == 2) {
                $symbolCode = rand(58,64);
            } elseif ($symbolSet == 3) {
                $symbolCode = rand(91,96);
            } else {
                $symbolCode = rand(123,126);
            }

            $password = $password . $joiningChar . chr($symbolCode);
        }

        $displayMessage = $password;
    }
}
?>
