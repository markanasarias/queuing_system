<?php
require 'dbcon.php';
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Staffs List</h1>
    <br>
    <div class="card shadow mb-4" id="tablecard">
    <div class="card-header py-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                <<?php 
                    $query = "SELECT * FROM staff";
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
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Staff</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="./ADMIN/staffcode.php"> 
              <br>
              <div class="row g-3">
                <div class="col">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="fname" name="fname"
                      placeholder="First Name" required>
                    <label for="floatingInput">First Name</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="lname" name="lname"
                      placeholder="Last Name" required>
                    <label for="floatingInput">Last Name</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="mname" name="mname"
                      placeholder="Middle Name" required>
                    <label for="floatingInput">Middle Name</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="row g-3">
                <div class="col">
                  <div class="form-floating">
                    <select class="form-select" id="gender" name="gender"
                      aria-label="Floating label select example" required>
                      <option selected>Choose gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                    <label for="floatingSelectGrid">Gender</label>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="address" name="address"
                      placeholder="Address" required>
                    <label for="floatingInput">Address</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="row g-3">
                <div class="col">
                  <div class="form-floating">
                    <input type="date" class="form-control" id="birthday" name="birthday" required>
                    <label for="floatingInput">Birthday</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="contact" name="contact"
                      placeholder="Phone Number" required>
                    <label for="floatingInput">Phone Number</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email"
                      placeholder="Email" required>
                    <label for="floatingInput">Email</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="row g-3">
                <div class="col">
                <?php
                        $fetch_names_query = "SELECT id, name FROM department";
                        $fetch_names_query_run = mysqli_query($con, $fetch_names_query);
                    ?>
                  <div class="form-floating">
                    <select class="form-select" id="department" name="department"
                      aria-label="Floating label select example" required>
                      <?php
            // Loop through the fetched patient data and populate the dropdown options
            while ($row = mysqli_fetch_assoc($fetch_names_query_run)) {
                $patientId = $row['id'];
                $name = $row['name'];
                echo "<option value='$patientId'>$name</option>";
            }
            ?>
                    </select>
                    <label for="employeedepartment">Department</label>
                  </div>
                </div>
              <br>
              <div class="row g-3">
                <br>
                <div class="col">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="ecname" name="ecname"
                      placeholder="Emergency Contact Name" required>
                    <label for="floatingInput">Emergency Contact Name</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="ecphone" name="ecphone"
                      placeholder="Emergency Contact Phone" required>
                    <label for="floatingInput">Emergency Contact Phone</label>
                  </div>
                </div>
                <div class="row g-3">
                <br>
                <div class="col">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="user" name="user"
                      placeholder="User name :" required>
                    <label for="floatingInput">User name</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="password" class="form-control" id="pass" name="pass"
                      placeholder="Password :" required>
                    <label for="floatingInput">Password</label>
                  </div>
                </div>
                </div>
              </div>  
      </div>
      <br>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
    </form>
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