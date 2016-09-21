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
    <form action='index.php' method='GET'>
        <label for='wordCount'>Number of words:</label> <input type='number' name='wordCount' min='1' max='10' length='6'><br/>
        <fieldset>
            <legend>Seperator:</legend>
            <input type='radio' name='joiningChar' id='hyphen' value='-' checked='checked'> <label for='hyphen'>Hyphen</label><br/>
            <input type='radio' name='joiningChar' id='underscore' value='_'> <label for='underscore'>Underscore</label><br/>
        </fieldset>
        <input type='checkbox' name='addNumber' value='addNumber'> <label for='addNumber'>Add a number</label><br/>
        <input type='checkbox' name='addSymbol' value='addSymbol'> <label for='adddSymbole'>Add a symbol</label><br/>

        <input type='submit' value='Get Password' max='10' min='1'>
    </form>
    <p class=passwordOrValidation><?php echo($displayMessage); ?></p>
</body>
</html>
