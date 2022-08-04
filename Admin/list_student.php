
<?php  include 'header.php';?>
<?php  
include 'conn.php';
include 'components.php';
?>



<html>
<body style="background-color: #f1f1f1;" >
<h3 align="center"> To Add new Student detail: <a type="button" class="btn btn-success" href="add_student.php">Add New</a></h3>
<?php
if (!$conn)
  {
  die('Could not connect: ' . mysqli_error());
  }
$sql = "SELECT s_id, s_name, s_email, s_contact, s_location FROM student";
$result = mysqli_query($conn,$sql);
echo "<table class='table table-bordered w-auto p-3' align='center' color='white'>
<tr>
<th >Student Id</th>
<th >Name</th>
<th >Email</th>
<th >Contact</th>
<th >Location</th>
<th >Action</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['s_id'] . "</td>";
  echo "<td>" . $row['s_name'] . "</td>";
  echo "<td>" . $row['s_email'] . "</td>";
  echo "<td>" . $row['s_contact'] . "</td>";
  echo "<td>" . $row['s_location'] . "</td>";
  $id=$row['s_id'];
  echo "<td>"."<a class='btn btn-primary' href='edit_student.php?edit=$id'>Edit</a>"." \t"."<a class='btn btn-danger' href='delete_student.php?del=$id'>delete</a>"."</td>";

  echo "</tr>";
  }
echo "</table>";
mysqli_close($conn);
?>
<?php include 'footer.php';?>
</body>
</html>

