<?php include_once('../shared/_headerview.php') ?>
<?php include_once('../../../application/classes/DepartmentService.php') ;?>
    <!-- Page Content -->
   <!-- print User name and Id -->
<p> Welcome!  <?php echo $_SESSION['UserName']; echo $_SESSION['Id']; ?></p>
        
        <p>For Admin</p> 


        
    			<p>New Department and Services view page</p>
    		
			<div style=" align-content: center;"  class="well   row">
				<p>
					<a href="adddepartment.php" class="btn btn-success">Create New Department</a>
					<a href="addservice.php" class="btn btn-success">Add Services to Department</a>

				</p>
				<?php
 
		if ($_SESSION['Role']==3)
    {  
          
        $departmentservice= new DepartmentService();    

        $records = $departmentservice->getDepartmentsAndService();

        if (!empty($records))
        {
				
				echo '<table align="center" style="width:90%" class=" table table-sm table-striped table-bordered ">';
				echo '<fieldset>';
		        echo '<thead>';
		        echo '<tr>';
		        echo '<th>Department Id</th>';
		        echo '<th>Department Name</th>';
		        echo '<th>Service Name</th>';  
		        echo '<th>Action</th>';
		        echo '</tr>';
		        echo '</thead>';
		        echo '<tbody>';
		  
	 		foreach ($records as $row)
            {
                $DepartmentId = $row[0];
                $DepartmentName = $row[1];
                $ServiceName = $row[2];
             

						echo '<tr>';
						echo '<td>'.$DepartmentId.'</td>';
						echo '<td>'.$DepartmentName.'</td>';
						echo '<td>'.$ServiceName.'</td>';

						echo	   	'<td width=200>';
						echo	   	'<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
						echo	   	'<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
						echo	   	'</td>';
						echo	   	'</tr>';
						 }   
					}
				}
			?>		  
				      </tbody>
				  </fieldset>
	            </table>
    	</div>
   

         
        
       
    <!-- Footer -->
<?php include_once('../shared/_footerview.php') ?>