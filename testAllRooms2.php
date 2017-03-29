<h1>Book the B&B</h1>
<form action="testAllRooms2.php" method="post">

    <p>checkin: <input type="date" name="date" value="<?php if (isset($_POST['date'])) echo $_POST['date']; ?>"  /> </p>
    <p>checkout: <input type="date" name="dateOut" value="<?php if (isset($_POST['dateOut'])) echo $_POST['dateOut']; ?>"  /> </p>
    <p>room number: <input type="number" name="number" value="<?php if (isset($_POST['number'])) echo $_POST['number']; ?>"  /> </p>
    <p><input type="submit" name="submit" value="Check Availabity" /></p>
</form>

<?php
try {
    require_once 'connect.php';
    $rooms = array('101', '102', '103', '104');
    $in = $_POST['date'] ;
    $out = $_POST['dateOut'] ;
    $sql = "SELECT IF( COUNT(1),'$rooms[0]: No','$rooms[0]: Yes' ) AS Available
            FROM bookings
            WHERE rm_no = '$rooms[0]' 
            AND booking_date < '$out' 
            AND checkout > '$in';

            SELECT IF( COUNT(1),'$rooms[1]: No','$rooms[2]: Yes' ) AS Available
            FROM bookings
            WHERE rm_no = '$rooms[1]' 
            AND booking_date < '$out' 
            AND checkout > '$in';

            SELECT IF( COUNT(1),'$rooms[2]: No','$rooms[2]: Yes' ) AS Available
            FROM bookings
            WHERE rm_no = '$rooms[2]' 
            AND booking_date < '$out' 
            AND checkout > '$in';

            SELECT IF( COUNT(1),'$rooms[3]: No','$rooms[3]: Yes' ) AS Available
            FROM bookings
            WHERE rm_no = '$rooms[3]' 
            AND booking_date < '$out' 
            AND checkout > '$in';
            ";


} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>MySQLi: Multiple Queries</title>
 
</head>
<body>

<?php if (isset($error)) {
    echo "<p>$error</p>";
} else {
     $dbc->multi_query($sql);
    do {
        $result = $dbc->store_result();
        $row = $result->fetch_assoc();
        echo "<h2>Room Number {$row['Available']}</h2>";
       
        $result->free();
    } while ($dbc->next_result());
}
$dbc->close();
?>
</body>
</html>