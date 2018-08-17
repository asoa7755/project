<?php include_once('../../views/shared/_headerview.php');  ?>
<?php include_once('../../../application/classes/DepartmentService.php') ;?>
<?php
        $service = new DepartmentService();
        $departmentid = array(1, 2, 3, 4);
      /*  $allservices = $service->getServicesByDepartment($departmentid[0]);

        $listofservices = array();
        foreach($allservices as $row) {
            $listofservices[] = $row[0];
           }
           */
        //header('Content-Type: application/json');           
        echo json_encode($departmentid);
?>