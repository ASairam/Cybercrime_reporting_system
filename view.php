<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf8_general_ci">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>



<?php

include "connection.php";
$sql="select * from complaintform";
$res=mysqli_query($conn,$sql);


?>
<?php

if(isset($_GET['delete'])){
  $delete=$_GET['delete'];
  $sql="delete from complaintform where id='$delete'";
  if(mysqli_query($conn,$sql)){
    echo 'record is deleted';
  }
  
}


?>
<html>
<head>
<h2>COMPLAINT DETAILS</h2>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
</head>
<Body>
<table>
<tr>
<th>NAME</th>
<th>PHONE</th>
<th>EMAIL</th>
<th>COMPLAINT</th>
<th>FILE</th>
<th>DATE</th>
<th>action</th>
<th>voiceOutput</th>
</tr>
<tbody>
<?php
while($row_complaint=mysqli_fetch_assoc($res)){


?>
<tr>
<td><?php
if(!empty($row_complaint['Name'])){
 echo   $row_complaint['Name'];
}
?></td>
<td><?php
if(!empty($row_complaint['Phone'])){
 echo   $row_complaint['Phone'];
}
?></td>
<td><?php
if(!empty($row_complaint['Email'])){
 echo   $row_complaint['Email'];
}
?></td>
<td><?php
if(!empty($row_complaint['Complaint'])){
 echo   $row_complaint['Complaint'];
}
?></td>
<td>

<img src="images/<?php
if(!empty($row_complaint['File'])){
 echo   $row_complaint['File'];
}
?>" width="100";
height="100";>
</td>
<td><?php
if(!empty($row_complaint['Date'])){
 echo   $row_complaint['Date'];
}
?></td>

<td><a href="edit.php?id=<?php
 echo   $row_complaint['Id'];

?>
">EDIT</a>|<a href="?delete=<?php
echo $row_complaint['Id'];
?>
">DELETE</a></td>
<td>

<?php
if(!empty($row_complaint['voiceoutput'])){
 echo   $row_complaint['voiceoutput'];
}
?>

</td>
</tr>

<?php
}
?>
</tbody>
</table>
</body>
</html>



