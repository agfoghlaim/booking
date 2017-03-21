
<h1>Book the B&B</h1>
<form action="multi.php" method="post">

  <p>checkin: <input type="date" name="date" value="<?php if (isset($_POST['date'])) echo $_POST['date']; ?>"  /> </p>
  <p>checkout: <input type="date" name="dateOut" value="<?php if (isset($_POST['dateOut'])) echo $_POST['dateOut']; ?>"  /> </p>
  <p>room number: <input type="number" name="number" value="<?php if (isset($_POST['number'])) echo $_POST['number']; ?>"  /> </p>
  <p><input type="submit" name="submit" value="Check Availabity" /></p>
</form>


<?php
 //connect to the database  
  require('connect.php');

  if(!empty($_POST['date']) ){
    
  $sql = "CALL isavailable2('".$_POST['number']."','".$_POST['date']."','".$_POST['dateOut']."')";
  //$r = @mysqli_query($dbc, $sql);

$result = $dbc->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Available??: " . $row["Available"]. " room: " .$row["room"]. "<br>";

    }
} else {
    echo "0 results";
}
  
}


    
   //Close the database connection - 
  mysqli_close($dbc);
  
  // Include the footer and quit the script - exit();
    
  exit();
  



?>






