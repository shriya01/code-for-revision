<!DOCTYPE html>
<html>
<head>
	<title>Exception Handling</title>
	<meta charset="utf-8">
</head>
<body>
	<?php 
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
//create function with an exception
	function checkNum($number)
	{
		if ($number>1) {
			throw new Exception("Value must be 1 or below");
		}
		return true;
	}
	try {
//trigger exception
		checkNum(2);
	} catch (Exception $e) {
		echo "Message:".$e->getMessage();
	}
	?>

	<?php
	class customException extends Exception {
		public function errorMessage() {
//error message
			$errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
			.': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
			return $errorMsg;
		}
	}

	$email = "someone@example.com";

	try {
//check if
		if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
//throw exception if email is not valid
			throw new customException($email.'is not vaild');
		}
//check for "example" in mail address
		if(strpos($email, "example") !== FALSE) {
			throw new Exception("$email is an example e-mail");
		}
	}
	catch (customException $e) {
//display custom message
		echo $e->getMessage();
	}

	catch(Exception $e) {
		echo $e->getMessage();
	}
	?> 

	<?php
	class customException2 extends Exception {
		public function errorMessage() {
//error message
			$errorMsg = $this->getMessage().' is not a valid E-Mail address.';
			return $errorMsg;
		}
	}

	$email = "someone@example.com";

	try {
		try {
//check for "example" in mail address
			if(strpos($email, "example") !== FALSE) {
//throw exception if email is not valid
				throw new Exception($email);
			}
		}
		catch(Exception $e) {
//re-throw exception
			throw new customException2($email);
		}
	}

	catch (customException2 $e) {
//display custom message
		echo $e->errorMessage();
	}
	?> 
</body>
</html>