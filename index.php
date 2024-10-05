<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Canteen Management</title>
</head>
<body>
    <h1>Welcome to Canteen Management System</h1>
    <p>Please select your role:</p>
    <form action="index.php" method="POST">
        <button type="submit" name="role" value="admin">Admin Login</button>
        <button type="submit" name="role" value="salesman">Salesman Login</button>
    </form>

    <?php
    // PHP script to handle redirection based on the user's choice
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $role = $_POST['role'];
        if ($role == "admin") {
            header("Location: Admin/adminlogin.php"); // Redirect to the admin login page
            exit();
        } elseif ($role == "salesman") {
            header("Location: Admin/salesmanlogin.php"); // Redirect to the salesman login page
            exit();
        }
    }
    ?>
</body>
</html>
