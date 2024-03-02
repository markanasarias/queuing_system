<?php
// Include the database connection file
include 'dbcon.php';
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Queuing </h1>
    <br>
    <div class="card shadow mb-4" id="tablecard">
    <div class="card-header py-3">
    </div>
    <div class="card-body">
        <div class="table-responsive"  id="table-responsive-id">
            <table class="table table-striped" id="dataTabledoctor">
                <thead>
                    <th>Patient ID</th>
                    <th>Patient Name</th>
                    <th>Queuing Number</th>
                    <th>Status</th>
                </thead>
                <tbody>
                <?php 
    $query = "SELECT * FROM queue";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0) {
        foreach($query_run as $student) {
            // Fetch patient details based on patientid
            $patient_query = "SELECT * FROM patient WHERE id = " . $student['patientid'];
            $patient_query_run = mysqli_query($con, $patient_query);

            // Check if patient and doctor details are fetched successfully
            if ($patient_query_run && mysqli_num_rows($patient_query_run) > 0) {
                $patient = mysqli_fetch_assoc($patient_query_run);

                // Check if status is equal to 1
                if ($student['status'] == 1) {
?>
                    <tr>
                        <td><?= $student['patientid']; ?></td>
                        <td><?= $patient['fname'] . ' ' . $patient['mname'] . ' ' . $patient['lname']; ?></td>
                        <td><?= $student['number']; ?></td>
                        <td><?= ($student['status'] == 0) ? "Pending" : "Completed"; ?></td>
                    </tr>
<?php
                }
            }
        }
    } else {
        echo "<tr><td colspan='8'><h5>No Record Found</h5></td></tr>";
    }
?>


                </tbody>
            </table>
        </div>
    </div>
</div>
</div>