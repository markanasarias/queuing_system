<?php
require 'dbcon.php';
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Queuing </h1>
    <br>
    <div class="card shadow mb-4" id="tablecard">
    <div class="card-header py-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addemployeemodal">
    + Add New
    </button>
    </div>
    <div class="card-body">
        <div class="table-responsive"  id="table-responsive-id">
            <table class="table table-striped" id="dataTabledoctor">
                <thead>
                    <th>Patient ID</th>
                    <th>Patient Name</th>
                    <th>Queuing Number</th>
                    <th>Doctor</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th>Action</th>
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
            
            // Fetch doctor details based on doctorid
            $doctor_query = "SELECT * FROM doctor WHERE id = " . $student['doctorid'];
            $doctor_query_run = mysqli_query($con, $doctor_query);

            // Check if patient and doctor details are fetched successfully
            if ($patient_query_run && mysqli_num_rows($patient_query_run) > 0 && $doctor_query_run && mysqli_num_rows($doctor_query_run) > 0) {
                $patient = mysqli_fetch_assoc($patient_query_run);
                $doctor = mysqli_fetch_assoc($doctor_query_run);
?>
                <tr>
                    <td><?= $student['patientid']; ?></td>
                    <td><?= $patient['fname'] . ' ' . $patient['mname'] . ' ' . $patient['lname']; ?></td>
                    <td><?= $student['number']; ?></td>
                    <td><?= $doctor['dname']; ?></td> <!-- Adjust the column name accordingly -->
                    <td><?= $student['department']; ?></td>
                    <td><?= ($student['status'] == 0) ? "Active" : "Inactive"; ?></td>
                    <td>
                        <a href="membereditlayout.php?id=<?= $student['id']; ?>">
                            <button id="member-edit-btn" class="btn text-primary" name="member-edit-btn"><i class="fas fa-fw fa-pen"></i></button>
                        </a>      
                    </td>
                </tr>
<?php
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
<!-- Modal -->
<div class="modal fade" id="addemployeemodal" data-bs-backdrop="static" tabindex="-1"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Queuing</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php
$fetch_names_query = "SELECT id, fname, mname, lname FROM patient";
$fetch_names_query_run = mysqli_query($con, $fetch_names_query);
?>
            <form method="post" action="./STAFF/queuingcode.php">
            <div class="form-floating">
                    <select class="form-select" id="qpatientname" name="qpatientname"
                      aria-label="Floating label select example">
                      <option selected>Choose</option>
                      <?php
            // Loop through the fetched patient data and populate the dropdown options
            while ($row = mysqli_fetch_assoc($fetch_names_query_run)) {
                $patientId = $row['id'];
                $fname = $row['fname'];
                $mname = $row['mname'];
                $lname = $row['lname'];
                echo "<option value='$patientId'>$fname $mname $lname</option>";
            }
            ?>
                    </select>
                    <label for="floatingSelectGrid">Patient Name</label>
                  </div>
                  <br>
                  <?php
                        $fetch_names_query = "SELECT id, name FROM department";
                        $fetch_names_query_run = mysqli_query($con, $fetch_names_query);
                    ?>
                  <div class="form-floating">
                    <select class="form-select" id="qdepartment" name="qdepartment"
                      aria-label="Floating label select example">
                      <option selected>Choose</option>
                      <?php
            // Loop through the fetched patient data and populate the dropdown options
            while ($row = mysqli_fetch_assoc($fetch_names_query_run)) {
                $patientId = $row['id'];
                $name = $row['name'];
                echo "<option value='$patientId'>$name</option>";
            }
            ?>
                    </select>
                    <label for="floatingSelectGrid">Department</label>
                  </div>
                  <br>
                  <?php
$fetch_names_query = "SELECT id, dname FROM doctor";
$fetch_names_query_run = mysqli_query($con, $fetch_names_query);
?>
                  <div class="form-floating">
                    <select class="form-select" id="qdname" name="qdname"
                      aria-label="Floating label select example">
                      <option selected>Choose</option>
                      <?php
            // Loop through the fetched patient data and populate the dropdown options
            while ($row = mysqli_fetch_assoc($fetch_names_query_run)) {
                $patientId = $row['id'];
                $fname = $row['dname'];
                echo "<option value='$patientId'>$fname $mname $lname</option>";
            }
            ?>
                    </select>
                    <label for="floatingSelectGrid">Doctors</label>
                  </div>
                  <br>
      <div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="queuingsavebtn">Save</button>
      </div>
    </div>
    </form>
  </div>
</div>









