
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

/*
	$fn=$_POST['first_name'];
	$ln=$_POST['last_name'];
	$un=$_POST['email'];
	*/
	



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

$sql = "select a.rm_no as 'room no' , a.checkout as 'Available from', min(b.booking_date) as 'To'
from bookings      a
join bookings      b on a.rm_no=b.rm_no and b.booking_date>a.checkout
left join bookings c on a.rm_no=c.rm_no and a.checkout=c.booking_date
where c.rm_no is null 
group by a.booking_date, a.checkout";
$result = $dbc->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Room No: " . $row["room no"]." Available from: " . $row["Available from"]. " - to: " . $row["To"]. "<br>";
    }
} else {
    echo "0 results";
}
		
	 //Close the database connection - 
	mysqli_close($dbc);
	
	// Include the footer and quit the script - exit();
		
	exit();
	



?>






