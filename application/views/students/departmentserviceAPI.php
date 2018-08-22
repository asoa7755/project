
<?php include_once('../../../application/classes/DepartmentService.php') ;?>

<?php
if(!empty($_POST["id"]))
{
    $services = array();
    $departmentservice = new DepartmentService();
    $serviceresult = $departmentservice->getServicesByDepartmentName($_POST["id"]);

    foreach ($serviceresult as  $row)
    {
        array_push($services,$row[0]);
    }

    echo json_encode($services);
}
?>