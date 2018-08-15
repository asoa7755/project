
<?php include_once('../../../application/classes/DepartmentService.php') ;?>
<?php include_once('../../../application/classes/TicketService.php') ;?>

<?php
    $departmentservice = new DepartmentService();
    $ticketservice = new TicketService();    
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(!empty($_POST['department']) && !empty($_POST['service']) && !empty($_POST['comments']))
    {       
       
        $serviceid =$_POST['service'];
        $comments = $_POST['comments'];
        $userid = $_SESSION['Id'];       

        $newticketid= $ticketservice->addandGetId($userid, $serviceid,1,$comments);

        if (!empty($_FILES['filebutton']["tmp_name"]))
        {
            $image=base64_encode(file_get_contents($_FILES['filebutton']["tmp_name"]));
            $ticketservice->addImage($newticketid, $userid,  $_FILES ["filebutton"]["name"],pathinfo($_FILES ["filebutton"]["name"], PATHINFO_EXTENSION),$image);           
        }
        if (!empty($_FILES['filebutton1']["tmp_name"]))
        {
            $image=base64_encode(file_get_contents($_FILES['filebutton1']["tmp_name"]));
            $ticketservice->addImage($newticketid, $userid,  $_FILES ["filebutton1"]["name"],pathinfo($_FILES ["filebutton1"]["name"], PATHINFO_EXTENSION),$image);           
        }
        if (!empty($_FILES['filebutton2']["tmp_name"]))
        {
            echo "in two" . $_FILES['filebutton2']["tmp_name"];
            $image=base64_encode(file_get_contents($_FILES['filebutton2']["tmp_name"]));
            $ticketservice->addImage($newticketid, $userid,  $_FILES ["filebutton2"]["name"],pathinfo($_FILES ["filebutton2"]["name"], PATHINFO_EXTENSION),$image);           
        }

        header('Location: mainStudent.php');
        die();

    }
     

    
    // Get Services
    $services = $departmentservice->getServices();

    // Get All Departments
    $departmentservices = $departmentservice->getAll();

    // Get comments from form
    $alldepartmentsandservices = $departmentservice->getDepartmentsAndService();

    // Upload 4 files

?>
 <?php include_once('../shared/_headerview.php');  ?>
      <form action="newTicket.php" method="post" enctype="multipart/form-data">

        <!-- Select Department | Select Basic -->
            <div style="text-align: right; padding-left: 120px;" class="form-group row">
                <label style="padding-right: 120px;" class="col-md-4 col-form-label" for="selectbasic">Select Department</label>
                <div class="col-md-8">
                    <select style="width: 400px;" id="department" name="department" class="form-control" placeholder="Select Department" required="required" autofocus="autofocus">
                        <?php   
                        echo '<option value="0">Select Department</option>';
                        foreach ($departmentservices as $row)
                        {
                            echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Select Service  | Select Basic -->
            <div style="text-align: right; padding-left: 120px;" class="form-group row">
                <label style="padding-right: 120px;" class="col-md-4 col-form-label" for="selectbasic1">Select Service </label>
                <div class="col-md-8">
                    <select style="width: 400px;" id="service" name="service" class="form-control" placeholder="Select Service" required="required" autofocus="autofocus">
                    <?php
                    echo '<option value="0">Select Service</option>';
                    foreach ($services as $row)
                    {
                        echo '<option value="'.$row[1].'">'.$row[0].'</option>';
                    }
                    ?>
                    </select>
                </div>
            </div>

            <!-- Order Comment | Textarea -->
            <div style="text-align: right; padding-left: 120px;" class="form-group row">
                <label style="padding-right: 120px;" class="col-md-4 col-form-label" for="textarea">Order Comment</label>
                <div class="col-md-8">
                    <textarea class="form-control" id="comments" name="comments">default text</textarea>
                </div>
            </div>

            <!-- Upload File | File Button -->
            <div style="text-align: right; padding-left: 120px;" class="form-group row">
                <label style="padding-right: 120px;" class="col-md-4 col-form-label" for="filebutton">Upload File</label>
                <div class="col-md-8">
                    <input id="filebutton" name="filebutton" class="input-file" type="file">
                </div>
            </div>

            <!-- Upload File | File Button -->
            <div style="text-align: right; padding-left: 120px;" class="form-group row">
                <label style="padding-right: 120px;" class="col-md-4 col-form-label" for="filebutton1">Upload File</label>
                <div class="col-md-8">
                    <input id="filebutton1" name="filebutton1" class="input-file" type="file">
                </div>
            </div>

            <!-- Upload File | File Button -->
            <div style="text-align: right; padding-left: 120px;" class="form-group row">
                <label style="padding-right: 120px;" class="col-md-4 col-form-label" for="filebutton2">Upload File</label>
                <div class="col-md-8">
                    <input id="filebutton2" name="filebutton2" class="input-file" type="file">
                </div>
            </div>

            <!--  | Button (Double) -->
            <div style="direction: inherit;"class="form-group row">
                <label class="col-md-4 col-form-label" for="button1id"></label>
                <div class="col-md-8">
                    <button id="button1id" name="button1id" class="btn btn-success">Submit</button>
                    <button id="button2id" name="button2id" class="btn btn-danger">Cancel </button>
                </div>
            </div>

            </form>

                </div>  </div></div>   


         
        
    <!-- Footer -->
<?php include_once('../shared/_footerview.php') ?>

<script>
$(document).ready(function() {
    $('#department').change( function() {
        //Load with Ajax
        
    });
});    
</script> 