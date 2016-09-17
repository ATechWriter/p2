<?php
error_reporting(E_ALL);       # Report Errors, Warnings, and Notices
ini_set('display_errors', 1); # Display errors on page (instead of a log file)
?>

<!DOCTYPE html>

<html>
<head>
  <title>Password Generator</title>
  <meta charset="utf-8" />
  <meta name="description" content="A simple xkcd-style password generator" />
  <?php require('logic.php'); ?>
  <!-- ADD STYLESHEET WHEN READY <link rel="stylesheet" href="styles.css"> -->
</head>
<body>
  <h1>Hey! Here, have a password!</h1>
  <p><?php echo($password); ?></p>
</body>
</html>
