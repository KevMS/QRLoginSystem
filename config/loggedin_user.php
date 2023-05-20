
<?php
include_once 'connection.php';
$query = 'SELECT * FROM loggedin_history ORDER BY LoggedinID DESC LIMIT 1';
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

while ($row = mysqli_fetch_assoc($result)) {
$Username = $row['Username'];
$login_userID = $row['UserID'];
}
echo  $Username;




                                ?>