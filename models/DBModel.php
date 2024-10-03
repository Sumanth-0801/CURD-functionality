<?php
//  require_once "../dbconnection.php";
include '../dbconnection.php';



class DBModel{

    public $server = SERVER;
	public $userName = USERNAME;
	public $password = PASSWORD;
	public $dataBase = DATABASE;
    public $db;

    function __construct()
    {
        //echo $this->dataBase;die; 
        date_default_timezone_set('Asia/Kolkata');
        try{
            $this->db = mysqli_connect($this->server, $this->userName, $this->password, $this->dataBase);
            //var_dump($this->db);die;
        }
        catch(Exception $e) {
			echo $e->getMessage();			 
		}
        
    }
    
    public function insert($table_name, $data)
    {
        //echo"two";die;
        $fields = array_keys($data);
        $fields = implode(',', $fields);
        $values = array_values($data);
        $values = implode('","', $values);
        $sql = 'INSERT INTO `' . $table_name . '` (' . $fields . ') VALUES ("' . $values . '")';  
       
        mysqli_query($this->db, $sql);
        $return = mysqli_insert_id($this->db);
        return $return;
    }
    public function update($table_name, $data, $update_by)
    {
        $update = '';
        foreach ($data as $key => $value) {
            $update .= $key . '="' . $value . '",';
        }
        $update = trim($update, ",");
        $update_by_key = "";
        foreach ($update_by as $key => $value) {
            $update_by_key .= $key . "='" . $value . "' AND ";
        }
        $update_by_key = trim($update_by_key, " AND ");
        $sql = "UPDATE " . $table_name . " SET " . $update . " WHERE " . $update_by_key . "";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }

    function getAllRows($query)
    {
        $values = array();
        $res = mysqli_query($this->db, $query);
        while ($rows = @mysqli_fetch_assoc($res)) {
            $values[] = $rows;
        }
        return $values;
    }
    public function getRow($query)
    {
        $res = mysqli_query($this->db, $query);// or die("getrow error". mysqli_error());
        $values = mysqli_fetch_assoc($res);  // to getch the values in object formate
        if (!empty($values)) {
            return $values;
        }
        return false;
    }
    
    public function delete($table_name, $delete_by)
    {      
        $delete_by_key = "";
        foreach ($delete_by as $key => $value) {
            $delete_by_key .= $key . "='" . $value . "' AND ";
        }
        $delete_by_key = trim($delete_by_key, " AND ");
        $sql = "DELETE FROM  " . $table_name . "  WHERE " . $delete_by_key . "";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }

    

    

    
    
}


