<?php
    session_start();
    if(isset($_SESSION['currentname'])){
    }
    else{
        header("location:http://localhost/ticketsystem/index.html");   
    }
    ?>


<!DOCTYPE html>
<html dir="rtl" lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Electronic Ticketing System</title>

    <!-- Bootstrap core CSS -->
    <link href="http://localhost/ticketsystem/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/ticketsystem/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="http://localhost/ticketsystem/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      
    <!-- Bootstrap core JavaScript -->
    <script src="http://localhost/ticketsystem/vendor/jquery/jquery.min.js"></script>
    <script src="http://localhost/ticketsystem/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="http://localhost/ticketsystem/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      
  </head>

  <body>

    <!-- Navigation -->
       <div class="container">
<nav class="navbar navbar-light">
    <img src="http://localhost/ticketsystem/vendor/bootstrap/css/logo.png" width="80" height="80">
           </nav></div>

    <!-- Page Content -->
    <div class="container">
       <div dir="rtl" class="topnav">
  <a class="" href="admin.php">Home<i style="font-size: 30px; padding-right: 15px;" class="fa fa-home"></i></a>
  <a class="active" href="createuser.php">Add User<i style="font-size: 30px; padding-right: 15px;" class="fa fa-user-plus"></i></a>
  <a class="" href="#contact">Tickets Reports <i style="font-size: 30px; padding-right: 15px;" class="fa fa-bar-chart"></i></a>
  <a class="" href="http://localhost/ticketsystem/users/logout.php">Log out <i style="font-size: 30px; padding-right: 15px;" class="fa fa-power-off"></i></a>

</div> 
    <!-- User name  -->    
          
 <a dir="rtl" style="color:dimgrey" >Welcome, <?php echo $_SESSION['currentname'];?>!</a>                                      
       <!-- End User name  -->    
      
       
        <h3 style="text-align: right;"> Add / Edit User </h3>
        <p style="text-align: right;">Search for order / Ticket</p>  
 
        <!-- New user form  -->
        
<div class="card mb-3">
            <div class="card-header">
              <i style="float: right; padding-left: 15px; font-size: 20px;" class="fa fa-file"></i><h7 style="float: right;">Add New User Form </h7>
              </div>
            <div dir="ltr" class="card-body">
              <div dir="rtl" class="table-responsive-sm">        
        
        
        
        
        
      <form action="http://localhost/ticketsystem/users/createNewuser.php" method="post">
         
          
  
<!-- user name | text -->
          
<div style="text-align: right; padding-left: 120px;" class="form-group row">
    <label style="padding-right: 120px;" class="col-md-4 col-form-label" for="selectbasic">User Name </label>
    <div class="col-md-8">
        <input type="text" style="width: 400px;" id="name" name="name" class="form-control" placeholder="User name" required="required" autofocus="autofocus">
            
        </text>
    </div>
</div>
<!-- user Id | text -->
          
<div style="text-align: right; padding-left: 120px;" class="form-group row">
    <label style="padding-right: 120px;" class="col-md-4 col-form-label" for="selectbasic">User Id </label>
    <div class="col-md-8">
        <input type="text" style="width: 400px;" id="uid" name="uid" class="form-control" placeholder="User Id" required="required" autofocus="autofocus">
            
        </text>
    </div>
</div>
<div style="text-align: right; padding-left: 120px;" class="form-group row">
    <label style="padding-right: 120px;" class="col-md-4 col-form-label" for="selectbasic">User Password </label>
    <div class="col-md-8">
        <input type="text" style="width: 400px;" id="pwd" name="pwd" class="form-control" placeholder="User Password" required="required" autofocus="autofocus">
            
        </text>
    </div>
</div>
    <div style="text-align: right; padding-left: 120px;" class="form-group row">
    <label style="padding-right: 120px;" class="col-md-4 col-form-label" for="selectbasic">User Password </label>
    <div class="col-md-8">
        <input type="email" style="width: 400px;" id="email" name="email" class="form-control" placeholder="User Email" required="required" autofocus="autofocus">
            
        </text>
    </div>
</div>
        <!-- Select User role  | Select Basic -->
<div style="text-align: right; padding-left: 120px;" class="form-group row">
    <label style="padding-right: 120px;" class="col-md-4 col-form-label" for="selectbasic1">User Role </label>
    <div class="col-md-8">
        <select style="width: 400px;" id="role" name="role" class="form-control" placeholder="User Role" required="required" autofocus="autofocus">
            <option value="1">Admin</option>
            <option value="2">Stuff</option>
            <option value="3">Student</option>
        </select>
    </div>
</div>



<!--  | Button (Double) -->
<div style="direction: inherit;"class="form-group row">
    <label class="col-md-4 col-form-label" for="button1id"></label>
    <div class="col-md-8">
        <button id="submit" name="button1id" type="submit" class="btn btn-success">Add</button>
        <button id="cancel" name="cancel" type="reset" class="btn btn-danger">Cancel </button>
    </div>
</div>

</form>

                </div>  </div></div>   
            

        <!--  End form--> 
        
        
        
        
    <!-- Footer -->
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
    <a href=""> Ahmed</a>
  </div>
    </footer>
  <!-- Copyright -->
<!-- Footer -->    
        
        
        
        
        
        
        
    </div>

    

  </body>

</html>
