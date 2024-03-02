<?php
// Include your database connection file or establish a connection here
include('dbcon.php'); // replace with your actual connection file or code

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $qpatientname = $_POST['qpatientname'];
    $qdepartment = $_POST['qdepartment'];
    $qdname = $_POST['qdname'];

    // Generate a unique queuing number
    $queuingNumber = generateQueuingNumber($con); // Pass the database connection

    if ($queuingNumber !== false) {
        // Get the current date
        $currentDate = date('Y-m-d');

        // Insert data into the "doctor" table along with the queuing number and date
        $insert_query = "INSERT INTO queue (patientid, department, doctorid, number, date_created) 
                        VALUES ('$qpatientname', '$qdepartment', '$qdname', '$queuingNumber', '$currentDate')";

        if (mysqli_query($con, $insert_query)) {
            // Insert successful
            echo "<script> window.location.replace('../staffqueuing.php');</script>";
        } else {
            // Insert failed
            echo "Error: " . mysqli_error($con);
        }
    } else {
        // Queuing number limit reached for the day
        echo "Queuing number limit reached for the day. Please try again tomorrow.";
    }

    // Close the database connection
    mysqli_close($con);
}

// Function to generate a unique queuing number (1 to 25)
function generateQueuingNumber($con) {
    // Get the current date
    $currentDate = date('Y-m-d');

    // Check if there are already 25 entries for the current date
    $count_query = "SELECT COUNT(*) as count FROM queue WHERE date_created = '$currentDate'";
    $result = mysqli_query($con, $count_query);
    $row = mysqli_fetch_assoc($result);

    if ($row['count'] < 25) {
        // Generate a unique queuing number (1 to 25)
        $queuingNumber = $row['count'] + 1;
        return $queuingNumber;
    } else {
        // Queuing number limit reached for the day
        return false;
    }
}
?>


