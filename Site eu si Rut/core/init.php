<?php 
session_start();
//error_reporting(0);

require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';


if (logged_in() === true) {
	$session_user_id = $_SESSION['user_id'];
	$user_data = user_data($session_user_id,'user_id', 'username', 'password', 'first_name', 'last_name', 'email');
	// BAN or deactivate.
	/*if (user_active($User_data['username']) === false) {
		session_destroy();
		header('Location: index.php');
		exit();
	} */
}
// INFORMATIILE SUNT TRIMISE IN MYSQL
    if (isset($_POST['submit'])) {
        mysql_connect ("localhost", "root", "") or die ('Error: ' . mysql_error());
        mysql_select_db("horatiusirut") or die ('Data error:' . mysql_error());
        $text = mysql_real_escape_string($_POST['textarea']); 
        $query="INSERT INTO postari (textfield) VALUES ('$text')";
        mysql_query($query) or die ('Error updating database' . mysql_error());
    }
// INFORMATIILE SUNT PRINTATE PE SERVER
    $sql = "SELECT textfield FROM postari";
    $result = mysql_query($sql, $conn);

	/* if (mysql_num_rows($result) > 0) {
    // output data of each row
    while($row = mysql_fetch_assoc($result)) {
        echo '<table><tr><td>'."Anonnymus a spus : " . $row["textfield"]."</td></tr></table>"."<br>";
    }
}    */

/* else {
    echo "0 results";
}
   */

mysql_close($conn);

/////////////////////////////////////////

$errors = array();
?>
