
<?php include 'conn.php';
include 'components.php'; 
include 'header.php';?>
<html>
<body style="background-color: #f1f1f1;" >
<h3 align="center"> To Add new food detail: <a type="button" class="btn btn-success" href="add_food.php">Add New</a></h3>
<?php
if (!$conn)
  {
  die('Could not connect: ' . mysqli_error());
  }
$sql = "SELECT f_id, f_name, f_price FROM food";
$result = mysqli_query($conn,$sql);
echo "<table class='table table-bordered w-auto p-3' align='center'>
<tr>
<th>Food Id</th>
<th>Food Name</th>
<th>Food Price</th>
<th>Action</th>
</tr>";
while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['f_id'] . "</td>";
  echo "<td>" . $row['f_name'] . "</td>";
  echo "<td>" . $row['f_price'] . "</td>";
  $id=$row['f_id'];
  echo "<td>" . "<a class='btn btn-primary' href='edit_food.php?edit=$id'>Edit</a>"."\t "."<a class='btn btn-danger' href='delete_food.php?del=$id'>Delete</a>". "</td>";
  echo "</tr>";
  }
echo "</table>";
mysqli_close($conn);
?>
<?php include 'footer.php' ?>
</body>

</html>
