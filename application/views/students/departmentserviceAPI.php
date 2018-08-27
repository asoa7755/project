
<?php include_once('../../../application/classes/DepartmentService.php') ;?>
<?php include_once('../../../application/classes/ServiceViewModel.php');?>

<?php
if(!empty($_POST["id"]))
{
    $services = array();
    $departmentservice = new DepartmentService();
    $serviceresult = $departmentservice->getServicesByDepartmentName($_POST["id"]);
    $result="";

    foreach ($serviceresult as  $row)
    {
        $newservice= new ServiceViewModel();
        $newservice->id=$row[0];
        $newservice->servicename=$row[1];
 
        array_push($services,$newservice);
        //$newservice= new ServiceViewModel($row[0],$row[1]);
        //array_push($services,$newservice);
        //$result= $result. '<option value="'.$row[0].'">'.$row[1].'</option>'; 
        //array_push($services,$row[0]);
    }

    //echo $result;
    echo json_encode($services);
}
?>