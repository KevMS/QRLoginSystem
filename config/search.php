<?php
include_once 'connection.php';
if(isset($_POST['search']))
{

 $search_val=$_POST['search_term'];

 $get_result = mysql_query("SELECT * FROM search WHERE MATCH( title, description ) AGAINST('$search_val')");    
 while($row=mysql_fetch_array($get_result))
 {
  echo "<li><a href='http://localhost/qr_code/admin-dashboard/".$row['link']."'><span class='title'>".$row['title']."</span><br><span class='desc'>".$row['description']."</span></a></li>";
 }
 exit();
}
?>