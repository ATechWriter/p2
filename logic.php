<?php

/* Validation to come:
If $wordCount is_integer is false
If $wordCount < 1
If $wordCount > 10
Then highlight field in red and display message:
Enter an integer between 1 and 10 */

/*
Define variables:
words to build passwords (array),
counter for number of words in passwords,
the character to put between password elements,
placeholder varaible that will hold the password elements,
message for server-side validation,
the text that will actually be displayed (password or message)
*/
$wordsArray = ['raven', 'writing', 'desk', 'gyre', 'gimble', 'caterpiller', 'little', 'bat', 'bandersnatch', 'fruminous', 'diane', 'vorpal', 'snicker', 'snack', 'brillig'];
$wordCount = '';
$joiningChar = '';
$password = '';
$validationMessage = '';
$displayMessage = '';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    $displayMessage = 'To get a password, enter the number of words to string together';
} else {

    /*
    Validation
    */

    if ($_GET['wordCount'] < 2) {
        $validationMessage = 'Too small! Just one word isn\'t secure at all.';
    } elseif ($_GET['wordCount'] > 9) {
        $validationMessage = 'Too big! Longer is more secure, but will you really be able to remember more than nine words?';
    }
    //elseif (is_integer($_POST['wordCount']) === false) {
    //    $validationMessage = 'Integers only, please.';
    //  }
    else {
        $validationMessage = 'OK';
    }

    /*
    Randomize the order of words in the array
    */

    shuffle($wordsArray);

    /*
    Get the number of words and the joining character the user wants
    */

    $wordCount = $_GET['wordCount']-1;
    $joiningChar = $_GET['joiningChar'];

    /*
    Select the specified number of elements from the array and concatenate
    */

    for ($i = $wordCount; $i >= 0; $i--) {
        $password = $password . $wordsArray[$i];

        /*
        If it's not the last element, add the joining character
        */

        if ($i > 0) {
            $password = $password . $joiningChar;
        }
    }

    /*
    If the user chose to add a number,
    pick a random digit (0-9) and add to the end of the password
    */

    if ($_GET['addNumber'] = true) {
        $password = $password . rand(0,9);
    }

    if ($_GET['addSymbol'] = true) {
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

        $password = $password . chr($symbolCode);
    }

    /*
    If the validation passes, show the password. Otherwise, show the validation message.
    */

    if ($validationMessage == 'OK') {
        $displayMessage = $password;
    } else {
        $displayMessage = $validationMessage;
    }
}

?>
