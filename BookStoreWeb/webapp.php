<?php
require_once __DIR__ . '/db_config.php';
require_once __DIR__ . '/db_connect.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD,DB_DATABASE) or die(mysqli_error($con));
$db = new DB_CONNECT();


$query = "SELECT * FROM soa_books";
$result = mysqli_query($con, $query, MYSQLI_STORE_RESULT);



?>

<html>
<table border="5" cellpadding="5" cellspacing="0" style="border-collapse: collapse" bordercolor="#808080" width="100%" id="AutoNumber2" bgcolor="#C0C0C0">
  <tr>
    <td width="14%" align="center">Book Name</td>
    <td width="14%" align="center">Book author</td>
    <td width="14%" align="center">Book price</td>
    <td width="14%" align="center">Book description</td>
   
  </tr>
  <?php
  while($row = mysqli_fetch_array($result)){
  ?>
  <tr>
    <td width="14%" align="center"><?php {echo "{$row['bookName']}";} ?></td>
    <td width="14%" align="center"><?php {echo "{$row['bookAuthor']}";} ?></td>
    <td width="14%" align="center"><?php {echo "{$row['bookPrice']}";} ?></td>
    <td width="14%" align="center"><?php {echo "{$row['bookDesc']}";} ?></td>
  </tr>

<?php
}
mysqli_close($con);
?>
</table>
</html>