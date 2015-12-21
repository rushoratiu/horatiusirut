<?php 
include 'core/init.php';
include'includes/overall/header.php'; 

// Checking for registration errors and displaying them.

if (empty($_POST) === false) {
	$required_fields = array('username', 'password', 'password_again', 'first_name', 'email');
	foreach($_POST AS $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Fields marked with an asterisk are required.';
			break 1;
		}
	}

	if(empty($errors) === true) {
		if (user_exists($_POST['username']) === true) {
			$errors[] = 'Sorry, the username \'' . $_POST['username'] . '\' is already taken.';
		}
		if (preg_match("/\\s/", $_POST['username']) == true) {
			$errors[] = 'Your username must not contain any spaces.';
		}

		if (strlen($_POST['password']) < 6) {
			$errors[] = 'Your password must be at least 6 characters long.';
		}
		if ($_POST['password'] !== $_POST['password_again']) {
			$errors[] = 'Passwords don\'t match.';
		}
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
			$errors[] = 'A valid email address must be provided.';
		}
		if (email_exists($_POST['email']) === true){
			$errors[] = 'Sorry, the email address \'' . $_POST['email'] . '\' is already in use.';
		}
	}
}


?>


<!-- Regitsration form -->

	<h2>Register</h2>

<?php 
if (isset($_GET['success']) && empty($_GET['success'])) {
	echo 'You\'ve been registered successfully. You can now log in, your username has been activated by default.';
} else {
	if (empty($_POST) === false && empty($errors) === true) {
		//register user
		$register_data = array(
			'username' 		=> $_POST['username'],
			'password' 		=> $_POST['password'],
			'first_name' 	=> $_POST['first_name'],
			'last_name' 	=> $_POST['last_name'],
			'email' 		=> $_POST['email']
			);
		register_user($register_data);
		header('Location: register.php?success');
		// exit
	}
	elseif (empty($errors) === false) {
		//output errors
		echo output_errors($errors);
	}
?>

	<form action="" method="post">
		<ul> 
			<li>
				Username*: <br><p class="smallnote">(no spaces)</p>
				<input type="text" name="username">
			</li>

			<li>
				Password* <br><p class="smallnote">(at least 6 characters long) </p>
				<input type="password" name="password">
			</li>
			<li>
				Password again*: <br>
				<input type="password" name="password_again">
			</li>
			<li>
				First Name*:<br>
				<input type = "text" name="first_name">
			</li>
			<li>
				Last Name:<br>
				<input type = "text" name="last_name">
			</li>
			<li>
				Email address*:<br>
				<input type = "text" name="email">
			</li>


		</ul>
		<input type="submit" name="register" value="Register">
	</form>
	
<?php

}

include'includes/overall/footer.php'; ?>