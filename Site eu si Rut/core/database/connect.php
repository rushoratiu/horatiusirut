<?php 
$connect_error = 'Sorry, we are experiencing connection problems';
$conn = mysql_connect('localhost', 'root', '') or die($connect_error);

mysql_query("CREATE DATABASE horatiusirut",$conn);

mysql_query("CREATE TABLE horatiusirut.users 
	(
		user_id INT NOT NULL AUTO_INCREMENT,
		username VARCHAR(32) NOT NULL,
		password VARCHAR(32) NOT NULL,
		first_name VARCHAR(32) NOT NULL,
		last_name VARCHAR(32) NOT NULL,
		email VARCHAR(1024) NOT NULL,
		active INT NOT NULL default 1,
		PRIMARY KEY (user_id)
	);");
 mysql_query("CREATE TABLE horatiusirut.postari
 	(
		user_id INT NOT NULL AUTO_INCREMENT,
		username VARCHAR(32) NOT NULL,
		textfield VARCHAR(1024) NOT NULL,
		active INT NOT NULL default 1,
		PRIMARY KEY (user_id)

	);"); 

mysql_select_db('horatiusirut') or die($connect_error);

?>