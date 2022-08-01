<?php include 'conn.php';
include 'components.php';?>
<?php


//creating variables to store del from view.php

$delete_record=$_GET['del'];

// query to delete

$query="DELETE FROM `foodordered` WHERE `o_id` = '$delete_record'";

// creating deleted variable to display message

if(mysqli_query($conn,$query)){

	echo "<script>window.open('list_foodordered.php?deleted=Record has been deleted successfully','_self')</script>";

}
?>