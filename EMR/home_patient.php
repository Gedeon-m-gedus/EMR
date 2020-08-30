<?php
  include("auth.php"); //include auth.php file on all secure pages
  include("add_patient.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

    <title></title>

    <script>
      <!--
        var ScrollMsg= "Electronic Medical Record - "
        var CharacterPosition=0;
        function StartScrolling() {
        document.title=ScrollMsg.substring(CharacterPosition,ScrollMsg.length)+
        ScrollMsg.substring(0, CharacterPosition);
        CharacterPosition++;
        if(CharacterPosition > ScrollMsg.length) CharacterPosition=0;
        window.setTimeout("StartScrolling()",150); }
        StartScrolling();
      // -->
    </script>

    <link href="assets/must.png" rel="shortcut icon">
    <link href="assets/css/justified-nav.css" rel="stylesheet">


    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="data:text/css;charset=utf-8," data-href="assets/css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet"> -->
    <!-- <link href="assets/css/docs.min.css" rel="stylesheet"> -->
    <link href="assets/css/search.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="assets/css/styles.css" /> -->
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">

  </head>
  <body>

    <div class="container">
      <div class="masthead">
        <h3>
          <b><a href="index.php">Electronic Medical Record</a></b>
            <a data-toggle="modal" href="#colins" class="pull-right"><b><?php echo $_SESSION['username']; ?></b></a>
        </h3>
        <nav>
          <ul class="nav nav-justified">
            <li class="active">
              <a href="#">Patients</a>
            </li>
            <li>
              <a href="#">Reserve</a>
            </li>
            <li>
              <a href="home_records.php">Records</a>
            </li>
          </ul>
        </nav>
      </div>

        <br>
          <div class="well bs-component">
            <form class="form-horizontal">
              <fieldset>
                <button type="button" data-toggle="modal" data-target="#addEmployee" class="btn btn-success">Add New</button>
                <p align="center"><big><b>List of Patients</b></big></p>
                <div class="table-responsive">
                  <form method="post" action="" >
                    <table class="table table-bordered table-hover table-condensed" id="myTable">
                      <!-- <h3><b>Ordinance</b></h3> -->
                      <thead>
                        <tr class="info">
                          <th><p align="center">Names</p></th>
                          <th><p align="center">Age</p></th>
                          <th><p align="center">Gender</p></th>
                          <th><p align="center">phone</p></th>
                          <th><p align="center">Action</p></th>
                        </tr>
                      </thead>
                      <tbody>
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
                          
                          $query=mysqli_query($conn,"select * from patient ORDER BY id asc")or die(mysqli_error($conn));
                          while($row=mysqli_fetch_array($query))
                          {
                            $id     =$row['id'];
                            $lname  =$row['Lname'];
                            $fname  =$row['Fname'];
                            $type   =$row['age'];
                            $deduction   =$row['genger'];
                            $bonus   =$row['phoneno'];
                        ?>

                        <tr>
                          <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["id"]; ?>" title="Update"><?php echo $row['Lname'] ?>,  <?php echo $row['Fname'] ?></a></td>
                          <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["id"]; ?>" title="Update"><?php echo $row['age'] ?></a></td>
                          <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["id"]; ?>" title="Update"><?php echo $row['genger'] ?></a></td>
                          <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["id"]; ?>" title="Update"><?php echo $row['phoneno'] ?></a></td>
                          <td align="center">
                          
                            <a class="btn btn-danger" href="delete.php?emp_id=<?php echo $row["id"]; ?>">Delete</a>
                          </td>
                        </tr>

                        <?php } ?>
                      </tbody>
                      
                        <tr class="info">
                          <th><p align="center">Names</p></th>
                          <th><p align="center">Age</p></th>
                          <th><p align="center">Gender</p></th>
                          <th><p align="center">Phone</p></th>
                          <th><p align="center">Action</p></th>
                        </tr>
                    </table>
                  </form>
                </div>
              </fieldset>
            </form>
          </div>

      <!-- this modal is for ADDING an EMPLOYEE -->
      <div class="modal fade" id="addEmployee" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>Add patient</b></h3>
            </div>
            <div class="modal-body" style="padding:60px 70px;">

              <form class="form-horizontal" action="#" name="form" method="post">
                <div class="form-group">
                  <label class="col-sm-4 control-label">Lastname</label>
                  <div class="col-sm-8">
                    <input type="text" name="lname" class="form-control" placeholder="Lastname" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Firstname</label>
                  <div class="col-sm-8">
                    <input type="text" name="fname" class="form-control" placeholder="Firstname" required="required">
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-4 control-label">Age</label>
                  <div class="col-sm-8">
                    <input type="text" name="age" class="form-control" placeholder="Age" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Gender</label>
                  <div class="col-sm-8">
                    <select name="gender" class="form-control" placeholder="Gender" required>
                      <option value="">Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Reference Type</label>
                  <div class="col-sm-8">
                    <select name="emp_type" class="form-control" placeholder="Reference Type" required>
                      <option value="">Reference Type</option>
                      <option value="owner">Owner</option>
                      <option value="prnt">Parent/Guardian</option>
                     
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Phone Contact</label>
                  <div class="col-sm-8">
				  <table border='0' >
				  <tr border='0'><td>
                    <select name="division" class="form-control" placeholder="Division" required>
                      <option value="">Code</option>
                      <option value="+250">Rwanda</option>
                      <option value="+256">Uganda</option>
                      <option value="+275">Angola</option>
                                        </select></td><td>
				         <input type="text" name="contact" class="form-control" placeholder="phone" required="required"></td></tr>
                 </table>
                </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-8">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
                    <input type="reset" name="" class="btn btn-danger" value="Clear Fields">
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>

      <!-- this modal is for my Colins -->
      <div class="modal fade" id="colins" role="dialog">
        <div class="modal-dialog modal-sm">
              
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">You are logged in as <b><?php echo $_SESSION['username']; ?></b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
              <div align="center">
                <a href="logout.php" class="btn btn-block btn-danger">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/docs.min.js"></script> -->
    <script src="assets/js/search.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/dataTables.min.js"></script>

    <!-- FOR DataTable -->
    <script>
      {
        $(document).ready(function()
        {
          $('#myTable').DataTable();
        });
      }
    </script>

    <!-- this function is for modal -->
    <script>
      $(document).ready(function()
      {
        $("#myBtn").click(function()
        {
          $("#myModal").modal();
        });
      });
    </script>

  </body>
</html>