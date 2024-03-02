
<?php
// Include the database connection file
include 'dbcon.php';

// Fetch rows with status = 0
$query = "SELECT q.id, q.number, q.patientid, 
          p.fname, p.lname, p.mname, p.address,
          p.birthday, p.gender, p.civil_status,
          p.contact, p.email, ec_name,
          p.ec_relation, p.ec_contact FROM queue q
          JOIN patient p ON q.patientid = p.id
          WHERE q.status = 0 LIMIT 1";

$result = mysqli_query($con, $query);

// Check if the query was successful
if ($result) {
    // Fetch and display IDs
    while ($row = mysqli_fetch_assoc($result)) {
        $number[] = $row['number'];
        $ids[] = $row['id'];
        $patientid[] = $row['patientid'];
        $fname[] = $row['fname'];
        $lname[] = $row['lname'];
        $mname[] = $row['mname'];
        $address[] = $row['address'];
        $birthday[] = $row['birthday'];
        $gender[] = $row['gender'];
        $contact[] = $row['contact'];
        $civil_status[] = $row['civil_status'];
        $email[] = $row['email'];
        $ec_name[] = $row['ec_name'];
        $ec_relation[] = $row['ec_relation'];
        $ec_contact[] = $row['ec_contact'];

    }
} else {
    // Handle the case where the query fails
    echo "Error: " . mysqli_error($con);
}

$con->close();
?>


<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addemployeemodal" style="margin-left: 200px; margin-top: 100px;">
    View Record
    </button>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addemployeemodal" style="margin-left: 20spx; margin-top: 100px;">
    Add Record
    </button>
    <button type="button" class="btn btn-primary" name="nextQueueBtn" id="nextQueueBtn" style="margin-left: 910px; margin-top: 100px;">
    Next Queuings
</button>
<div class="col-xl-9 col-lg-10" style="margin-left: 200px; margin-top: 10px;">
<div class="card shadow mb-8">
    <br>
<h3 style="margin-left: 70px; margin-top: 20px;">Patient Information</h3>
<h3 style="margin-left: 1000px; margin-top: -40px;">Queuing #<?php echo implode(', ', $number); ?></h3>
<input type="hidden" class="form-control" id="number" name="number" value="<?php echo implode(', ', $number); ?>">
<input type="hidden" class="form-control" id="id" name="id" value="<?php echo implode(', ', $ids); ?>">
<input type="hidden" class="form-control" id="id" name="id" value="<?php echo implode(', ', $patientid); ?>">
<form>
              <br>
              <div class="row g-3" style="margin-left: 70px; margin-right: 70px;">
                <div class="col">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" value="<?php echo implode(', ', $fname); ?>">
                    <label for="floatingInput">First Name</label>
                    
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="lname" name="lname"
                      placeholder="Last Name" value="<?php echo implode(', ', $lname); ?>">
                    <label for="floatingInput">Last Name</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="mname" name="mname"
                      placeholder="Middle Name" value="<?php echo implode(', ', $mname); ?>">
                    <label for="floatingInput">Middle Name</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="row g-3" style="margin-left: 70px; margin-right: 70px;">
                <div class="col">
                <div class="form-floating">
                    <input type="text" class="form-control" id="gender" name="gender"
                      placeholder="Gender" value="<?php echo implode(', ', $gender); ?>">
                    <label for="floatingInput">Gender</label>
                  </div>
                </div>
                <div class="col">
                <div class="form-floating">
                    <input type="text" class="form-control" id="CivilStatus" name="CivilStatus"
                      placeholder="Civil Status" value="<?php echo implode(', ', $civil_status); ?>">
                    <label for="floatingInput">Civil Status</label>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="Address" name="Address"
                      placeholder="Address" value="<?php echo implode(', ', $address); ?>">
                    <label for="floatingInput">Address</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="row g-3" style="margin-left: 70px; margin-right: 70px;">
                <div class="col">
                  <div class="form-floating">
                    <input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo implode(', ', $birthday); ?>">
                    <label for="floatingInput">Birthday</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="contact" name="contact"
                      placeholder="Phone Number" value="<?php echo implode(', ', $contact); ?>">
                    <label for="floatingInput">Phone Contact</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email"
                      placeholder="Email" value="<?php echo implode(', ', $email); ?>">
                    <label for="floatingInput">Email</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="row g-3" style="margin-left: 70px; margin-right: 70px;">
                <div class="col">
                  <div class="form-floating">
                    <input type="etxt" class="form-control" id="ecname" name="ecname"  placeholder="Emergency Contact Name" value="<?php echo implode(', ', $ec_name); ?>">
                    <label for="floatingInput">Emergency Contact Name</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="ecrelation" name="ecrelation"
                      placeholder="Phone Number" value="<?php echo implode(', ', $ec_relation); ?>">
                    <label for="floatingInput">Emergency Contact Relation</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="eccontact" name="eccontact"
                      placeholder="Email" value="<?php echo implode(', ', $ec_contact); ?>">
                    <label for="floatingInput">Emergency Contact Phone</label>
                  </div>
                </div>
              </div>
              <br>
              <br>
              <br>
            </form>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {
    // Handle button click
    $("#nextQueueBtn").click(function() {
        // Get the selected ID from the input
        var selectedId = $("#id").val();
        
        // Log the selected ID for debugging
        console.log("Selected ID:", selectedId);

        // Rest of your code...
        // Check if an ID is selected
        if (selectedId) {
            // Send an AJAX request to update the status
            $.ajax({
                type: "POST", // You can use "GET" or "POST" based on your server-side implementation
                url: "./DOCTOR/code.php", // Replace with the actual server-side script handling the update
                data: { id: selectedId },
                success: function(response) {
                    // Handle the response if needed
                    console.log(response);
                    location.reload();
                },
                error: function(error) {
                    // Handle errors if any
                    console.error(error);
                }
            });
        } else {
            alert("Please select an ID.");
        }
    });
});
</script>