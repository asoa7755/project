


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
  <a class="active" href="staff.php">Home<i style="font-size: 30px; padding-right: 15px;" class="fa fa-home"></i></a>
  <a class="" href="showTicket.php"> Show Tickets<i style="font-size: 30px; padding-right: 15px;" class="fa fa-ticket"></i></a>
  <a class="" href="#contact">Tickets Reports <i style="font-size: 30px; padding-right: 15px;" class="fa fa-bar-chart"></i></a>
  <a class="" href="http://localhost/ticketsystem/users/logout.php">Log out <i style="font-size: 30px; padding-right: 15px;" class="fa fa-power-off"></i></a>

</div> 
    <!-- User name  -->    
          
 <a dir="rtl" style="color:dimgrey" >Welcome, <?php echo $_SESSION['currentname'];?>!</a>                  
       <!-- End User name  -->   
      
        <h3 style="text-align: right;"> All Orders / Tickets </h3>
        <p style="text-align: right;">Search for order / Ticket</p>  
  <input style="width: 250px;"class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
        
        <div class="card mb-3">
            <div class="card-header">
              <i style="float: right; padding-left: 15px; font-size: 20px;" class="fas fa-table"></i><h7 style="float: right;"> Tickets </h7>
              </div>
            <div dir="ltr" class="card-body">
              <div dir="rtl" class="table-responsive-sm">
        <table style="border-color: darkcyan;" dir="rtl" class="table table-bordered">
  <thead>
    <tr>
      <th style="width:15%;" scope="col">Ticket No.</th>
      <th  scope="col">comment</th>
      <th style="width:15%;" scope="col">status</th>
      <th style="width:20%;" scope="col">Data / Time</th>
      <th style="width:10%;" scope="col">View</th>
    </tr>
  </thead>
  <tbody id="myOrder">
    <tr>
      <th scope="row">1</th>
      <td style="text-align: right;">Mark</td>
      <td><span class="label label-info">Open/New</span></td>
      <td>@mdo</td>
      <td><a id="ContentPlaceHolder1_gvRequests_hlView_0" title="View" href="" target="_self">
                                    <i class="fa fa-search" style="color: #7cc576; margin: 2px; font-size: 20px;"></i></a></td>
    </tr>
      
    <tr>
      <th scope="row">2</th>
      <td style="text-align: right;">Mark</td>
      <td><span class="label label-primary">under studying</span></td>
      <td>@mdo</td>
      <td><a id="ContentPlaceHolder1_gvRequests_hlView_0" title="View" href="" target="_self">
                                    <i class="fa fa-search" style="color: #7cc576; margin: 2px; font-size: 20px;"></i></a></td>
    </tr>
      
    <tr>
      <th scope="row">3</th>
      <td style="text-align: right;">Mark</td>
      <td><span class="label label-warning">return to student</span></td>
      <td>@mdo</td>
      <td><a id="ContentPlaceHolder1_gvRequests_hlView_0" title="View" href="" target="_self">
                                    <i class="fa fa-search" style="color: #7cc576; margin: 2px; font-size: 20px;"></i></a></td>
    </tr>
      
    
      <tr>
      <th scope="row">4</th>
      <td style="text-align: right;">Mark</td>
      <td><span class="label label-danger">rejected</span></td>
      <td>@mdo</td>
      <td><a id="ContentPlaceHolder1_gvRequests_hlView_0" title="View" href="" target="_self">
                                    <i class="fa fa-search" style="color: #7cc576; margin: 2px; font-size: 20px;"></i></a></td>
    </tr>
    
    <tr>
      <th scope="row">5</th>
      <td style="text-align: right;">Mark</td>
      <td><span class="label label-success">accepted</span></td>
      <td>@mdo</td>
      <td><a id="ContentPlaceHolder1_gvRequests_hlView_0" title="View" href="" target="_self">
                                    <i class="fa fa-search" style="color: #7cc576; margin: 2px; font-size: 20px;"></i></a></td>
    </tr>
    
    <tr>
      <th scope="row">6</th>
      <td style="text-align: right;">Mark</td>
      <td><span class="label label-warning">Warning Label</span></td>
      <td>@mdo</td>
      <td><a id="ContentPlaceHolder1_gvRequests_hlView_0" title="View" href="" target="_self">
                                    <i class="fa fa-search" style="color: #7cc576; margin: 2px; font-size: 20px;"></i></a></td>
    </tr>
      
    <tr>
      <th scope="row">7</th>
      <td style="text-align: right;">Mark</td>
      <td><span class="label label-warning">Warning Label</span></td>
      <td>@mdo</td>
      <td><a id="ContentPlaceHolder1_gvRequests_hlView_0" title="View" href="" target="_self">
                                    <i class="fa fa-search" style="color: #7cc576; margin: 2px; font-size: 20px;"></i></a></td>
    </tr>
    
    
  </tbody>
</table>
        
        
                  </div>
      
                <!-- for search table -->
    <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myOrder tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
            
            </div></div>
        
        
        
        
     
    <!-- Footer -->
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
    <a href=""> Ahmed AAA</a>
  </div>
    </footer>
  <!-- Copyright -->
<!-- Footer -->    
        
        
        
        
        
        
        
    

    

  </div>     
      </body>

</html>
