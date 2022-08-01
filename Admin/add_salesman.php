<?php include 'conn.php';
include 'components.php'; 
include 'header.php';?>
<?php
if(isset($_POST["update"]))
   {

    $salesman_name =   $_POST['salesman_name1'];
    $salesman_email  =  $_POST['salesman_email1'];
    $salesman_contact = $_POST['salesman_contact1'];
    $salesman_location = $_POST['salesman_location1'];
	$salesman_password = $_POST['salesman_password1'];


    $query1="INSERT INTO `salesman` (`sm_id`, `sm_name`, `sm_email`, `sm_number`, `sm_location`,`sm_pass`) VALUES (NULL, '$salesman_name', '$salesman_email', '$salesman_contact', '$salesman_location','$salesman_password')";
    if(mysqli_query($conn,$query1))
	{
	   echo "<script>window.open('list_salesman.php?updated=Record Has Been Updated','_self')</script>";
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
					<td align="right" >salesman Name:</td>
					<td>
						<input type="text" class="form-control"  name="salesman_name1" >
					</td>

				</tr>
				<tr>
					<td align="right" >salesman Email:</td>
					<td>
						<input type="text" class="form-control"  name="salesman_email1">
					</td>
				</tr>
				<tr>
					<td align="right" >salesman Contact Number:</td>
					<td>
						<input type="text" class="form-control" name="salesman_contact1" >
					</td>
				</tr>
				<tr>
					<td align="right" >salesman Location:</td>
					<td>
						<input type="text" class="form-control" name="salesman_location1" >
					</td>
				</tr>
				<tr>
					<td align="right" >salesman Password:</td>
					<td>
						<input type="password" class="form-control"  name="salesman_password1" >
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
