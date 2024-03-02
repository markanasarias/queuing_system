<?php
// Include the database connection file
include 'dbcon.php';

// Fetch rows with status = 0
$query = "SELECT id, number FROM queue WHERE status = 0 LIMIT 1";
$result = mysqli_query($con, $query);

// Check if the query was successful
if ($result) {
    // Fetch and display IDs
    while ($row = mysqli_fetch_assoc($result)) {
        $number[] = $row['number'];
        $ids[] = $row['id'];
    }
} else {
    // Handle the case where the query fails
    echo "Error: " . mysqli_error($con);
}

$con->close();
?>

<script>
// Reload the page every 1 second
setInterval(function() {
    location.reload();
}, 1000);
</script>
<center><h2>AMANTE QUEUING</h2></center>
<div class="row" style="margin-left: 580px;">
<div class="col-lg-3 mb-4">
<div class="card shadow mb-4" style="width: 700px; height: 600px; margin-top: 100px;">
<div class="left-side">
	<div class="col-md-10 offset-md-1">
		<div class="card">
			<div class="card-body" style="width: 570px; height: 500px;">
				<div class="container-fluid">
					<div class="card">
							<div class="card-body bg-primary"><h4 class="text-center text-white"><b> QUEUING</b></h4></div>
						</div>
						<br>
					<div class="card">
						<div class="card-header bg-primary text-white"><h3 class="text-center"><b>Current Patient</b></h3></div>
						<div class="card-body">
							<h4 class="text-center" id="sname"></h4>
							<hr class="divider">
							<h3 class="text-center" id="squeue"></h3>
							<hr class="divider">
							<h1 class="text-center" id="window" style="font-size: 150px;"><?php echo implode(', ', $number); ?></h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>