<?php
include 'connection.php'; ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
}
* {
  box-sizing: border-box;
}
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}
form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

</style>
</head>
<body>

<form class="example">
  <input type="text" placeholder="ComplaintID" name="complaintid">
  <button type="submit"><i class="fa fa-search"></i></button>
</form><br><br>

<?php 
if(isset($_GET['complaintid'])){
  $complaintid=$_GET['complaintid'];
  $sql="select * from  complaintform where complaint_id='$complaintid'";
  $result=mysqli_query($conn,$sql);
$var = '';
if(mysqli_num_rows($result)>0){
  $row=mysqli_fetch_assoc($result);
?>
<h1><?php
if(!empty($row['status'])){

  $var = $row['status'];
  if($var=='in_progress'){
    $var='IN PROGRESS';
  }
echo 'Hello Your Complaint is '. $var;
}
?>
</h1>
<?php
}
}


?>
</body>
</html> 
