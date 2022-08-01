<?php include 'conn.php';
include 'components.php'; 
include 'header.php';?>
<?php
if(isset($_POST["update"]))
   {

    $student_name =   $_POST['student_name1'];
    $student_email  =  $_POST['student_email1'];
    $student_contact = $_POST['student_contact1'];
    $student_location = $_POST['student_location1'];


    $query1="INSERT INTO `student` (`s_id`, `s_name`, `s_email`, `s_contact`, `s_location`) VALUES (NULL, '$student_name', '$student_email', '$student_contact', '$student_location')";
    if(mysqli_query($conn,$query1))
	{
	   echo "<script>window.open('list_student.php?updated=Record Has Been Updated','_self')</script>";
	}
	else{
		echo "<div class='alert alert-danger' role='alert'> <b> Error!!! </b> <br>This Number is already in use. Please check the number you are trying to update</div>";
	}
}

?>
<html>
	<head>
		<title>New Record Addition </title>
	</head>
<body bgcolor="#EEFDEF" style="background-color: #f1f1f1;">
		<form method='post' class="form-control border-0" style="background-color: #f1f1f1;" action="">
			<table class="table table-bordered w-25 p-3" align="center">
				<tr>
					<th  colspan="2" class="text-center" >Addition Form</th>
				</tr>
				<tr>
					<td align="right" >Student Name:</td>
					<td>
						<input type="text" class="form-control"  name="student_name1" >
					</td>

				</tr>
				<tr>
					<td align="right" >Student Email:</td>
					<td>
						<input type="text" class="form-control"  name="student_email1">
					</td>
				</tr>
				<tr>
					<td align="right" >Student Contact Number:</td>
					<td>
						<input type="text" class="form-control" name="student_contact1" >
					</td>
				</tr>
				<tr>
					<td align="right" >Student Location:</td>
					<td>
						<input type="text" class="form-control" name="student_location1" >
					</td>
				</tr>
				<tr>
					<td align="center" colspan="2">
						<input class="btn btn-success" type="submit" name="update" value="Add New">
					</td>
				</tr>
			</table>
		</form>
		<?php include 'footer.php';?>
	</body>
</html>
