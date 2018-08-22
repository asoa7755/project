<?php
include_once('Repository.php');
include_once('../../interfaces/IDepartmentService.php');


class DepartmentService extends Repository implements IDepartmentService
{
    protected $_repository;

    public function __construct()
    {
        parent::__construct();  
    }
    // add Department 
    public function adddepartment($department_name,$department_description)
    {
        
        $this->execute("INSERT INTO departments (Name,Description) VALUES('$department_name','$department_description')");
        
    }
    // add service 
    public function addservice($department_Id,$service_name,$service_description)
    {
        
        $this->execute("INSERT INTO services (DepartmentId,Name,Description) VALUES('$department_Id','$service_name','$service_description')");
        
    }
    
     //get all departments
     public function getAll(){
        return $this->getData("SELECT * FROM DEPARTMENTS");
     }

     //get all departments
     public function getDepartmentsAndService(){
        return $this->getData("SELECT DEPARTMENTS.Id,DEPARTMENTS.Name,SERVICES.NAME,SERVICES.Id FROM DEPARTMENTS, SERVICES WHERE DEPARTMENTS.Id = SERVICES.DepartmentId ORDER BY DEPARTMENTS.Id");
     }

     public function getServices(){
        return $this->getData("SELECT DISTINCT(NAME), ID FROM SERVICES");
     }

     function getServicesByDepartment($departmentid){
        return $this->getData("SELECT DISTINCT(NAME), ID FROM SERVICES WHERE DEPARTMENTID=$departmentid");
     }

     function getServicesByDepartmentName($departmentname){
        return $this->getData("SELECT SERVICES.NAME FROM SERVICES,DEPARTMENTS WHERE SERVICES.DEPARTMENTID=DEPARTMENTS.ID AND DEPARTMENTS.NAME='".$departmentname."'");
     }
}

?>