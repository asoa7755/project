<?php include_once('../shared/_headerview.php') ?>
<?php include_once('../../../application/classes/TicketService.php') ;?>
<!-- Page Content -->
<h3> Tickets </h3>
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

        if (!empty($_POST['status'])
        {
            $ticketservice ->update($ticketid,$status,$comments,$staffid);
            header('Location: ../staff/mainstaff.php');
            die();
        }
    
        $records = $ticketservice->getbyStaff($_SESSION['UserName']);

        if (!empty($records))
        {
          echo '<table style="border-color: darkcyan;" dir="rtl" class="table table-bordered">';
          echo '<thead>';
          echo '<tr>';
          echo '<th style="width:15%;" scope="col">Save</th>';
          echo '<th style="width:15%;" scope="col">Ticket No.</th>';
          echo '<th scope="col">comments</th>';
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

                if (!empty($status))
                {
                    switch ($status){
                      // New
                      case 1:  $statustext ="New"; break;
                      // Pending
                      case 2: $statustext ="Pending"; break;
                      // Return To Student
                      case 3:  $statustext ="Return to Student"; break;
                      //Accepted:break;
                      case 4:  $statustext ="Accepted"; break;
                      //Rejected:break;
                      case 5:$statustext ="Rejected";  break;
                    }

                }

                echo '<tr><form action="mainstaff.php" method="post">';
                echo '<td scope="row"><input type="button" class="btn btn-success" value="Save"/> </td>';
                echo '<th scope="row">'.$ticketnumber.'</th>';
                echo '<td ><div contenteditable="true">'.$comments.'</div></td>';
                
                echo '<td>';
                echo '<select style="width: 400px;" id="status" name="status" class="form-control" placeholder="Select Department" required="required" autofocus="autofocus">';               
                echo '<option value="'.$status.'">'.$statustext.'</option>';
                echo '<option value="1">New</option>';
                echo '<option value="2">Pending</option>';
                echo '<option value="3">Return to Student</option>';
                echo '<option value="4">Accepted</option>';
                echo '<option value="5">Rejected</option>';
                echo '</select>';
                echo '</td>';
                echo '<td>'.$datetime.'</td>';
                echo '<td><a id="ContentPlaceHolder1_gvRequests_hlView_0" title="View" href="" target="_self">';
                echo '<i class="fa fa-search" style="color: #7cc576;margin: 2px; font-size: 20px;"></i></a>';
                echo '</td>';
                echo '</form></tr>';            
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