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

  if(isset($_POST['submit'])!="")
  {
    $lname      = $_POST['lname'];
    $fname      = $_POST['fname'];
	$age     = $_POST['age'];
    $gender     = $_POST['gender'];
    $type       = $_POST['emp_type'];
    $division   = $_POST['division'];
	$contact   = $_POST['contact'];
$string1 =$lname ;
$string2 =$fname ;
$firstCharacter = $string1[0]. $string1[1];
$secondCharacter = $string2[0]. $string2[1];

if($type=="owner"){


    $sql = mysqli_query($conn,"INSERT into patient(Fname,Lname,age,genger,phoneno)VALUES('$fname','$lname','$age', '$gender', '{$division}{$contact}')");
}
else{
	
	
	    $sql = mysqli_query($conn,"INSERT into patient(Fname,Lname,age,genger,phoneno)VALUES('$fname','$lname','$age', '$gender', '{$division}{$contact}{$firstCharacter}{$secondCharacter}')");
	}
	

    if($sql)
    {
      ?>
        <script>
            alert('Patient had been successfully added.');
            window.location.href='home_employee.php?page=emp_list';
        </script>
      <?php 
    }

    else
    {
      ?>
        <script>
            alert('Invalid.');
            window.location.href='index.php';
        </script>
      <?php 
    }
  }
?>