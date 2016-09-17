<?php

  /* Define variables:
  words to build passwords (array),
  counter for number of words in passwords,
  the character to put between password elements,
  placeholder varaible that will hold the password elements */
  $wordsArray = ['raven', 'writing', 'desk', 'gyre', 'gimble', 'caterpiller', 'little', 'bat', 'bandersnatch', 'fruminous', 'diane', 'vorpal', 'snicker', 'snack', 'brillig'];
  $wordCount = 4;
  $joiningChar = '-';
  $password = '';

  /* Randomize the order of words in the array */

  shuffle($wordsArray);

  $password = $wordsArray[0] . $joiningChar . $wordsArray[1];




?>
