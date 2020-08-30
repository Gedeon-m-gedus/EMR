<?php 
 $conn = mysqli_connect('localhost', 'root', '');
  if (!$conn)
  {
    die("Database Connection Failed" . mysqli_error($conn));
  }

  $select_db = mysqli_select_db($conn,'hr');
  if (!$select_db)
  {
    die("Database Selection Failed" . mysqli_error($conn));
  } 
	
	$id=$_GET['emp_id'];
	$query = "DELETE FROM patient WHERE id=$id"; 
	$result = mysqli_query($conn,$query) or die ( mysqli_error($conn));
	header("Location: home_employee.php"); 
 ?>