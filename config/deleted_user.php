
<?php
include_once 'connection.php';
$query = 'SELECT * FROM delete_history ORDER BY deleteID DESC LIMIT 1';
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

while ($row = mysqli_fetch_assoc($result)) {
$deletedID = $row['deleteID'];
$deleted_userID = $row['Userid'];
}
//echo  $deletedID;
?>