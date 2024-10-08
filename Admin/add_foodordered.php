<?php 
include 'conn.php';
include 'components.php'; 
include 'salesman_header.php';

if (isset($_POST["update"])) {
    $student_name = $_POST['student_name1'];
    $food_name = $_POST['food_name1'];
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;

    // Validate quantity
    if ($quantity < 1) {
        echo "<div class='alert alert-danger' role='alert'>Error: Quantity must be at least 1.</div>";
    } else {
        $query9 = "SELECT s_id FROM student WHERE s_name = '$student_name'";
        $run9 = mysqli_query($conn, $query9);
        $row = mysqli_fetch_array($run9);
        $student_ids = $row['s_id'];

        $query8 = "SELECT f_id FROM food WHERE f_name = '$food_name'";
        $run8 = mysqli_query($conn, $query8);
        $row = mysqli_fetch_array($run8);
        $food_ids = $row['f_id'];

        $query1 = "INSERT INTO foodordered (o_id, s_ids, f_ids, quantity) VALUES (NULL, '$student_ids', '$food_ids', '$quantity')";
        if (mysqli_query($conn, $query1)) {
            echo "<script>window.open('list_foodordered.php?updated=Record Has Been Updated','_self')</script>";
        } else {
            echo "<div class='alert alert-danger' role='alert'> Error: This Number is already in use. Please check the number you are trying to update.</div>";
        }
    }
}
?>

<html>
    <head>
        <title>New Record Addition </title>
    </head>
<body style="background-color: #f1f1f1;">
    <form method='post' class="form-control border-0" style="background-color: #f1f1f1;" action="" >
        <table class="table table-bordered w-25 p-3" align="center">
            <tr>
                <th colspan="2" class="text-center">Adding Ordered Detail</th>
            </tr>
            <tr>
                <td align="right">Student Name:</td>
                <td>
                    <select name="student_name1">
                        <option disabled selected>- Student Name -</option>
                        <?php
                        $query2 = "SELECT s_name FROM student";
                        $records = mysqli_query($conn, $query2);
                        while ($data = mysqli_fetch_array($records)) {
                            echo "<option value='".$data['s_name']."'>".$data['s_name']."</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right">Food Name:</td>
                <td>
                    <select name="food_name1">
                        <option disabled selected>- Food Name -</option>
                        <?php
                        $query3 = "SELECT f_name FROM food";
                        $records = mysqli_query($conn, $query3);
                        while ($data = mysqli_fetch_array($records)) {
                            echo "<option value='".$data['f_name']."'>".$data['f_name']."</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right">Quantity:</td>
                <td><input type="number" name="quantity" min="1" value="1" required></td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input class="btn btn-success" type="submit" name="update" value="Add New">
                </td>
            </tr>
        </table>
    </form>
    <?php include 'footer.php'; ?>
</body>
</html>
