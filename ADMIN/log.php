<?php
require './connection.php';
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Server Log</h1>
    <br>
    <div class="card shadow mb-8" id="tablecard">
    
    <div class="card-body">
        <div class="table-responsive"  id="table-responsive-id">
            <table class="table table-striped" id="dataTabledoctor">
                <thead>
                    <th>#</th>
                    <th>Date Time</th>
                    <th>Username</th>
                    <th>Action Mode</th>
                </thead>
                <tbody>
                <?php 
                    $qry = $conn->query("SELECT l.*,u.username FROM `logs` l inner join user u on l.user_id = u.id order by  unix_timestamp(l.`date_created`) asc");
                    $i = 1;
                    while($row=$qry->fetch_assoc()):
                    ?>
                    <tr>
                        <td class="py-1 px-2"><?php echo $i++ ?></td>
                        <td class="py-1 px-2"><?php echo date("M d, Y H:i",strtotime($row['date_created'])) ?></td>
                        <td class="py-1 px-2"><?php echo $row['username'] ?></td>
                        <td class="py-1 px-2"><?php echo $row['action_made'] ?></td>
                    </tr>
                    <?php endwhile; ?>
                    <?php if($qry->num_rows <=0): ?>
                        <tr>
                            <th class="tex-center"  colspan="4">No data to display.</th>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
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