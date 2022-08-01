<?php include 'header.php'; 
include 'conn.php';
include 'components.php'; 
?>
<?php

$edit_record=@$_GET['edit'];
$query = "select * from salesman where sm_id ='$edit_record' ";
$run= mysqli_query($conn,$query);

$row=mysqli_fetch_array($run);

	$edit_id =  $row['sm_id'];
	$e_name =   $row['sm_name'];
	$e_email = $row['sm_email'];
	$e_number = $row['sm_number'];
	$e_location = $row['sm_location'];
    $e_pass =   $row['sm_pass'];

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
					<td align="right" >Salesman Name:</td>
					<td>
						<input type="text" class="form-control"  name="salesman_name1" value='<?php echo $e_name ;?>' >
					</td>

				</tr>
				<tr>
					<td align="right" >Salesman Email:</td>
					<td>
						<input type="text" class="form-control"  name="salesman_email1" value='<?php echo $e_email;?>' >
					</td>
				</tr>
				<tr>
					<td align="right" >Salesman Contact Number:</td>
					<td>
						<input type="text" class="form-control" name="salesman_number1" value='<?php echo $e_number;?>' >
					</td>
				</tr>
				<tr>
					<td align="right" >Salesman Location:</td>
					<td>
						<input type="text" class="form-control" name="salesman_location1" value='<?php echo $e_location;?>' >
					</td>
				</tr>
                <tr>
					<td align="right" >Salesman Password:</td>
					<td>
						<input type="text" class="form-control" name="salesman_pass1" value='<?php echo $e_pass;?>' >
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
	 
	 $salesman_name =   $_POST['salesman_name1'];
	 $salesman_email  =  $_POST['salesman_email1'];
	 $salesman_number = $_POST['salesman_number1'];
	 $salesman_location = $_POST['salesman_location1'];
     $salesman_pass = $_POST['salesman_pass1'];
 // applying query
	 
$query1="UPDATE salesman SET sm_name='$salesman_name',sm_email='$salesman_email' ,sm_number='$salesman_number' ,sm_location='$salesman_location' ,sm_pass='$salesman_pass' where sm_id='$edit_record'";
	if(mysqli_query($conn,$query1))
	{
	   echo "<script>window.open('list_salesman.php?updated=Record Has Been Updated','_self')</script>";
	}
	else{
		echo "<div class='alert alert-danger' role='alert'> <b> Error!!! </b> <br>This Number is already in use. Please check the number you are trying to update</div>";
	}

}

?>
		<?php include 'footer.php';?>
	</body>
</html>

