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
    <nav dir="rtl" class="navbar navbar-expand-xxlg">
      <div class="container">
        <a style="color: aliceblue;" class="navbar-brand" href="#">Electronic Ticketing System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
          
          
        
      </div>
        
    </nav>

    <!-- Page Content -->
    <div class="container">
       <div dir="rtl" class="topnav">
  <a class="" href="staff.php">Home<i style="font-size: 30px; padding-right: 15px;" class="fa fa-home"></i></a>
  <a class="active" href="showTicket.php"> Show Tickets<i style="font-size: 30px; padding-right: 15px;" class="fa fa-ticket"></i></a>
  <a class="" href="#contact">Tickets Reports <i style="font-size: 30px; padding-right: 15px;" class="fa fa-bar-chart"></i></a>
  <a class="" href="http://localhost/ticketsystem/users/logout.php">Log out <i style="font-size: 30px; padding-right: 15px;" class="fa fa-power-off"></i></a>

</div> 
    <!-- User name  -->    
          
 <a dir="rtl" style="color:dimgrey" >Welcome, <?php echo $_SESSION['currentname'];?>!</a>                  
       <!-- End User name  -->   
      
        <h3 style="text-align: right;"> All Orders / Tickets </h3>
        <p style="text-align: right;">Search for order / Ticket</p>  
  
        
        
        
        
        
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
