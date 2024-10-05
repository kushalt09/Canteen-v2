<?php 
require_once 'conn.php';
include 'components.php'; 
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $student_id = intval($_GET['id']);
} else {
    // If the ID is not valid, stop further processing and show an error
    die("<p class='error'>Invalid Invoice Request. Please check the ID and try again.</p>");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - Company Name</title>
    <style>
        @media print {
            .no-print, .no-print * {
                display: none !important;
            }
            .container, .body-section {
                width: 100%;
                margin: 0;
                padding: 0;
                background-color: transparent;
                box-shadow: none;
                border: none;
            }
        }
        body {
            background-color: #F6F6F6; 
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .brand-section {
            background-color: #333;
            color: #fff;
            padding: 10px 40px;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
            align-items: center;
        }
        .col-6 {
            width: 50%;
            flex: 0 0 auto;
        }
        .company-details {
            text-align: right;
        }
        .body-section {
            padding: 16px;
            border-top: 2px solid #eee;
        }
        .heading {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }
        .sub-heading {
            color: #555;
            margin-bottom: 5px;
            font-size: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .print-button {
            display: block;
            width: max-content;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #4CAF50; /* Green */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }
        .error {
            color: #ff0000;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class=" no-print">
    <?php include 'header.php'; // This will include the header but mark it to not print ?>
</div>

<div class="container">
    <?php 
    if ($student_id) {
        $stmt = $conn->prepare("SELECT foodordered.o_id, food.f_id, food.f_name, foodordered.quantity, food.f_price, student.s_id, student.s_name, student.s_email, student.s_contact, student.s_location, foodordered.fo_ts, (foodordered.quantity * food.f_price) AS Total FROM foodordered INNER JOIN food ON foodordered.f_ids = food.f_id INNER JOIN student ON foodordered.s_ids = student.s_id WHERE student.s_id = ?");
        $stmt->bind_param("i", $student_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0 && $row = $result->fetch_assoc()) {
    ?>
    <div class="brand-section">
        <div class="row">
            <div class="col-6">
                <h1>Invoice Details</h1>
            </div>
            <div class="col-6 company-details">
                <p>Canteen Management System</p>
                <p>Balaju, Kathmandu</p>
            </div>
        </div>
    </div>
    <div class="body-section">
        <button onclick="window.print();" class="print-button">Print this invoice</button>
        <div class="row">
            <div class="col-6">
                <h2 class="heading">Invoice No.: <span><?php echo htmlspecialchars($row['o_id']); ?></span></h2>
                <p class="sub-heading">Date: <?php echo date('d F, Y'); ?></p>
                <p class="sub-heading">Email Address: <span><?php echo htmlspecialchars($row['s_email']); ?></span></p>
            </div>
            <div class="col-6 company-details">
                <p class="sub-heading">Full Name: <span><?php echo htmlspecialchars($row['s_name']); ?></span></p>
                <p class="sub-heading">Address: <span><?php echo htmlspecialchars($row['s_location']); ?></span></p>
                <p class="sub-heading">Phone Number: <span><?php echo htmlspecialchars($row['s_contact']); ?></span></p>
            </div>
        </div>
    </div>

    <div class="body-section">
        <h3 class="heading">Ordered Items</h3>
        <table>
            <thead>
                <tr>
                    <th>Foods</th>
                    <th class="w-20">Price</th>
                    <th class="w-20">Quantity</th>
                    <th class="w-20">Grand Total</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $subtotal = 0;
            do {
                $subtotal += $row['Total'];
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['f_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['f_price']); ?></td>
                    <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                    <td><?php echo htmlspecialchars($row['Total']); ?></td>
                </tr>
                <?php 
            } while ($row = $result->fetch_assoc());
            ?>
                <tr>
                    <td colspan="3" class="text-right">Sub Total</td>
                    <td><?php echo number_format($subtotal, 2); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right">Tax Total %10</td>
                    <td><?php echo number_format($subtotal * 0.10, 2); ?></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right">Grand Total</td>
                    <td><?php echo number_format($subtotal * 1.10, 2); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php 
        } else {
            echo "<p>No invoice details available for the selected student.</p>";
        }
    }
    ?>
</div>

<div class="no-print">
    <?php include 'footer.php'; ?>
</div>

</body>
</html>
