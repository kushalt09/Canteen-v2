<?php include 'header.php'; 
include 'conn.php';
include 'components.php'; 
?>
<?php

$edit_record=@$_GET['edit'];
$query = "select * from student where s_id ='$edit_record' ";
$run= mysqli_query($conn,$query);

$row=mysqli_fetch_array($run);

	$edit_id =  $row['s_id'];
	$e_name =   $row['s_name'];
	$e_email = $row['s_email'];
	$e_contact = $row['s_contact'];
	$e_location =   $row['s_location'];

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
					<td align="right" >Student Name:</td>
					<td>
						<input type="text" class="form-control"  name="student_name1" value='<?php echo $e_name ;?>' >
					</td>

				</tr>
				<tr>
					<td align="right" >Student Email:</td>
					<td>
						<input type="text" class="form-control"  name="student_email1" value='<?php echo $e_email;?>' >
					</td>
				</tr>
				<tr>
					<td align="right" >Student Contact Number:</td>
					<td>
						<input type="text" class="form-control" name="student_contact1" value='<?php echo $e_contact;?>' >
					</td>
				</tr>
				<tr>
					<td align="right" >Student Location:</td>
					<td>
						<input type="text" class="form-control" name="student_location1" value='<?php echo $e_location;?>' >
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
	 
	 $student_name =   $_POST['student_name1'];
	 $student_email  =  $_POST['student_email1'];
	 $student_contact = $_POST['student_contact1'];
	 $student_location = $_POST['student_location1'];
 // applying query
	 
$query1="UPDATE student SET s_name='$student_name',s_email='$student_email' ,s_contact='$student_contact' ,s_location='$student_location' where s_id='$edit_record'";
	if(mysqli_query($conn,$query1))
	{
	   echo "<script>window.open('list_student.php?updated=Record Has Been Updated','_self')</script>";
	}
	else{
		echo "<div class='alert alert-danger' role='alert'> <b> Error!!! </b> <br>This Number is already in use. Please check the number you are trying to update</div>";
	}

}

?>
		<?php include 'footer.php';?>
	</body>
</html>

