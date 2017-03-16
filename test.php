

<?php
 //connect to the database 	
	require('connect.php');
	

	$q = "INSERT INTO guests (fname, lname, email)
		VALUES ('ma','oh','m@marie.com')";
	$r = @mysqli_query($dbc, $q);
	
if ($r) {
		
		echo '<h1>Thank you!</h1>
		<p>You are now registered as a guest</p><p><br /></p>';	
		
	} 

	else  { // If it did not run OK.
		echo '<h1>Everything is not okay</h1>';
		
						
	}
		
	 //Close the database connection - 
	mysqli_close($dbc);
	
	// Include the footer and quit the script - exit();
		
	exit();
	



?>





