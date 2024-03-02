<?php
// Include your database connection file or establish a connection here
include('dbcon.php'); // replace with your actual connection file or code

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $fname = $_POST['dname'];
    $gender = $_POST['gender'];
    $licno = $_POST['licno'];
    $address = $_POST['address'];
    $birthday = $_POST['birthday'];
    $phone = $_POST['phone'];
    $email = $_POST['demail'];
    $department = $_POST['department'];
    $specialization = $_POST['specialization'];
    

    // Insert data into the "doctor" table
    $insert_query = "INSERT INTO doctor (dname, gender, licno, address, birthday, contact, demail, department, specialization) 
                    VALUES ('$fname', '$gender', '$licno', '$address', '$birthday', '$phone', '$email', '$department', '$specialization')";

    if (mysqli_query($con, $insert_query)) {
        // Insert successful
        echo "<script> window.location.replace('../admindoctors.php');</script>";
    } else {
        // Insert failed
        echo "Error: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}

?>
