<?php include_once('../../views/shared/_headerview.php');  ?>
<!--<?php include_once('../../../application/classes/UserService.php') ;?>-->
<?php include_once('../../../application/classes/DepartmentService.php') ;?>
<!--<?php include_once('../../../application/classes/TicketService.php') ;?>-->

<?php
    //$departmentservice = new DepartmentService();
    //$ticketservice = new TicketService();
   // Get Services
   //$services = $departmentservice->getServices();

   // Get All Departments
   //$departmentservices = $departmentservice->getAll();

    //if (!empty($_POST['user_name']) && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['department'])&& !empty($_POST['service'])&& !empty($_POST['password'])&& !empty($_POST['email']))
    if (!empty($_POST['department_name']))
    {
       
        $departmentname= $_POST['department_name'];
        $departmentdescription = $_POST['department_description'];
        
        $department = new DepartmentService();
        $department->adddepartment($departmentname,$departmentdescription);
        
        //header('Location: AddUsersView.php');
        //die();
    }
?>

   <form class="well form-horizontal" action="adddepartment.php" method="post"  id="contact_form">
      <fieldset>
         <!-- Form Name -->
         <legend>
            <center>
               <h2><b>Add Derpartment Form</b></h2>
            </center>
         </legend>
         <br>
         <!-- Text input-->
         <div class="form-group">
            <label class="col-md-4 control-label">Department Name</label>  
            <div class="col-md-4 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input  name="department_name" placeholder="Department Name" class="form-control"  type="text">
               </div>
            </div>
         </div>
         <!-- Text input-->
         <div class="form-group">
            <label class="col-md-4 control-label" >Department Description</label> 
            <div class="col-md-4 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="department_description" placeholder="Department Description" class="form-control"  type="text">
               </div>
            </div>
         </div>
     	
         
         <!-- Button -->
         <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4"><br>
            <button type="submit" class="btn btn-warning">Create<span class="glyphicon glyphicon-send"></span></button>
            <a class="btn btn-primary" href="departmentserviceview.php" role="button">Back</a>
            </div>
         </div>
         <!-- Success message -->
         <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>
      </fieldset>
   </form>







<?php include_once('../shared/_footerview.php') ?>
<script>
 $(document).ready(function() {
    $("#department").change(function()
        {
            $.ajax({ url: 'getservices.php',
            data: {departmentid: '1'},
            type: 'get',
            success: function(output) {
                      alert(output[1]);

                  }
            });
        
});
});
</script>