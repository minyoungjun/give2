<?php

/* CREATE TABLE 
CREATE TABLE `subscribers` (  
  `signups_id` int(10) NOT NULL AUTO_INCREMENT,  
  `email` varchar(250) DEFAULT NULL,   
  PRIMARY KEY (`signups_id`)  
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;   
 */

$email = ($_GET['email']) ?$_GET['email'] : $_POST['email'];

// Replace with your own values for Server/Host, database, username, password

$pdbHost = "localhost";
$pdbUserName = "root";
$pdbPassword = "root";
$pdbName     = "myDataDase";


/*  You can use a different table (and fields for email). 
  	But change the table name and field names in the two SQL queries below.
*/

//  Connect to mySQL
$conlink = mysql_connect($pdbHost, $pdbUserName, $pdbPassword);
if(!$conlink) {die('Unable to connect to '.$pdbHost);}
if (!mysql_select_db($pdbName, $conlink)){die('Caanot find database '.$pdbName);}


//  Check if subscriber exists
$SQL= "select email from subscribers where email='".$email."'";
$result	= mysql_query($SQL);
if(!$result) {die('Problem in SQL: '.$SQL);}    //just ccking if there was a problem with your query

if (mysql_num_rows($result)==1) {   // he was subscribed already
	echo 'You are subscribed.';     	// Change the message if you want.
}
else {      	// he does not exist ==> we add him to the table
	$SQL2= "INSERT into subscribers (email) VALUES ('".$email."')";
	mysql_query($SQL2);
	echo 'Thank you for subscribing';	// Change the message if you want.
}
mysql_close($conlink);
?>