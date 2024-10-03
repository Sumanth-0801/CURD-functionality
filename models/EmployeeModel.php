<?php
// include_once $_SERVER['DOCUMENT_ROOT'].'/my_project/demo/modal/DBModal.php';
include '../models/DBModel.php';
class EmployeeModel extends DBModel
{
    private $query = "SELECT * FROM employee";
    
    // function __construct()
    // {
    //     parent::__construct();
    // }
    function getAllEmployeeInfo($s = [])
    {
        $query = "SELECT * FROM employee ORDER BY id ASC";
        $employeeResults = $this->getAllRows($query);
        if (!empty($employeeResults)) {
            return $employeeResults;
        }
        return false;
    }
    function addEmployee($data){ 
        $result_id = $this->insert('employee',$data);
       //echo $result_id; exit;
        return $result_id;
    }
    function updateEmployee($pData,$id){
        //  print_r($pData['event_image']); exit;
          if(!empty($id)){
              $cond = ['id'=>$id];
              $res = $this->update('employee',$pData,$cond);
              return $res;
          }
          return false;
      }
      function getEmployeeById($id){
        $query = $this->query;
        $query .= " WHERE id = ".$id; 
        //echo $query;die; 
        $result = $this->getRow($query);
        if(!empty($result)){
           //print_r($result); exit;
            return $result;
        }
        return false;
    }
    function deleteEmployee($id){
        $cond = ['id'=>$id];
        $res = $this->delete('employee',$cond);
        return false;
    }
}
