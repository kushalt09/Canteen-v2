<?php include 'conn.php';
include 'components.php'; 
include 'header.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        body{
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
    </style>
</head>
<body>
<?php 
    require('conn.php');
    
    if(isset($_GET['s_id'])){
    //     header('location:bill_display.php');
    // }else {
    $id = $_GET['s_id'];
        }
    
            
   // // $test_record= $_GET('id');
   // $id= $_GET['s_id'];
    $select ="SELECT foodordered.o_id, food.f_id,food.f_name,foodordered.quantity,food.f_price,student.s_id,student.s_name, student.s_email,student.s_contact,student.s_location, foodordered.fo_ts,(foodordered.quantity*food.f_price) AS Total FROM foodordered INNER JOIN food ON foodordered.f_ids=f_id INNER JOIN student ON foodordered.s_ids=student.s_id where student.s_id=$id";
        //$select="Select s_id,s_name,s_email,s_contact,s_location from student where s_id=$id ";
    $selectdata = mysqli_query($conn, $select);

    $show = "select * from student where s_id = $id";


    $showdata = mysqli_query($conn, $show);
    if ($showdata->num_rows > 0){
            $row = mysqli_fetch_array($showdata); 
            $s_id = $row['s_id'];
            $s_name = $row['s_name'];
            $s_email = $row['s_email']; 
            $s_contact = $row['s_contact'];
            $s_location = $row['s_location'];
           $s_advance = $row['advance'];
    }
?>
  
    <div class="container">
        

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h2 class="heading">Invoice No.:<input type="text" name="email" value="<?php echo $s_id; ?>"readonly> </h2>
                    <p class="sub-heading"> Date:<?php echo date('d F, Y (l)'); ?> </p>
                    <p class="sub-heading">Email Address:<input type="text" name="email" value="<?php echo $s_email; ?>" readonly>  </p>
                </div>
                <div class="col-6">
                    <p class="sub-heading">Full Name:<input type="text" name="first" value="<?php echo $s_name; ?>"readonly> </p>
                    <p class="sub-heading">Address:<input type="text" name="address" value="<?php echo $s_location; ?>"readonly>  </p>
                    <p class="sub-heading">Phone Number:<input type="text" name="contact" value="<?php echo $s_contact; ?>"readonly>  </p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Ordered Items</h3>
            <br>
            <table class="table-bordered">
                
                    <tr>
                        <th style="text-align:center">Foods</th>
                        <th  style="text-align:center" class="w-20">Price</th>
                        
                        <!-- <th class="w-20">Grandtotal</th> -->
                    </tr>
                
                
                
                    <?php
                    $ftotal=0;
                        while($result = mysqli_fetch_array($selectdata)){
                        echo "<tr>";
                        echo "<td>" . $result['f_name'] . "</td>";
                        echo "<td>" .$result['f_price']. "</td>";
                        //  echo "<td>" .  $result['total'] . "</td>";
                        $ftotal= $ftotal+$result['f_price'];
                        echo "</tr>";
                        

                }
                
                // mysqli_close($conn);
                ?>
                <tr>
                    <th style="text-align:right">total</th>
                    <td><?php echo $ftotal; ?></td>
                </tr>
                <tr>
                    <th style="text-align:right">advance</th>
                    <td> <?php echo $s_advance; ?></td>
                </tr>
                <tr>
                    <th style="text-align:right">Due</th>
                    <td> <?php echo $ftotal-$s_advance; ?></td>
                </tr>
                    <!-- <?php echo $ftotal; ?>
                    <?php echo $s_advance; ?>
                    <?php echo $ftotal-$s_advance; ?> -->
                    <!-- <tr>
                        <td colspan="3" class="text-right">Sub Total</td>
                        <td> 10.XX</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Tax Total %1X</td>
                        <td> 2</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Grand Total</td>
                        <td> 12.XX</td>
                    </tr> -->
                </tbody>
            

            </table>
            <br>
            <!-- <h3 class="heading">Payment Status: Paid</h3>
            <h3 class="heading">Payment Mode: Cash on Delivery</h3> -->
        </div>

             
    </div>      

</body>
</html>
<?php include 'footer.php'?>
