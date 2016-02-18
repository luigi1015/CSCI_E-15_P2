<?php
	$wordFile = fopen( "words.txt", "r" ) or die( "Unable to open words file!" );
	$words = array();
	while( ($word = fgets($wordFile, 4096)) !== false )
	{
		$words[] = trim($word);
	}
	fclose( $wordFile );

	$error = "";

	//Get the Form data
	$numWordsInput = "4";
	$addNumberInput = "0";
	$addSymbolInput = "0";
	if( array_key_exists('numWords', $_POST))
	{
		$numWordsInput = $_POST['numWords'];
	}

	if( array_key_exists('addNumber', $_POST))
	{
		$addNumberInput = $_POST['addNumber'];
	}

	if( array_key_exists('addSymbol', $_POST))
	{
		$addSymbolInput = $_POST['addSymbol'];
	}
	
	function getXkcdRandomPassword( $numWords = '4', $addNumber = '0', $addSymbol = '0')
	{
		global $words;
		global $error;
		$symbols = array('!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '=');

		$password = "";
		
		if( is_numeric($numWords) === false )
		{
			$error = "Please enter a valid number for the number of words.";
		}
		else if( $numWords < 0 or $numWords > 10 )
		{
			$error = "Please enter a number between 0 and 10 for the number of words.";
		}
		else
		{
			for( $i = 0; $i < $numWords; $i++ )
			{
				if( $i == 0 )
				{
					$password = $password . $words[rand(0, count($words)-1)];
				}
				else
				{
					$password = $password . '-' . $words[rand(0, count($words)-1)];
				}
			}
		}
		
		if( $addNumber !== "0" )
		{
			$password = $password . rand(0, 100);
		}
		
		if( $addSymbol !== "0" )
		{
			$password = $password . $symbols[rand(0, count($symbols)-1)];
		}
		
		return $password;
	}
?>
