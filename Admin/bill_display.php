<?php include 'conn.php';
include 'components.php'; 
include 'header.php';?>
<html>
<body>

<form action=test.php" method="GET" style="text-align: center;">
<input id="search" name="s_name" type="text" value="<?php if(isset($_GET['s_name'])){echo $_GET['s_name'];} ?>"placeholder="Type here">
<input id="submit" type="submit" value="Search">
</form>
<?php 
    require('conn.php');          
?>

<h1 style="text-align: center;">Students list</h1>
<?php 
        $select = "SELECT s_id, s_name FROM student";
        $selectdata = $conn->query($select);

        if ($selectdata->num_rows > 0){
            while($row = mysqli_fetch_array($selectdata)) {

            $s_id = $row['s_id'];
            $s_name = $row['s_name'];
            
            }}
            ?>


<table class="table table-bordered table-responsive table-striped table-hover table-condensed text-center " >
<thead>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>contact</th>
    <!-- <th>Operation</th> -->
    <th>Operation</th>
</thead>
<tbody>
    <?php
        include "conn.php";
        $selectquery = " select * from student";
        $query = mysqli_query($conn,$selectquery );
        while($result = mysqli_fetch_assoc($query)){
    ?>
        <tr>
            <td><?php  echo $result['s_id']; ?></td>
                                    <!-- below username is same from db table which must be same  in echo $result[''] -->
            <td><?php  echo $result['s_name']; ?></td>
            <td><?php  echo $result['s_email']; ?></td>
            <td><?php  echo $result['s_contact']; ?></td>
           <?php $sid=$result['s_id']; ?>
            <td><form method="get" action="test.php?id=<?php  echo $sid ?>">
        <input type="submit" name="display" value="Create bill"></td>
            
        </tr>

    <?php
        }
    ?>
    </form>

</tbody>
</table>
</body>
</html>

<?php include 'footer.php'?>