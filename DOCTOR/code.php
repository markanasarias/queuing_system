<?php
// Include the database connection file
include 'dbcon.php';

// Check if the ID is set in the POST data
if (isset($_POST['id'])) {
    // Get the ID from the AJAX request
    $id = $_POST['id'];

    // Update the status in the database (replace 'your_table_name' with your actual table name)
    $sql = "UPDATE queue SET status = 1 WHERE id = $id";

    if ($con->query($sql) === TRUE) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . $con->error;
    }
} else {
    echo "ID not set in the request.";
}

$con->close();
?>