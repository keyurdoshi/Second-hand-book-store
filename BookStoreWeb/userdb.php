<?php
require_once __DIR__ . '/db_config.php';
require_once __DIR__ . '/db_connect.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD,DB_DATABASE) or die(mysqli_error($con));
$db = new DB_CONNECT();


$query = "SELECT * FROM sdp_livestreaming_login";
$result = mysqli_query($con, $query, MYSQLI_STORE_RESULT);



?>

<html>
<table border="5" cellpadding="5" cellspacing="0" style="border-collapse: collapse" bordercolor="#808080" width="100%" id="AutoNumber2" bgcolor="#C0C0C0">
  <tr>
    <th width="14%" align="center">Name</th>
    <th width="14%" align="center">Username</th>
    <th width="14%" align="center">Email</th>
    <th width="14%" align="center">Phone</th>
   
  </tr>
  <?php
  while($row = mysqli_fetch_array($result)){
  ?>
  <tr>
    <td width="14%" align="center"><?php {echo "{$row['name']}";} ?></td>
    <td width="14%" align="center"><?php {echo "{$row['username']}";} ?></td>
    <td width="14%" align="center"><?php {echo "{$row['email']}";} ?></td>
    <td width="14%" align="center"><?php {echo "{$row['phone']}";} ?></td>
  </tr>

<?php
}
mysqli_close($con);
?>
</table>
</html>