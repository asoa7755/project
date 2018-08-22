<?php
interface IDepartmentService{
    //get all departments
    public function getAll();   
    
    //get all departments and services
    function getDepartmentsAndService();

    function getServices();

    function getServicesByDepartment($departmentid);

    // add Department 
    function adddepartment($department_name,$department_description);
    // add Service 
    function addservice($department_Id,$service_name,$service_description);

    function getServicesByDepartmentName($departmentname);
}
?>
