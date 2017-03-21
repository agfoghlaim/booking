
<h1>Book the B&B</h1>
<form action="test2.php" method="post">
	<p>First Name: <input type="text" name="first_name" size="15" maxlength="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
	<p>Last Name: <input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
	<p>Email: <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
	<p>Date: <input type="date" name="date" value="<?php if (isset($_POST['date'])) echo $_POST['date']; ?>"  /> </p>
	<p><input type="submit" name="submit" value="Register" /></p>
</form>


<?php
 //connect to the database 	
	require('connect.php');

	



	if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) ){

	$q = "INSERT INTO guests (fname, lname, email)
		VALUES ('".$_POST['first_name']."','".$_POST['last_name']."','".$_POST['email']."')";
	$s =  "INSERT INTO guests (fname, lname, email)
		VALUES ('".$_POST['first_name']."','".$_POST['last_name']."','".$_POST['email']."')";
	$r = @mysqli_query($dbc, $q);
	
if ($r) {
		
		echo '<h1>Thank you!</h1>
		<p>You are now registered as a guest</p><p><br /></p>';	
		
	} 

	else  { // If it did not run OK.
		echo '<h1>Everything is not okay</h1>';
		
						
	}}

$sql = "CALL isavailable(103,'2017-04-05','2017-04-06')";
$result = $dbc->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Available??: " . $row["Available"]. "<br>";
    }
} else {
    echo "0 results";
}
		
	 //Close the database connection - 
	mysqli_close($dbc);
	
	// Include the footer and quit the script - exit();
		
	exit();
	



?>






