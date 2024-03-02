<?php
// Include your database connection file
include_once 'dbcon.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $qpatientname = $_POST['qpatientname'];
    $qdepartment = $_POST['qdepartment'];
    $qdoctor = $_POST['qdoctor'];

    // Validate the data if needed

    // Insert data into the database
    $sql = "INSERT INTO queue (patientid, department, doctorid) VALUES (?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('sss', $qpatientname, $qdepartment, $qdoctor);

    if ($stmt->execute()) {
        // Data inserted successfully
        echo "Data inserted successfully";
    } else {
        // Error in insertion
        echo "Error: " . $stmt->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $con->close();
}
?>


