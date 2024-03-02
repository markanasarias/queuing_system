<?php
require 'dbcon.php';
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Doctors List</h1>
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
                    <th>id</th>
                    <th>Name</th>
                    <th>Birthday</th>
                    <th>License No.</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Specialization</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                <?php 
    $query = "SELECT * FROM doctor";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0) {
        foreach($query_run as $student) {
            // Calculate age based on birthday
            $birthday = new DateTime($student['birthday']);
            $currentDate = new DateTime();
            $age = $currentDate->diff($birthday)->y;
            ?>
                    <tr>
                        <td><?= $student['id']; ?></td>
                        <td><?= $student['dname']; ?></td>
                        <td><?= $student['birthday']; ?></td>
                        <td><?= $student['licno']; ?></td>
                        <td><?= $student['gender']; ?></td>
                        <td><?= $student['address']; ?></td>
                        <td><?= $student['specialization']; ?></td>
                        <td><?= $student['contact']; ?></td>
                        <td><?= $student['demail']; ?></td>
                        <td><?= ($student['status'] == 0) ? "Active" : "Inactive"; ?></td>
                        <td>
                        <button id="edit_data" data-id="<?php echo $res['id']; ?>" class="btn text-primary edit_data" href="javascript:void(0)" name="edit_data"><i class="fas fa-fw fa-pen"></i></button>
                        <button id="edit-btn" class="btn text-primary viewbtn" name="edit-btn" data-bs-toggle="modal" data-bs-target="#editmembermodal"><i class="fas fa-fw fa-id-card"></i></button>
                        <button class="btn text-primary" name=""> <i class="fas fa-fw fa-trash-alt"></i></button>
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
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Doctor</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="./ADMIN/dcode.php"> 
              <br>
              <div class="row g-3">
                <div class="col">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="dname" name="dname"
                      placeholder="Full Name">
                    <label for="floatingInput">Full Name</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="licno" name="licno"
                      placeholder="Licence Number">
                    <label for="floatingInput">Licence Number</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="row g-3">
                <div class="col">
                  <div class="form-floating">
                    <select class="form-select" id="gender" name="gender"
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
                    <input type="text" class="form-control" id="address" name="address"
                      placeholder="Address">
                    <label for="floatingInput">Address</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="row g-3">
                <div class="col">
                  <div class="form-floating">
                    <input type="date" class="form-control" id="birthday" name="birthday">
                    <label for="floatingInput">Birthday</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="phone" name="phone"
                      placeholder="Phone Number">
                    <label for="floatingInput">Phone Number</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="demail" name="demail"
                      placeholder="Email">
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
                      aria-label="Floating label select example">
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
                <div class="col">
                  <div class="form-floating">
                    <select class="form-select" id="specialization" name="specialization"
                      aria-label="Floating label select example">
                      <option selected>Choose Specialization</option>
                      <option value="Cardiology">Cardiology</option>
                      <option value="Dermatology">Dermatology</option>
                      <option value="Ears Nose and Throat">Ears Nose and Throat</option>
                      <option value="Endocrinology">Endocrinology</option>
                      <option value="Gastroenterology">Gastroenterology</option>
                      <option value="General Surgery">General Surgery</option>
                      <option value="Nephrology">Nephrology</option>
                      <option value="Obstetrics Gynecology">Obstetrics Gynecology</option>
                      <option value="Ophthalmology">Ophthalmology</option>
                      <option value="Orthopedics">Orthopedics</option>
                      <option value="Pediatrics">Pediatrics</option>
                      <option value="Pulmonology">Pulmonology</option>
                      <option value="Urology">Urology</option>
                    </select>
                    <label for="floatingSelectGrid">Specialization</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="row g-3">
                <br>
                <div class="col">
                  <div class="form-floating">
                    <input type="password" class="form-control" id="dpassword" name="dpassword"
                      placeholder="Emergency Contact Name">
                    <label for="floatingInput">Password</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="password" class="form-control" id="dpassword" name="dpassword"
                      placeholder="Emergency Contact Phone">
                    <label for="floatingInput">Confirm Password</label>
                  </div>
                </div>
              </div>
              <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!----------END OF-------------------->

<!-- Modal edit-->
<div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Doctor</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="./ADMIN/edit.php" method="POST"> 
          <br>

            <input type="hidden" name="update_id" id="update_id">  
              <div class="row g-3"> 
                <div class="col">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="dname1" name="dname"
                      placeholder="Full Name">
                    <label for="floatingInput">Full Name</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="licno1" name="licno"
                      placeholder="Licence Number">
                    <label for="floatingInput">Licence Number</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="row g-3">
                <div class="col">
                  <div class="form-floating">
                    <select class="form-select" id="gender1" name="gender"
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
                    <input type="text" class="form-control" id="address1" name="address"
                      placeholder="Address">
                    <label for="floatingInput">Address</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="row g-3">
                <div class="col">
                  <div class="form-floating">
                    <input type="date" class="form-control" id="birthday1" name="birthday">
                    <label for="floatingInput">Birthday</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="phone1" name="phone"
                      placeholder="Phone Number">
                    <label for="floatingInput">Phone Number</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="demail1" name="demail"
                      placeholder="Email">
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
                    <select class="form-select" id="department1" name="department1"
                      aria-label="Floating label select example">
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
                <div class="col">
                  <div class="form-floating">
                    <select class="form-select" id="specialization1" name="specialization"
                      aria-label="Floating label select example">
                      <option selected>Choose Specialization</option>
                      <option value="Cardiology">Cardiology</option>
                      <option value="Dermatology">Dermatology</option>
                      <option value="Ears Nose and Throat">Ears Nose and Throat</option>
                      <option value="Endocrinology">Endocrinology</option>
                      <option value="Gastroenterology">Gastroenterology</option>
                      <option value="General Surgery">General Surgery</option>
                      <option value="Nephrology">Nephrology</option>
                      <option value="Obstetrics Gynecology">Obstetrics Gynecology</option>
                      <option value="Ophthalmology">Ophthalmology</option>
                      <option value="Orthopedics">Orthopedics</option>
                      <option value="Pediatrics">Pediatrics</option>
                      <option value="Pulmonology">Pulmonology</option>
                      <option value="Urology">Urology</option>
                    </select>
                    <label for="floatingSelectGrid">Specialization</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="row g-3">
                <br>
                <div class="col">
                  <div class="form-floating">
                    <input type="password" class="form-control" id="dpassword1" name="dpassword"
                      placeholder="Emergency Contact Name">
                    <label for="floatingInput">Password</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="password" class="form-control" id="dpassword1" name="dpassword"
                      placeholder="Emergency Contact Phone">
                    <label for="floatingInput">Confirm Password</label>
                  </div>
                </div>
              </div>
              <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="updatebtn" class="btn btn-dark">Edit</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!----------END OF edit modal-------------------->
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
</script>
    <script>
        $(document).ready(function () {

            $('.viewbtn').on('click', function () {
                $('#viewmodal').modal('show');
                $.ajax({ //create an ajax request to display.php
                    type: "GET",
                    url: "display.php",
                    dataType: "html", //expect html to be returned                
                    success: function (response) {
                        $("#responsecontainer").html(response);
                        //alert(response);
                    }
                });
            });

        });
    </script>

<script>
    $(function(){
        $('#add_new').click(function(){
            uni_modal('New Member',"manage_member.php");
        })
        $('.edit_data').click(function(){
            uni_modal('Edit Member Details',"manage_member.php?id="+$(this).attr('data-id'));
        })
        $('.delete_data').click(function(){
            _conf("Ar you sure to delete <b>"+$(this).attr('data-name')+"</b> from member list?","delete_data",[$(this).attr('data-id')])
        })
        $('.view_data').click(function(){
            uni_modal('View Member Details',"view_member.php?id="+$(this).attr('data-id'));
        })
    })
    function delete_data($id){
        $('#confirm_modal button').attr('disabled',true)
        $.ajax({
            url:'./Actions.php?a=delete_member',
            method:'POST',
            data:{id:$id},
            dataType:'JSON',
            error:err=>{
                console.log(err)
                alert("An error occurred.")
                $('#confirm_modal button').attr('disabled',false)
            },
            success:function(resp){
                if(resp.status == 'success'){
                    location.reload()
                }else{
                    alert("An error occurred.")
                    $('#confirm_modal button').attr('disabled',false)
                }
            }
        })
    }
</script>