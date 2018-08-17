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
    
     //get all departments
     public function getAll(){
        return $this->getData("SELECT * FROM DEPARTMENTS");
     }

     //get all departments
     public function getDepartmentsAndService(){
        return $this->getData("SELECT Id,DEPARTMENTS.Name,SERVICES.NAME FROM DEPARTMENTS, SERVICES WHERE DEPARTMENTS.Id = SERVICES.DepartmentId");
     }

     public function getServices(){
        return $this->getData("SELECT DISTINCT(NAME), ID FROM SERVICES");
     }

     function getServicesByDepartment($departmentid){
        return $this->getData("SELECT DISTINCT(NAME), ID FROM SERVICES WHERE DEPARTMENTID=$departmentid");
     }
}

?>