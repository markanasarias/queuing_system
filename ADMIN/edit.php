<?php
Session_start();
$con = mysqli_connect("localhost","root","");
$db = mysqli_select_db($con, 'db_amante');

if(isset($_POST['updatebtn']))
    {   
        $id = $_POST['update_id'];
        
        $fname = $_POST['dname'];
        $birth = $_POST['birthday'];
        $licno = $_POST['licno'];
        $gender = $_POST['gender'];
		$add = $_POST['address'];
		$special = $_POST['specialization'];
		$phone = $_POST['phone'];
		$demail = $_POST['demail'];

        
		$update_query = mysqli_query($con, "update doctor set dname='$fname', birthday='$birth', licno='$licno', gender='$gender', address='$add', specialization='$special', phone='$phone', demail='$demail' where id='$id'");
		if($update_query>0)
		{
			echo "Data Updated!";
		}
			else
		{
		echo "Error!";
		}



    }
?>