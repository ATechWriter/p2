<?php

  /* Validation to come:
  If $wordCount is_integer is false
  If $wordCount < 1
  If $wordCount > 10
  Then highlight field in red and display message:
  Enter an integer between 1 and 10 */

  /* Define variables:
  words to build passwords (array),
  counter for number of words in passwords,
  the character to put between password elements,
  placeholder varaible that will hold the password elements,
  message for server-side validation,
  the text that will actually be displayed (password or message) */
  $wordsArray = ['raven', 'writing', 'desk', 'gyre', 'gimble', 'caterpiller', 'little', 'bat', 'bandersnatch', 'fruminous', 'diane', 'vorpal', 'snicker', 'snack', 'brillig'];
  $wordCount = '';
  $joiningChar = '';
  $password = '';
  $validationMessage = '';
  $displayMessage = '';

  /* Validation message */
  if ($_POST['wordCount'] < 2) {
    $validationMessage = 'Too small! Just one word isn\'t secure at all.';
  } elseif ($_POST['wordCount'] > 9) {
    $validationMessage = 'Too big! Longer is more secure, but will you really be able to remember more than nine words?';
  }
  //elseif (is_integer($_POST['wordCount']) === false) {
//    $validationMessage = 'Integers only, please.';
//  } 
  else {
    $validationMessage = 'OK';
  }

//    elseif ($_POST['wordCount'] > 9) {
//      $validationMessage = 'T'
//    } elseif (is_int($_POST['wordCount'])==false) {
//      $validationMessage = 'Integers only, please.'
//    }
//  }

  /* Randomize the order of words in the array */

  shuffle($wordsArray);

  /* Get the number of words and the joining character the user wants */

  $wordCount = $_POST['wordCount']-1;
  $joiningChar = $_POST['joiningChar'];

  /* Select the specified number of elements from the array and concatenate */

  for ($i = $wordCount; $i >= 0; $i--) {
    $password = $password . $wordsArray[$i];

    /* If it's not the last element, add the joining character */

    if ($i > 0) {
      $password = $password . $joiningChar;
    }
  }

  /* If the validation passes, show the password. Otherwise, show the validation message. */

  if ($validationMessage == 'OK') {
    $displayMessage = $password;
  } else {
    $displayMessage = $validationMessage;
  }


?>
