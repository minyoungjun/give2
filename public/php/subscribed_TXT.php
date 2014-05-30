
<?php

$email = ($_GET['email']) ?$_GET['email'] : $_POST['email'];


/* VALIDATE MAIL */
echo($email);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "This (email_a) email address is considered not valid.";
    return false;
    exit;
}



/*
	SAVING NAME AND EMAIL TO A TXT FILE
	Create a myemails.txt file and put it in the same directory.
*/	
$pfileName	= "myemails.txt";


if (is_writable($pfileName)) {

		$MyFile = fopen($pfileName, "a");
		$nline=$email."\r\n";		
		
		fwrite($MyFile, $nline);
		fclose($MyFile);
		
		echo 'Thank you for subscribing';	// Change the message if you want.		

	} else {		
    	echo "The file $pfileName can not be written";
	}	
	
	
	
	

?>