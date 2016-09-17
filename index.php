<?php
error_reporting(E_ALL);       # Report Errors, Warnings, and Notices
ini_set('display_errors', 1); # Display errors on page (instead of a log file)
?>

<!DOCTYPE html>

<html>
<head>
  <title>Password Generator</title>
  <meta charset='utf-8' />
  <meta name='description' content='A simple xkcd-style password generator' />
  <?php require('logic.php'); ?>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1>Create a Password</h1>
  <form action='index.php' method='post'>
    Number of words: <input type='number' name='wordCount' min='1' max='10'><br/>
    <fieldset>
      <legend>Seperator:</legend>
      <input type='radio' name='joiningChar' id='hyphen' value='-' checked='checked'> Hyphen<br/>
      <input type='radio' name='joiningChar' id='underscore' value='_'> Underscore<br/>
    </fieldset>
    <input type='submit' value='Get Password' max='10' min='1'>
  </form>
  <p><?php echo($displayMessage); ?></p>
</body>
</html>
