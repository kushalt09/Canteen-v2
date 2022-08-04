<?php include 'conn.php';
include 'components.php'; 
include 'salesman_header.php';?>
<?php

$edit_record=@$_GET['edit'];
$query = "select * from foodordered where o_id ='$edit_record' ";
$run= mysqli_query($conn,$query);

$row=mysqli_fetch_array($run);
	$edit_id =  $row['o_id'];
	$e_s_ids =   $row['s_ids'];
	$e_f_ids = $row['f_ids'];
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
					<td align="right" >Student Id:</td>
					<td>
						<input type="text" class="form-control " value='<?php echo $e_s_ids ;?>' disabled >
						</select>
					</td>

				</tr>
				<tr>
					<td align="right" >Food Id:</td>
					<td>
						<select name="food_ids1" value='<?php echo $e_f_ids;?>'>
						<option disabled selected>-Food ID -</option>
						<?php
						$query3="Select f_id From food";
						$records=mysqli_query($conn,$query3);
						while ($data = mysqli_fetch_array($records)){
							echo "<option name='".$data['food_ids1']."'>".$data['f_id']."</option>";
						}
						?>
						</select>
					</td>
				</tr>
				<tr>
					<td align="center" colspan="2">
						<input class="btn btn-success" type="submit" name="update" value="Update">
					</td>
				</tr>
			</table>
		</form>
		

<?php
if(isset($_POST["update"]))
   {
	
	 
	 $student_ids =  $e_s_ids;
	 $food_ids  =  $_POST['food_ids1'];
 // applying query
	 
$query1="UPDATE foodordered SET s_ids='$student_ids',f_ids='$food_ids'where o_id='$edit_record'";
	if(mysqli_query($conn,$query1))
	{
	   echo "<script>window.open('list_foodordered.php?updated=Record Has Been Updated','_self')</script>";
	}
	else{
		echo "<div class='alert alert-danger' role='alert'> <b> Error!!! </b> <br>The entered data is not valid!! Please try again</div>";
	
}

}

?>
		<?php include 'footer.php';?>
	</body>
</html>
