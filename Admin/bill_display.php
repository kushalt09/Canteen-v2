<?php 
include 'conn.php';
include 'components.php'; 
include 'header.php';
?>
<!DOCTYPE html>
<html>
<body>

<form action="" method="GET" style="position: relative; text-align: center;">
    <input id="search" name="s_name" type="text" value="<?php echo isset($_GET['s_name']) ? htmlspecialchars($_GET['s_name']) : ''; ?>" placeholder="Type here">
    <input id="submit" type="submit" value="Search">
    <span id="clear" onclick="clearSearch()" style="position: absolute; right: 20px; cursor: pointer; color: #111; top: 50%; transform: translateY(-50%);">&#x274C;</span>
</form>

<script>
    function clearSearch() {
        document.getElementById('search').value = ''; // Clear the search input
        document.getElementById('submit').click(); // Trigger the search
    }

    // Optional: Hide the clear icon when the input is empty
    const searchInput = document.getElementById('search');
    const clearButton = document.getElementById('clear');
    
    // Hide or show clear button based on input
    searchInput.addEventListener('input', function() {
        clearButton.style.display = searchInput.value.length > 0 ? 'block' : 'none';
    });

    // On page load, decide whether to show the clear button
    window.onload = function() {
        clearButton.style.display = searchInput.value.length > 0 ? 'block' : 'none';
    };
</script>


<h1 style="text-align: center;">Students list</h1>

<table class="table table-bordered table-responsive table-striped table-hover table-condensed text-center">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Operation</th>
    </thead>
    <tbody>
        <?php
        if (isset($_GET['s_name']) && !empty($_GET['s_name'])) {
            $s_name = mysqli_real_escape_string($conn, $_GET['s_name']);
            $selectquery = "SELECT * FROM student WHERE s_name LIKE '%$s_name%'";
        } else {
            $selectquery = "SELECT * FROM student";
        }
        $query = mysqli_query($conn, $selectquery);
        while ($result = mysqli_fetch_assoc($query)) {
        ?>
            <tr>
                <td><?php echo $result['s_id']; ?></td>
                <td><?php echo htmlspecialchars($result['s_name']); ?></td>
                <td><?php echo htmlspecialchars($result['s_email']); ?></td>
                <td><?php echo htmlspecialchars($result['s_contact']); ?></td>
                <td>
                    <form method="GET" action="test.php">
                        <input type="hidden" name="id" value="<?php echo $result['s_id']; ?>">
                        <input type="submit" name="display" value="Create bill">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

</body>
</html>
<?php include 'footer.php'; ?>
