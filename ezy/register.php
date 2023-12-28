<?php
require_once("include/initialize.php");

if (isset($_SESSION['StudentID'])) {
    redirect('index.php');
}

if (isset($_POST['btnRegister'])) {
    $student = new Student();
    $student->Fname = $_POST['FNAME'];
    $student->Lname = $_POST['LNAME'];
    $student->Address = $_POST['ADDRESS'];
    $student->MobileNo = $_POST['PHONE'];
    $student->STUDUSERNAME = $_POST['USERNAME'];
    $student->STUDPASS = sha1($_POST['PASS']);
    $student->create();

    message("Your are now successfully registered. You can login now!", "success");
    redirect("register.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="<?= web_root; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= web_root; ?>fonts/font-awesome.min.css" rel="stylesheet" media="screen">
    <style type="text/css">
       
    </style>
</head>
<body>
    
    <div class="container" style="min-height: 500px;">
        <p class="page-header" style="font-size: 30px;">Sign Up</p>
        <?php check_message(); ?>
        <div id="login-dp">
            <form class="form-horizontal span6" action="" method="POST" enctype="multipart/form-data" id="login-nav">
                 <div class="form-group">
                    <div class="col-md-9">
                      <label class="col-md-4 control-label" for=
                      "FNAME">First Name:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="FNAME" name="FNAME" placeholder=
                            "First Name" type="text" value="" required>
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="col-md-9">
                      <label class="col-md-4 control-label" for=
                      "LNAME">Last Name:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="LNAME" name="LNAME" placeholder=
                            "Last Name" type="text" value=""  required>
                      </div>
                    </div>
                  </div>
  
                  <div class="form-group">
                    <div class="col-md-9">
                      <label class="col-md-4 control-label" for=
                      "ADDRESS">Address:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="ADDRESS" name="ADDRESS" placeholder=
                            "Address" type="text" value=""  required>
                      </div>
                    </div>
                  </div> 
                 
                   <div class="form-group">
                    <div class="col-md-9">
                      <label class="col-md-4 control-label" for=
                      "PHONE">Contact No.:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="PHONE" name="PHONE" placeholder=
                            "Contact Number" type="text" value="" required>
                      </div>
                    </div>
                  </div> 
                  
                   <div class="form-group">
                    <div class="col-md-9">
                      <label class="col-md-4 control-label" for=
                      "USERNAME">Username:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="USERNAME" name="USERNAME" placeholder=
                            "Username" type="text" value="">
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="col-md-9">
                      <label class="col-md-4 control-label" for=
                      "PASS">Password:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="PASS" name="PASS" placeholder=
                            "Password" type="password" value="">
                      </div>
                    </div>
                  </div>
  
                 <div class="form-group">
                    <div class="col-md-9">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                        <button type="submit" name="btnRegister" class="btn btn-primary btn-sm">Register</button>
                        <a href="login.php"><i class="fa fa-arrow-left"></i> Back to Login</a>
                           
                     </div>
                    </div>
                  </div> 
        

                
            </form>
        </div>
    </div>
   
</body>
</html>
