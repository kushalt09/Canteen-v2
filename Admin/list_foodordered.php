<?php include 'conn.php';
include 'components.php'; 
include 'salesman_header.php';?>
<html>
<body style="background-color: #f1f1f1;" >
<h3 align="center"> To Add new order detail: <a type="button" class="btn btn-success" href="add_foodordered.php">Add New</a></h3>
<?php
if (!$conn)
  {
  die('Could not connect: ' . mysqli_error());
  }
// $sql = "SELECT o_id, s_ids, f_ids FROM foodordered";
$query="SELECT foodordered.o_id, food.f_id,food.f_name,food.f_price,student.s_id,student.s_name, student.s_email,student.s_contact,student.s_location, foodordered.fo_ts FROM foodordered INNER JOIN food ON foodordered.f_ids=f_id INNER JOIN student ON foodordered.s_ids=student.s_id";


$result = mysqli_query($conn,$query);



echo "<table class='table table-orderes w-auto p-3 table-responsive' align='center'>
<tr>
<th>FoodOrdered Id</th>
<th>Food Id</th>
<th>Food Name</th>
<th>Food Price</th>
<th>Student ID</th>
<th>Student Name</th>
<th>Student Email</th>
<th>Student Contact</th>
<th>Student Location</th>
<th>Ordered Time</th>
<th>Action</th>
</tr>";
while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['o_id'] . "</td>";
  echo "<td>" . $row['f_id'] . "</td>";
  echo "<td>" . $row['f_name'] . "</td>";
  echo "<td>" . $row['f_price'] . "</td>";
  echo "<td>" . $row['s_id'] . "</td>";
  echo "<td>" . $row['s_name'] . "</td>";
  echo "<td>" . $row['s_email'] . "</td>";
  echo "<td>" . $row['s_contact'] . "</td>";
  echo "<td>" . $row['s_location'] . "</td>";
  echo "<td>" . $row['fo_ts'] . "</td>";

  $id=$row['o_id'];
  echo "<td>" . "<a class='btn btn-primary' href='edit_foodordered.php?edit=$id'>Edit</a>"."\t "."<a class='btn btn-danger' href='delete_foodordered.php?del=$id'>Delete</a>". "</td>";
  echo "</tr>";
  }
echo "</table>";
mysqli_close($conn);
?>
<?php include 'footer.php' ?>
</body>

</html>