<?php include 'conn.php';
include 'components.php'; 
include 'header.php';?>
<?php
if(isset($_POST["update"]))
   {
    $food_name =   $_POST['food_name1'];
    $food_price = $_POST['food_price1'];

    $query1="INSERT INTO `food` (`f_id`, `f_name`, `f_price`) VALUES (NULL, '$food_name', '$food_price')";
    
    
    if(mysqli_query($conn,$query1))
	{
	   echo "<script>window.open('list_food.php?updated=Record Has Been Updated','_self')</script>";
	}
	else{
		echo "<div class='alert alert-danger' role='alert'> <b> Error!!! </b> <br>This Number is already in use. Please check the number you are trying to update</div>";
	echo $query1;
	}
}

?>

<html>

<body style="background-color: #f1f1f1;" >
		<form method='post' class="form-control border-0" style="background-color: #f1f1f1;" action="">
			<table class="table table-bordered w-25 p-3" align="center">
				<tr>
					<th  colspan="2" class="text-center" >Adding Food Detail</th>
				</tr>
				<tr>
					<td align="right" >Food Name:</td>
					<td>
						<input type="text" class="form-control"  name="food_name1">
					</td>

				</tr>
					<td align="right" >Food Price:</td>
					<td>
						<input type="text" class="form-control"  name="food_price1">
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

