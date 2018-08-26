<?php include_once('../shared/_headerview.php') ?>
<?php include_once('../../../application/classes/TicketService.php') ;?>
<?php include_once('../../../application/classes/FileService.php') ;
echo $_SESSION['Id'];
?>
<!-- Page Content -->
<!-- print User name and Id -->

<p> Welcome!  <?php echo $_SESSION['UserName']; echo $_SESSION['Id']; ?></p>
<h3> All Orders / Tickets </h3>
<p>Search for your order / Ticket</p>
<input style="width: 250px;"class="form-control" id="myInput" type="text" placeholder="Search..">
<br>
<div class="card mb-3">
   <div class="card-header">
      <div class="row"> 
          <div class="col-md-4"> 
          <i style=" padding-right: 15px; font-size: 20px;" class="fa fa-table"></i>
          <h7>My Tickets </h7>
</BR>
<i style=" padding-right: 15px; font-size: 20px;" class="fa fa-plus"></i>
          <h7><a href="newticket.php">Add New Ticket<a> </h7>
          </div>
          <div class="col-md-4"> </div>
          <div class="col-md-4"> 
          
          </div>
      </div>
      
     
   </div>
   <div dir="ltr" class="card-body">
      <div dir="rtl" class="table-responsive-sm">
        
      <?php
 

    if (!empty($_SESSION['UserName']))
    {      
        $ticketservice= new TicketService();    
        $fileservice= new FileService();    
        
        //$records = $ticketservice->getbyStudent($_SESSION['UserName']);
        $records = $ticketservice->getbyStudent($_SESSION['UserName']);

        if (!empty($records))
        {
          echo '<table style="border-color: darkcyan;" dir="rtl" class="table table-bordered">';
          echo '<thead>';
          echo '<tr>';
          echo '<th style="width:15%;" scope="col">Ticket No.</th>';
          echo '<th  scope="col">Attachments</th>';
          echo '<th  scope="col">comments</th>';
          echo '<th style="width:15%;" scope="col">status</th>';
          echo '<th style="width:20%;" scope="col">Data / Time</th>';
          echo '<th style="width:10%;" scope="col">View</th>';
          echo '</tr>';
          echo '</thead>';
          echo '<tbody id="myOrder">';

            foreach ($records as $row)
            {
                $comments = $row[4];
                $ticketnumber = $row[0];
                $name = $_SESSION['UserName'];
                $status = $row['Status'];
                $statuscolour = "#000000";
                $datetime = $row[5];
                $statustext ="";
                $list_of_files = $fileservice->getFilesperticketid($ticketnumber);


                if (!empty($status))
                {
                    switch ($status){
                      // New
                      case 1: $statuscolour="label-primary"; $statustext ="New"; break;
                      // Pending
                      case 2: $statuscolour="label-warning"; $statustext ="Pending"; break;
                      // Return To Student
                      case 3: $statuscolour="label-default"; $statustext ="Return to Student"; break;
                      //Accepted:break;
                      case 4: $statuscolour="label-success"; $statustext ="Accepted"; break;
                      //Rejected:break;
                      case 4: $statuscolour="label-danger";$statustext ="Rejected";  break;
                    }

                }

                echo '<tr>';
          
                echo '<td scope="row">'.$ticketnumber.'</td>';
                echo '<td scope="row">';
                if (!empty($list_of_files))
                {
                    echo '<table class="table table-bordered ">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th style="width:20%;" scope="col">Id</th>';
                    echo '<th style="width:80%;" scope="col">File Name</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                      foreach($list_of_files as $row)
                      {
                        echo '<tr>';
                        echo '<td><a href="../shared/fileapi.php?id='.$row[0].'">'. $row[0]. '</a></td>';
                        echo '<td><a href="../shared/fileapi.php?id='.$row[0].'">'. $row[1]. '</a></td>';
                        echo '</tr>';
                      }   
                    echo '</tbody>';
                    echo '</table>';
                  }
                echo '</td>';
                echo '<td>'.$comments.'</td>';
                echo '<td><span class="label '.$statuscolour.'">'.$statustext.'<under studying</span></td>';
                echo '<td>'.$datetime.'</td>';
                echo '<td><a id="ContentPlaceHolder1_gvRequests_hlView_0" title="View" href="" target="_self">';
                echo '<i class="fa fa-search" style="color: #7cc576;margin: 2px; font-size: 20px;"></i></a>';
                echo '</td>';
                echo '</tr>';
            }
        }
    }
    else
    {

      header('Location: ../users/login.php');
      die();
    }

    
?>


    
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
   </div>
</div>
<!-- Footer -->
<?php include_once('../shared/_footerview.php') ?>