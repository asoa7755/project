<?php include_once('../shared/_headerview.php') ?>
<?php include_once('../../../application/classes/UserService.php') ;?>
    <!-- Page Content -->
   <!-- print User name and Id -->
<p> Welcome!  <?php echo $_SESSION['UserName']; echo $_SESSION['Id']; ?></p>
        
       
        <div class="container">
    			<h3>Add/Edit/Update/delete Users</h3>
    			<p>For Admin</p> 
    		</div>
			<div class="well row">
				<p>
					<a href="signup.php" class="btn btn-success">Create New User (Student)</a>
					<a href="signupstaff.php" class="btn btn-success">Create New User (Staff)</a>
				</p>
				<?php
 
		if ($_SESSION['Role']==3)
    {  
          
        $userservice= new UserService();    

        $records = $userservice->getalluser();

        if (!empty($records))
        {
				
				echo '<table class=" table table-striped table-bordered table-responsive">';
				echo '<fieldset>';
		        echo '<thead>';
		        echo '<tr>';
		        echo '<th>Id</th>';
		        echo '<th>First Name</th>';
		        echo '<th>Last Name</th>';
		        echo '<th>Email</th>';
		        echo '<th>UserName</th>';
		        echo '<th>Password</th>';
		        echo '<th>Role</th>';
		        echo '<th>Service Id</th>';
		        echo '<th>Action</th>';
		        echo '</tr>';
		        echo '</thead>';
		        echo '<tbody>';
		  
	 		foreach ($records as $row)
            {
                $UserId = $row[0];
                $FirstName = $row[1];
                $LastName = $row[2];
                $Email = $row[3];
                $UserName = $row[4];
                $Password = $row[5];
                $Role = $row[6];
                $ServiceId = $row[7];	
             

						echo '<tr>';
						echo '<td>'.$UserId.'</td>';
						echo '<td>'.$FirstName.'</td>';
						echo '<td >'.$LastName.'</td>';
						echo '<td>'.$Email.'</td>';
						echo '<td>'.$UserName.'</td>';
						echo '<td >'.$Password.'</td>';
						echo '<td>'.$Role.'</td>';
						echo '<td >'.$ServiceId.'</td>';

						echo	   	'<td width=200>';
						echo	   	'<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
						echo	   	'<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
						echo	   	'</td>';
						echo	   	'</tr>';
						 }   
					}
				}
			?>		  
				      <!--</tbody>
				  </fieldset>
	            </table>
    	</div>-->
    </div>

         
        
       
    <!-- Footer -->
<?php include_once('../shared/_footerview.php') ?>