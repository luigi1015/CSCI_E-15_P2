<?php
	error_reporting(E_ALL);       # Report Errors, Warnings, and Notices
	ini_set('display_errors', 1); # Display errors on page (instead of a log file)
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Jeff's xkcd Password Generator</title>
		<link rel="stylesheet" type="text/css" href="xkcd.css">
		<?php require 'logic.php'; ?>
	</head>
	<body>
		<h1>Jeff's xkcd Password Generator</h1>
		<div id="password"><?php echo getXkcdRandomPassword($numWordsInput,$addNumberInput,$addSymbolInput) ?></div>
		<br>
		<form method='POST' action='index.php'>
			Number of words: <input type="number" name="numWords" min="0" max="10" value="4">
			<br>
			<input type="checkbox" name="addNumber" value="1">Add a number
			<br>
			<input type="checkbox" name="addSymbol" value="1">Add a symbol
			<br>
			<input type="submit" value="Give me another">
		</form>
		<br>
		<div class="error"></div>
	</body>
</html>
