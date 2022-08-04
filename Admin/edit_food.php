<?php include 'conn.php';
include 'components.php'; 
include 'header.php';?>
<?php 

$edit_record=@$_GET['edit'];
$query = "select * from food where f_id ='$edit_record' ";
$run= mysqli_query($conn,$query);

$row=mysqli_fetch_array($run);

	$edit_id =  $row['f_id'];
	$e_name =   $row['f_name'];
	$e_price =   $row['f_price'];
?>


<html>
	<head>
		<title>Record Updation </title>
	</head>
<body style="background-color: #f1f1f1;">

		<form method='post' class="form-control border-0" style="background-color: #f1f1f1;" action="">
			<table class="table table-bordered w-25 p-3" align="center">
				<tr>
					<th  colspan="2" class="text-center" >Updating Form</th>
				</tr>
				<tr>
					<td align="right" >Food Name:</td>
					<td>
						<input type="text" class="form-control"  name="food_name1" value='<?php echo $e_name ;?>' >
					</td>

				</tr>
                <tr>
					<td align="right" >Food Price:</td>
					<td>
						<input type="text" class="form-control"  name="food_price1" value='<?php echo $e_price;?>' >
					</td>
				</tr>
				<tr>
					<td align="center" colspan="2">
						<input class="btn btn-success" type="submit" name="update" value="update">
					</td>
				</tr>
			</table>
		</form>
		
<?php
if(isset($_POST["update"]))
   {
	
	//  $edit_record1 = $_GET['edit'];   //use to catch data 
	  // logic to save data
	 
	 $food_name =   $_POST['food_name1'];
	 $food_price = $_POST['food_price1'];
 // applying query
	 
$query1="UPDATE food SET f_name='$food_name',f_price='$food_price' where f_id='$edit_record'";
	if(mysqli_query($conn,$query1))
	{
	   echo "<script>window.open('list_food.php?updated=Record Has Been Updated','_self')</script>";
	}
	else{
		echo "<div class='alert alert-danger' role='alert'> <b> Error!!! </b> <br>This Number is already in use. Please check the number you are trying to update</div>";
	}

}

?>
		<?php include 'footer.php';?>
	</body>
</html>

