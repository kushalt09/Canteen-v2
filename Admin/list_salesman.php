<?php  include 'header.php';?>
<?php  
include 'conn.php';
include 'components.php';
?>


<html>
<body style="background-color: #f1f1f1;" >
<h3 align="center"> To Add new salesman detail: <a type="button" class="btn btn-success" href="add_salesman.php">Add New</a></h3>
<?php
if (!$conn)
  {
  die('Could not connect: ' . mysqli_error());
  }
$sql = "SELECT sm_id, sm_name, sm_email, sm_number, sm_location, sm_pass FROM salesman";
$result = mysqli_query($conn,$sql);
echo "<table class='table table-bordered w-auto p-3' align='center' color='white'>
<tr>
<th >salesman Id</th>
<th >Name</th>
<th >Email</th>
<th >Contact</th>
<th >Location</th>
<th> password</th>
<th >Action</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['sm_id'] . "</td>";
  echo "<td>" . $row['sm_name'] . "</td>";
  echo "<td>" . $row['sm_email'] . "</td>";
  echo "<td>" . $row['sm_number'] . "</td>";
  echo "<td>" . $row['sm_location'] . "</td>";
  echo "<td>" . $row['sm_pass']. "</td>";
  $id=$row['sm_id'];
  echo "<td>"."<a class='btn btn-primary' href='edit_salesman.php?edit=$id'>Edit</a>"." \t"."<a class='btn btn-danger' href='delete_salesman.php?del=$id'>delete</a>"."</td>";

  echo "</tr>";
  }
echo "</table>";
mysqli_close($conn);
?>
<?php include 'footer.php';?>
</body>
</html>

