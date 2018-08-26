<?php include_once('../../views/shared/_headerview.php');  ?>
<?php include_once('../../../application/classes/UserService.php') ;?>
<?php include_once('../../../application/classes/DepartmentService.php') ;?>
<?php include_once('../../../application/classes/TicketService.php') ;?>





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
    $departmentservice = new DepartmentService();
    $ticketservice = new TicketService();
   // Get Services
   $services = $departmentservice->getServices();
   // Get Department and services ones
   $servicesAndDepartment = $departmentservice->getDepartmentsAndService();
     
   // Get All Departments
   $departmentservices = $departmentservice->getAll();

   

    //if (!empty($_POST['user_name']) && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['department'])&& !empty($_POST['service'])&& !empty($_POST['password'])&& !empty($_POST['email']))
    if (!empty($_POST['user_name']))
    {
        echo 'inside';
        $username= $_POST['user_name'];
        $email = $_POST['email'];
        $password = $_POST['user_password'];
        $firstname = $_POST['first_name'];
        $lastname = $_POST['last_name'];
        $serviceid = $_POST['service'];
        $service = new UserService();
        $service->addUserwithServiceId($username, $email,$password,$firstname,$lastname ,2,$serviceid);

        //Success message 
          
         echo '<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>';
        
        //header('Location: AddUsersView.php');
        //die();
    }
?>

   <form class="well form-horizontal" action="signupstaff.php" method="post"  id="contact_form">
   <input type="hidden" id="token" name="token" value="<?php echo $_SESSION['token']; ?>"/>
    <fieldset>
         <!-- Form Name -->
         <legend>
            <center>
               <h2><b>Staff Registration Form</b></h2>
            </center>
         </legend>
         <br>
         <!-- Text input-->
         <div class="form-group">
            <label class="col-md-4 control-label">First Name</label>  
            <div class="col-md-4 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input  name="first_name" placeholder="First Name" class="form-control"  type="text">
               </div>
            </div>
         </div>
         <!-- Text input-->
         <div class="form-group">
            <label class="col-md-4 control-label" >Last Name</label> 
            <div class="col-md-4 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="last_name" placeholder="Last Name" class="form-control"  type="text">
               </div>
            </div>
         </div>
        <!-- <div class="form-group">
            <label class="col-md-4 control-label">Department</label>
            <div class="col-md-4 selectContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                  <select id="department" name="department" class="form-control selectpicker" onchange="return departmentid();">
                     <?php   
                       // echo '<option value="0">Select Department</option>';
                       // foreach ($departmentservices as $row)
                        {
                        //    echo '<option id="a" value="'.$row[0].'">'.$row[1].'</option>';
                        }
                        
                        
                        ?>
                          
                  </select>
               </div>
            </div>
         </div>-->
<!--<div><p><?php ;?></p></div>-->
         <div class="form-group">
            <label class="col-md-4 control-label">Service</label>
            <div class="col-md-4 selectContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                  <select id="service" name="service" class="form-control selectpicker">
                  <?php
                    echo '<option value="0">Select Service</option>';
                    
                    foreach ($servicesAndDepartment as $row)
                    {

                        echo '<option value="'.$row[3].'"> Department|>  '.$row[1].'.| Service|> '.$row[2].' </option>';
                    }
                    ?>                 
                  </select>
               </div>
            </div>
         </div>
            


         <!--<div><p><?php ;?></p></div>-->
        <!-- <div class="form-group">
            <label class="col-md-4 control-label">Service</label>
            <div class="col-md-4 selectContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                  <select id="service" name="service" class="form-control selectpicker">
                  <?php
                    //echo '<option value="0">Select Service</option>';
                    
                    //foreach ($services as $row)
                    {

                    //    echo '<option value="'.$row[1].'">'.$row[0].'</option>';
                    }
                    ?>                 
                  </select>
               </div>
            </div>
         </div>-->
         <!-- Text input-->
         <div class="form-group">
            <label class="col-md-4 control-label">Username</label>  
            <div class="col-md-4 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input  name="user_name" placeholder="Username" class="form-control"  type="text">
               </div>
            </div>
         </div>
         <!-- Text input-->
         <div class="form-group">
            <label class="col-md-4 control-label" >Password</label> 
            <div class="col-md-4 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="user_password" placeholder="Password" class="form-control"  type="password">
               </div>
            </div>
         </div>
         <!-- Text input-->
         <div class="form-group">
            <label class="col-md-4 control-label" >Confirm Password</label> 
            <div class="col-md-4 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="confirm_password" placeholder="Confirm Password" class="form-control"  type="password">
               </div>
            </div>
         </div>
         <!-- Text input-->
         <div class="form-group">
            <label class="col-md-4 control-label">E-Mail</label>  
            <div class="col-md-4 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                  <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
               </div>
            </div>
         </div>
    
        
         <!-- Select Basic -->
         
         <!-- Button -->
         <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4"><br> <button type="submit" class="btn btn-warning" >SUBMIT <span class="glyphicon glyphicon-send"></span></button>
             <a class="btn btn-primary" href="addusersview.php" role="button">Back</a> 
            </div>
         </div>
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
            dataType: "json",
            success: function(output) {
                      alert(output[1]);

                  }
            });
        
});
});
</script>