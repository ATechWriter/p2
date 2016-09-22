<!DOCTYPE html>

<html>
<head>
    <title>Jabberwocky Password Generator</title>
    <meta charset='utf-8' />
    <meta name='description' content='A simple xkcd-style password generator' />
    <?php require('logic.php'); ?>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>The Jabberwocky Password Generator</h1>
    <form action='index.php' method='GET'>
        <label>Number of words: <input type='number' name='wordCount' min='1' max='10'></label><br/><br/>
        <label><input type='radio' name='joiningChar' id='hyphen' value='-' checked='checked'> Hyphen separator</label><br/>
        <label><input type='radio' name='joiningChar' id='underscore' value='_'> Underscore separator</label><br/><br/>
        <label><input type='checkbox' name='addNumber' value='number'> Add a number</label><br/>
        <label><input type='checkbox' name='addSymbol' value='symbol'> Add a symbol</label><br/><br/>

        <input type='submit' value='Get Password'>
    </form>
    <p class=<?php echo($messageClass) ?>><?php echo($displayMessage); ?></p>
</body>
</html>
