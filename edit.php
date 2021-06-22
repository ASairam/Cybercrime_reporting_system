<?php
include 'connection.php';
if(isset($_GET['id'])){

$complaint_id=$_GET['id'];


if(isset($_POST['update'])){
$status = $_POST['status'];


    $sql_upadet_status = "update complaintform set status='$status' where id = '$complaint_id'";
    if(mysqli_query($conn,$sql_upadet_status)){
        echo "upadted";
    }



}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YOUR STATUS</title>
</head>
<body>
<form method='post'>
<select name='status'>
<?php
$sql="select * from complaintform  where id='$complaint_id'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    $row=mysqli_fetch_assoc($result);
    $var1='';
    $var='';
    $html ='';
    if(!empty($row['status'])){
       $var1=$row['status'];

    if($var1=='in_progress'){

      echo  $html = "<option value='in_progress'>IN PROGRESS</option><option value='pending'>PENDING</option><option value='resolved'>RESOLVED</option>";
        
    }


    if($var1=='pending'){

        echo  $html ="<option value='pending'>PENDING</option><option value='in_progress'>IN PROGRESS</option><option value='resolved'>RESOLVED</option>";
    }

    if($var1=='resolved'){

        echo   $html ="<option value='resolved'>RESOLVED</option><option value='pending'>PENDING</option><option value='in_progress'>IN PROGRESS</option>";

    }
}
}else{ ?>

<option value='resolved'>RESOLVED</option><option value='pending'>PENDING</option><option value='in_progress'>IN PROGRESS</option>
<?php } ?>

</select>
    <input type='submit' name='update' value='update'>
</form>
</body>
</html>
<?php  } ?>
