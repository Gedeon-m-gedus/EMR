

<?php
date_default_timezone_set("Africa/kigali");

?>
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
	  
	 $uid=$_POST['user']; 
    
	$pname      = $_POST['patient'];
    $fname      = $_POST['dname'];
    $date=date("Y-m-d");


    $sql = mysqli_query($conn,"INSERT into records VALUES(null,'$pname','$uid','$fname','$date')") or die(mysqli_error($conn));


	


    if($sql)
    {
      ?>
        <script>
            alert('Records had been successfully added.');
            window.location.href='home_records.php?page=Rec_list';
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