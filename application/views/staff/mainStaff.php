<?php include_once('../shared/_headerview.php') ?>
<?php include_once('../../../application/classes/TicketService.php') ;?>
<?php include_once('../../../application/classes/FileService.php') ;?>
<!-- Page Content -->
<!-- print User name and Id -->
<p> Welcome!  <?php echo $_SESSION['UserName']; echo $_SESSION['Id']; ?></p>
<h3> Tickets </h3>
<p>Search for your order / Ticket</p>
<form action="mainstaff.php" method="post">
  <input style="width: 250px;"class="form-control" id="search" type="text" name="search" placeholder="Search..">

</form>
<br>
<div class="card mb-3">
   <div class="card-header">
      <div class="row"> 
          <div class="col-md-4"> 
          
</BR>
<!--<i style=" padding-right: 15px; font-size: 20px;" class="fa fa-plus"></i>
          <h7><a href="../students/newticket.php">Add New Ticket<a> </h7>-->
          </div>
          
      </div>
      
     
   </div>
   <div dir="ltr" class="card-body">
      <div  class="well table-responsive-sm">
        <i style=" padding-right: 15px; font-size: 20px;" class="fa fa-table"></i>
          <h7>My Tickets </h7>
      <?php
 
    if (isset($_SESSION['token']) && !empty($_POST['token']))
    {
        if ($_SESSION['token']!=$_POST['token'])
        { 
            header('Location: ../users/login.php');
            die();
        }
    }
    elseif (!isset($_SESSION['token']))
    {
        header('Location: ../users/login.php');
        die();
    }   

    if (!empty($_SESSION['UserName']))
    {      
        $ticketservice= new TicketService();    
        $fileservice= new FileService();    

        $records ="";
    
        if (!empty($_POST['search']))
        {          
            $records = $ticketservice->search($_POST['search'], $_SESSION['UserName'], $_SESSION['Role']);
        }
        elseif (!empty($_POST['status']))
        {
            $ticketid = $_POST['ticketnumber'];
            $status = $_POST['status'];            
            $comments = $_POST['comments']; 
            $staffid= $_SESSION['Id'];       

            $ticketservice ->update($ticketid,$status,$comments,$staffid,$_SESSION['UserName']);           
            echo '<label class="label label-success"> Updated</label>';


            if (($_SESSION['Role'])==2)
            {
              $records = $ticketservice->getbyStaff($_SESSION['UserName']);
            }
            elseif (($_SESSION['Role'])==1)
            {
              $records = $ticketservice->getbyStudent($_SESSION['UserName']);
            }
        }
        elseif (($_SESSION['Role'])==2)
        {
            $records = $ticketservice->getbyStaff($_SESSION['UserName']);
        }
        elseif (($_SESSION['Role'])==1)
        {
          $records = $ticketservice->getbyStudent($_SESSION['UserName']);
        }
        else{
          $records = $ticketservice->getbyStudent($_SESSION['UserName']);
        }

        if (!empty($records))
        {
          
          echo '<table class="table table-bordered ">';
          echo '<thead>';
          echo '<tr>';
          echo '<th style="width:8%;" scope="col">Save</th>';
          echo '<th style="width:3%;" scope="col">Ticket No.</th>';
          echo '<th style="width:10%;" scope="col">Files</th>';
          echo '<th scope="col">comments</th>';
          echo '<th style="width:15%;" scope="col">status</th>';
          echo '<th style="width:15%;" scope="col">Data / Time</th>';
          echo '<th style="width:4%;" scope="col">View</th>';
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
                $rowcolor="";
                $list_of_files = $fileservice->getFilesperticketid($ticketnumber);

                if (!empty($status))
                {
                    switch ($status){
                      // New
                      case 1:  $statustext ="New";  $rowcolor="info"; break;
                      // Pending
                      case 2: $statustext ="Pending"; $rowcolor="warning"; break;
                      // Return To Student
                      case 3:  $statustext ="Return to Student"; $rowcolor="warning"; break;
                      //Accepted:break;
                      case 4:  $statustext ="Accepted"; $rowcolor="success"; break;
                      //Rejected:break;
                      case 5:$statustext ="Rejected"; $rowcolor="success"; break;
                    }

                }

                echo '<tr><form action="mainstaff.php" method="post">';
                echo '<input type="hidden" name="token" id="token" value="'. $_SESSION['token'].'"/>';
                echo '<td scope="row"><input  type="submit" class="btn btn-success" value="Save"/> </td>';
                echo '<th class="'.$rowcolor.'" scope="row"><input style="width:30px;" name="ticketnumber" id="ticketnumber" type="text" value="'.$ticketnumber.'"readonly  > </th>';

                echo '<th class="'.$rowcolor.'" scope="row">';
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
                echo '</th>';
            
              

                echo '<td class="'.$rowcolor.'"><textarea contenteditable="true" id="comments" name="comments">'.$comments.'</textarea></td>';
                echo '<td class="'.$rowcolor.'">';
                echo '<select style="width: 150px;" id="status" name="status" class="form-control input-sm" placeholder="Select Department" required="required" autofocus="autofocus">';               
                echo '<option value="'.$status.'">'.$statustext.'</option>';
                echo '<option value="1">New</option>';
                echo '<option value="2">Pending</option>';
                echo '<option value="3">Return to Student</option>';
                echo '<option value="4">Accepted</option>';
                echo '<option value="5">Rejected</option>';
                echo '</select>';
                echo '</td>';
                echo '<td class="'.$rowcolor.'">'.$datetime.'</td>';
                echo '<td class="'.$rowcolor.'"><a id="ContentPlaceHolder1_gvRequests_hlView_0" title="View" href="" target="_self">';
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


    
    
   </div>
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
<!-- Footer -->
<?php include_once('../shared/_footerview.php') ?>