<?php
//include_once $_SERVER['DOCUMENT_ROOT'] . '/my_project/demo/modal/EmployeeModal.php';
include '../models/EmployeeModel.php';

class Employee
{
    public function __construct()
    {
        // parent::__construct();
        require_once '../models/EmployeeModel.php';
        $this->EmployeeModel = new EmployeeModel();
        $id = !empty($_GET['id']) ? $_GET['id'] : '';
    }

    public function index()
    {
        $data = [];
        $data['title'] = ':: Employee Info ::';
        $data['employee'] = $this->EmployeeModel->getAllEmployeeInfo();
        
        $this->_admin_template('employee/index', $data);
    }
    public function add($s=[])
    { //die;
        if (!empty($_POST)) {
            $data = [];
            $data['employee_name'] = !empty($_POST['employee_name']) ? trim($_POST['employee_name']) : '';
            $data['employee_number'] = !empty($_POST['employee_number']) ? trim($_POST['employee_number']) : '';
            $data['employee_designation'] = !empty($_POST['employee_designation']) ? trim($_POST['employee_designation']) : '';
            $data['employee_salary'] = !empty($_POST['employee_salary']) ? trim($_POST['employee_salary']) : '';
            $insert_id = $this->EmployeeModel->addEmployee($data);
            if (!empty($insert_id)) {
                $_SESSION['message'] = "Employee Data Added Successfully";
                //header('Location:/my_project/demo/employe/index.php/');
                exit();
            } else {
                $_SESSION['error'] = "Failed to add Employee";
                $data['employee'] = $_POST;
            }
        }
        // $data['setting_categories'] = $this->siteSettingCategoryModel->getAllSiteSettingCats();
        // $data['products'] = $this->productModel->getProductsList(['is_active' => 1]);
        $this->_admin_template('employee/form', $data);
    }
    public function edit()
    {
        $id = !empty($_GET['id']) ? $_GET['id'] : '';
        if ($_POST) {
            $data = [];
            $data['employee_name'] = !empty($_POST['employee_name']) ? trim($_POST['employee_name']) : '';
            $data['employee_number'] = !empty($_POST['employee_number']) ? trim($_POST['employee_number']) : '';
            $data['employee_designation'] = !empty($_POST['employee_designation']) ? trim($_POST['employee_designation']) : '';
            $data['employee_salary'] = !empty($_POST['employee_salary']) ? trim($_POST['employee_salary']) : '';
            $insert_id = $this->EmployeeModel->updateEmployee($data,$id);
            if (!empty($insert_id)) {
                $_SESSION['message'] = "Employee Data Added Successfully";
                header('Location:/my_project/demo/employe/index.php/');
                exit();
            } else {
                $_SESSION['error'] = "Failed to add Site Settings";
                $data['employee'] = $_POST;
            }
        }
        if(!empty($id) && empty($data['employee'])){ 
            $data['employee'] = $this->EmployeeModel->getEmployeeById($id);

        }

        $this->_admin_template('employee/form', $data);
    }
    public function delete()
    {     
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $del = $this->EmployeeModal->deleteEmployee($id);
            if(!empty($del)){
                return $del;
            }
        }
        
        
    }
    
    public function _admin_template($filePath, $variables = array())
    {
        if (!empty($variables)) {
            extract($variables);
            ob_start();
        }
        require_once $_SERVER['DOCUMENT_ROOT'] . '/my_project1/views/'.  $filePath . '.php';
    }
}
