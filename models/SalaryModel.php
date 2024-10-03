<?php
include '../models/DBModel.php';
class SalaryModel extends DBModel
{
    private $query = "SELECT * FROM salary";
    
    // function __construct()
    // {
    //     parent::__construct();
    // }
    function getAllSalaryInfo($s = [])
    {
        $query = "SELECT * FROM salary ORDER BY id ASC";
        $salaryResults = $this->getAllRows($query);
        if (!empty($salaryResults)) {
            return $salaryResults;
        }
        return false;
    }
    function addSalary($data){ 
        $result_id = $this->insert('salary',$data);
       //echo $result_id; exit;
        return $result_id;
    }
    function updateSalary($pData,$id){
        //  print_r($pData['event_image']); exit;
          if(!empty($id)){
              $cond = ['id'=>$id];
              $res = $this->update('salary',$pData,$cond);
              return $res;
          }
          return false;
      }
      function getSalaryById($id){
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
    function deleteSalary($id){
        $cond = ['id'=>$id];
        $res = $this->delete('salary',$cond);
        return false;
    }
}
