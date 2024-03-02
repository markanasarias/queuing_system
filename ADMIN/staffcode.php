<?php
// Include your database connection file or establish a connection here
include('dbcon.php'); // replace with your actual connection file or code

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $birthday = $_POST['birthday'];
    $phone = $_POST['contact'];
    $email = $_POST['email'];
    $ecname = $_POST['ecname'];
    $ecphone = $_POST['ecphone'];
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $passwordHast = md5($password);
    

    // Insert data into the "staff" table
    $insert_query = "INSERT INTO staff (fname, lname, mname, gender, address, birthday, contact, email, ec_name, ec_contact, user, pass) 
                    VALUES ('$fname', '$lname', '$mname', '$gender', '$address', '$birthday', '$phone', '$email', '$ecname', '$ecphone', '$username', '$password')";

    if (mysqli_query($con, $insert_query)) {
        // Insert successful
        echo "<script>
                window.location.replace('../adminstaff.php');
            </script>";
        
    } else {
        // Insert failed
        echo "Error: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>
