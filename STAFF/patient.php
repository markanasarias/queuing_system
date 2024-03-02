<?php
require 'dbcon.php';
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Patient List</h1>
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
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Birthday</th> 
                    <th>Gender</th>
                    <th>Civil Status</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                <?php 
                    $query = "SELECT * FROM patient";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0) {
                        foreach($query_run as $student) {
                    ?>
                    <tr>
                        <td><?= $student['fname']; ?></td>
                        <td><?= $student['mname']; ?></td>
                        <td><?= $student['lname']; ?></td>
                        <td><?= $student['birthday']; ?></td>
                        <td><?= $student['gender']; ?></td>
                        <td><?= $student['civil_status']; ?></td>
                        <td><?= $student['address']; ?></td>
                        <td><?= $student['contact']; ?></td>
                        <td><?= $student['email']; ?></td>
                        <td><?= ($student['status'] == 0) ? "Active" : "Inactive"; ?></td>
                        <td>
                        <a href="membereditlayout.php?id=<?= $student['id']; ?>">
                            <button id="member-edit-btn" class="btn text-primary" name="member-edit-btn"><i class="fas fa-fw fa-pen"></i></button>
                        </a>      
                    </td>
                    </tr>
                    <?php
                        }
                    } else {
                        echo "<h5> No Record Found </h5>";
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
    <div class="modal-content" style="width: 1300px; margin-left: -400px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Patient</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form method="post" action="./STAFF/pcode.php">
              <br>
              <div class="row g-3">
                <div class="col">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="patientname" id="patientname"
                      placeholder="First Name">
                    <label for="floatingInput">First Name</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="patientlastname" id="patientlastname"
                      placeholder="Last Name">
                    <label for="floatingInput">Last Name</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating"> 
                    <input type="text" class="form-control" name="patientmiddlename" id="patientmiddlename"
                      placeholder="Middle Name">
                    <label for="floatingInput">Middle Name</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="row g-3">
                <div class="col">
                  <div class="form-floating"> 
                    <select class="form-select" name="patientcivilstatus" id="patientcivilstatus"
                      aria-label="Floating label select example">
                      <option selected>Civil Status</option>
                      <option value="Single">Single</option>
                      <option value="Married">Married</option>
                      <option value="Others">Others</option>
                    </select>
                    <label for="floatingSelectGrid">Civil Status</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <select class="form-select" name="patientgender" id="patientgender"
                      aria-label="Floating label select example">
                      <option selected>Choose gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                    <label for="floatingSelectGrid">Gender</label>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="patientaddress" id="patientaddress"
                      placeholder="Address">
                    <label for="floatingInput">Address</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="row g-3">
                <div class="col">
                  <div class="form-floating">
                    <input type="date" class="form-control" name="patientbirthday" id="patientbirthday">
                    <label for="floatingInput">Birthday</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="number" class="form-control" name="patientphone" id="patientphone"
                      placeholder="Phone Number">
                    <label for="floatingInput">Phone Number</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="email" class="form-control" name="patientemail" id="patientemail"
                      placeholder="Email">
                    <label for="floatingInput">Email</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="row g-3">
                <div class="col">
                  <div class="form-floating">
                    <input type="etxt" class="form-control" name="emergencycontactname" id="emergencycontactname" placeholder="Phone Number">
                    <label for="floatingInput">Emergency Contact Name</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="text" class="form-control"  name="emergencycontactrelation" id="emergencycontactrelation"
                      placeholder="Phone Number">
                    <label for="floatingInput">Emergency Contact Relation</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="number" class="form-control"  name="emergencycontactphone" id="emergencycontactphone"
                      placeholder="Email">
                    <label for="floatingInput">Emergency Contact Phone</label>
                  </div>
                </div>
              </div>
              <br>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="employeesavebtn">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
  function updatePreview(input, target) {
        let file = input.files[0];
        let reader = new FileReader();
        
        reader.readAsDataURL(file);
        reader.onload = function () {
            let img = document.getElementById(target);
            // can also use "this.result"
            img.src = reader.result;
        }
    }
      $(document).ready(function() {
      new DataTable('#dataTabledoctor');
        });
  </script>