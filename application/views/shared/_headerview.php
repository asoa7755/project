<?php if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="../../favicon.ico">
      <title>Navbar Template for Bootstrap</title>
      <!-- Bootstrap core CSS -->
      <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="../vendor/css/navbar.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

      <!-- Page level plugin CSS-->
    <link href="../vendor/bootstrap/css/dataTables.bootstrap4.css" rel="stylesheet">

      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <div class="container">
      <!-- Static navbar -->
      <nav class="navbar navbar-default">
         <div class="container-fluid">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="#">Ticketing System</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
               <ul class="nav navbar-nav">
                  <li class=""><a href="/ticketsystem/application/index.php"><span class="fa fa-home" aria-hidden="true"></span>Home</a></li>
                  
                  <li >  
                      <?php
                      if (isset($_SESSION["Role"]))
                      {
                        if ($_SESSION["Role"]==2)//staff
                        {
                                echo '<a href="/ticketsystem/application/views/staff/mainStaff.php"><span class="fa fa-ticket" aria-hidden="true"></span>All Tickets</a>';
                                echo '<li >  <a href="/ticketsystem/application/views/staff/ticketReply.php"><span class="fa fa-reply" aria-hidden="true"></span>Ticket Reply</a></li>';
                        }
                        elseif ($_SESSION["Role"]==1)//student
                        {
                            echo '<a href="/ticketsystem/application/views/students/mainStudent.php"><span class="fa fa-ticket" aria-hidden="true"></span>Display Tickets</a>';
                            echo '<li><a href="/ticketsystem/application/views/students/newticket.php"><span class="fa fa-ticket" aria-hidden="true"></span>New Ticket</a></li>';
                        }
                        elseif ($_SESSION["Role"]==3)//Admin
                        {
                            echo '<a href="/ticketsystem/application/views/users/AddUsersView.php"><span class="fa fa-ticket" aria-hidden="true"></span>Users</a>';
                            echo '<li><a href="/ticketsystem/application/views/users/departmentserviceview.php"><span class="fa fa-ticket" aria-hidden="true"></span>Department and Services </a></li>';
                            echo '<li><a href="/ticketsystem/application/views/admin/systemreport.php"><span class="fa fa-ticket" aria-hidden="true"></span>System Reports </a></li>';
                        }

                      }
                      ?>
                    </li>
                    
            </ul>
            
    <ul class="nav navbar-nav navbar-right">              
    <?php
     if (empty($_SESSION['Id']))
     {
        echo '<li><a href="/ticketsystem/application/views/users/login.php">Log in</a></li>';
     }
     else
     {
         
        echo '<li><a >Welcome '.$_SESSION['UserName'].' ! </a></li>';
        echo '<li><a href="/ticketsystem/application/views/users/logout.php">Log out</a></li>';
     }
      ?>
    </ul>

            </div>
            <!--/.nav-collapse -->   
                  
        </div>
        
         <!--/.container-fluid -->
      </nav>