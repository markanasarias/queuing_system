<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_amante";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file or establish a connection here

    // Escape user inputs for security
    $patientname = mysqli_real_escape_string($connection, $_POST['patientname']);
    $patientlastname = mysqli_real_escape_string($connection, $_POST['patientlastname']);
    $patientmiddlename = mysqli_real_escape_string($connection, $_POST['patientmiddlename']);
    $patientcivilstatus = mysqli_real_escape_string($connection, $_POST['patientcivilstatus']);
    $patientgender = mysqli_real_escape_string($connection, $_POST['patientgender']);
    $patientaddress = mysqli_real_escape_string($connection, $_POST['patientaddress']);
    $patientbirthday = mysqli_real_escape_string($connection, $_POST['patientbirthday']);
    $patientphone = mysqli_real_escape_string($connection, $_POST['patientphone']);
    $patientemail = mysqli_real_escape_string($connection, $_POST['patientemail']);
    $emergencycontactname = mysqli_real_escape_string($connection, $_POST['emergencycontactname']);
    $emergencycontactrelation = mysqli_real_escape_string($connection, $_POST['emergencycontactrelation']);
    $emergencycontactphone = mysqli_real_escape_string($connection, $_POST['emergencycontactphone']);

    // SQL query to insert data into the database
    $sql = "INSERT INTO patient (fname, lname, mname, civil_status, 
            gender, address, birthday, contact, email, 
            ec_name, ec_relation, ec_contact)
            VALUES ('$patientname', '$patientlastname', '$patientmiddlename', '$patientcivilstatus', 
            '$patientgender', '$patientaddress', '$patientbirthday', '$patientphone', '$patientemail', 
            '$emergencycontactname', '$emergencycontactrelation', '$emergencycontactphone')";

    // Perform the query
    if (mysqli_query($connection, $sql)) {
        echo "<script>
        window.location.replace('../adminpatient.php');
    </script>";
    } else {
        echo "ERROR: Could not execute $sql. " . mysqli_error($connection);
    }

    // Close the database connection
    mysqli_close($connection);
}


?>

