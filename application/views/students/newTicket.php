
<?php include_once('../../../application/classes/DepartmentService.php') ;?>
<?php include_once('../../../application/classes/TicketService.php') ;?>
<?php include_once('../../../application/classes/FileService.php') ;?>
<?php
    $departmentservice = new DepartmentService();
    $ticketservice = new TicketService();   
    $fileservice = new FileService();

    echo $_POST['service'];   

    //It gets the default mime types
    $mime_types = $fileservice->getMimetypes();

    //It gets the default size for files
    $default_file_size = $fileservice->getDefaultfilesize();

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
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

    if(!empty($_POST['department']) && !empty($_POST['service']) && !empty($_POST['comments']))
    {       
       
        $serviceid =$_POST['service'];
        $comments = $_POST['comments'];
        $userid = $_SESSION['Id'];  
        $formtoken = $_POST['token'];       

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
 <?php include_once('../shared/_headerview.php');?>
 <!-- print User name and Id -->
<p> Welcome!  <?php echo $_SESSION['UserName']; echo $_SESSION['Id']; ?></p>

      <form id="ticketform" action="newTicket.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="token" id="token" value="<?php echo $_SESSION['token'];?>">
        <!-- Select Department | Select Basic -->
            <div style="text-align: right; padding-left: 120px;" class="form-group row">
                <label style="padding-right: 120px;" class="col-md-4 col-form-label" for="selectbasic">Select Department</label>
                <div class="col-md-8">
                    <div class="row">
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
                        <div class="col-md-4">
                            <span id="departmentvalidation" style="text-align:left!important;"  class="label label-danger"> Please enter the required field</span>
                        </div>
                    </div>
                     
                   
                   

                </div>
            </div>

            <!-- Select Service  | Select Basic -->
            <div style="text-align: right; padding-left: 120px;" class="form-group row">
                <label style="padding-right: 120px;" class="col-md-4 col-form-label" for="selectbasic1">Select Service </label>
                <div class="col-md-8">
                <div class="row">
                        <div class="col-md-8"> 
                            <select style="width: 400px;" disabled id="service" name="service" class="form-control" placeholder="Select Service" required="required" autofocus="autofocus">
                                <?php
                                echo '<option value="0">Select Service</option>';
                                foreach ($services as $row)
                                {
                                    //echo '<option value="'.$row[1].'">'.$row[0].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Comment | Textarea -->
            <div style="text-align: right; padding-left: 120px;" class="form-group row">
                <label style="padding-right: 120px;" class="col-md-4 col-form-label" for="textarea">Order Comment</label>
                <div class="col-md-8">
                    <div class="row"> 
                                <div class="col-md-8"> 
                                    <textarea class="form-control" id="comments" name="comments"></textarea>
                                </div>
                                <div>
                                    <span id="commentsvalidation" style="text-align:left!important;"  class="label label-danger"> Please enter the required field</span>
                                </div>
                    </div>
                </div>
            </div>

            <!-- Upload File | File Button -->
            <div style="text-align: right; padding-left: 120px;" class="form-group row">
                <label style="padding-right: 120px;" class="col-md-4 col-form-label" for="filebutton">Upload File</label>
                <div class="col-md-8">
                    <input id="filebutton" name="filebutton" class="input-file" type="file"  accept="<?php echo $mime_types ?>"/>
                </div>
            </div>

            <!-- Upload File | File Button -->
            <div style="text-align: right; padding-left: 120px;" class="form-group row">
                <label style="padding-right: 120px;" class="col-md-4 col-form-label" for="filebutton1">Upload File</label>
                <div class="col-md-8">
                    <input id="filebutton1" name="filebutton1" class="input-file" type="file" accept="<?php echo $mime_types ?>">
                </div>
            </div>

            <!-- Upload File | File Button -->
            <div style="text-align: right; padding-left: 120px;" class="form-group row">
                <label style="padding-right: 120px;" class="col-md-4 col-form-label" for="filebutton2">Upload File</label>
                <div class="col-md-8">
                    <input id="filebutton2" name="filebutton2" class="input-file" type="file" accept="<?php echo $mime_types ?>">
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

     //Hidding validation
    function hideValidation()
    {
        $("#departmentvalidation").hide();
        $("#commentsvalidation").hide();
    }

    hideValidation();

    //SECURITY:
    //Validates and Verify size o file and type
    $(".input-file").change(function(){
        var size =parseInt(<?php echo $default_file_size?>);
        if(this.files[0].size > size){
            alert("File is too big!");
            this.value = "";
        };

        var ext = getFileExtension(this.files[0].name);

        switch(ext)
        {
            case 'txt':
            case 'rdp':
            case 'pdf':
            case 'jpg':
            case 'gif':
            case 'png':
            case 'webm':
            case 'doc':
            case 'docx':
            case 'xls':
            case 'xlsx':break;
            default: 
            {
                alert("File type not supported!");
                this.value = "";
                break;
            }
        }
        
    });

    //SECURITY:
    //Form validation
    $("#button1id").click(function()
    {
        var result =false;
        hideValidation();

        if ($("#department").val()!=="0")
        {
                if ($("#comments").val().length>0)
                {
                       
                        result=true;
                }
                else
                {
                    $("#commentsvalidation").show();
                }
        }
        else
        {
            $("#departmentvalidation").show();
        }

        if (result===true)
        {
            return;//this.submit();
        }
        else
        {
            event.preventDefault();
        }
    });

    $('#department').change( function() {       
        //Load with Ajax
        $.ajax({
            type: "POST",
            url: 'departmentserviceAPI.php',
            dataType:"json",            
            data: 'id='+ $("#department option:selected").text(),
            success: function(data){                     
                $("#service").empty();
                $.each(data, function(index, value) {
                    $('#service').append($('<option>').text(value).attr('value', index));
                    $('#service').removeAttr("disabled");
                });                
            }
        });

    });
});
function getFileExtension(filename) {
  return (/[.]/.exec(filename)) ? /[^.]+$/.exec(filename)[0] : undefined;
}    
</script> 