<?php 
include 'core/init.php';
protect_page();
include'includes/overall/header.php'; 


	/* if (isset($_POST['submit'])) {
	$query = $conn->prepare("INSERT INTO postari (username, textfield ) VALUES (:uname, :textf,)");
	$query->execute(array(':uname'=>$_POST['username'], ':textf'=>$_POST['textarea']));
	echo $_POST['textarea'];
} 
*/

?>
	<h1>Our story</h1>
	<p> Stiu ca asteptati cu nerabdare. Va urma ..</p>

	<h1>Commenturi :</h1>
	<form method="post" action="#">
		<div>
			<label>
				<textarea name="textarea" rows="8" cols="90" placeholder="Astept parerile sau sugestiile dumneavoastra ..." ></textarea>
			</label>
		</div>
		<input type="submit" name="submit" value="Submit" >
	</form>
	<div>

	</div>
	
<?php include'includes/overall/footer.php'; ?>