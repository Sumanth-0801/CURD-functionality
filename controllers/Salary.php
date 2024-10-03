<?php
// echo include_once $_SERVER['DOCUMENT_ROOT'] . '/my_project1/models/SalaryModal.php';die;
include '../models/SalaryModel.php';

class Salary
{
    public function __construct()
    {

        // parent::__construct();
        require_once '../models/SalaryModel.php';
        $this->SalaryModel = new SalaryModel();
        $id = !empty($_GET['id']) ? $_GET['id'] : '';
    }

    public function index()
    {
        $data = [];
        $data['title'] = ':: Salary Info ::';
        $data['salary'] = $this->SalaryModel->getAllSalaryInfo();
        $this->_admin_template('salary/index', $data);
    }
    
    public function add($s=[])
    { //die;
        if (!empty($_POST)) {
            $data = [];
            $data['name'] = !empty($_POST['name']) ? trim($_POST['name']) : '';
            $data['experience'] = !empty($_POST['experience']) ? trim($_POST['experience']) : '';
            $data['salary'] = !empty($_POST['salary']) ? trim($_POST['salary']) : '';
            $insert_id = $this->SalaryModel->addSalary($data);
            if (!empty($insert_id)) {
                $_SESSION['message'] = "Employee Data Added Successfully";
                //header('Location:/my_project/demo/employe/index.php/');
                exit();
            } else {
                $_SESSION['error'] = "Failed to add Site Settings";
                $data['salary'] = $_POST;
            }
        }
        // $data['setting_categories'] = $this->siteSettingCategoryModel->getAllSiteSettingCats();
        // $data['products'] = $this->productModel->getProductsList(['is_active' => 1]);
        $this->_admin_template('salary/form', $data);
    }
    public function edit()
    {
        $id = !empty($_GET['id']) ? $_GET['id'] : '';
        if ($_POST) {
            $data = [];
            $data['name'] = !empty($_POST['name']) ? trim($_POST['name']) : '';
            $data['experience'] = !empty($_POST['experience']) ? trim($_POST['experience']) : '';
            $data['salary'] = !empty($_POST['salary']) ? trim($_POST['salary']) : '';
            $insert_id = $this->SalaryModel->updateSalary($data,$id);
            if (!empty($insert_id)) {
                $_SESSION['message'] = "Employee Data Added Successfully";
                header('Location:/my_project1/salary/index.php');
                exit();
            } else {
                $_SESSION['error'] = "Failed to add Site Settings";
                $data['salary'] = $_POST;
            }
        }
        if(!empty($id) && empty($data['salary'])){ 
            $data['salary'] = $this->SalaryModel->getSalaryById($id);
        }

        $this->_admin_template('salary/form', $data);
        // $data['setting_categories'] = $this->siteSettingCategoryModel->getAllSiteSettingCats();
        // $data['products'] = $this->productModel->getProductsList(['is_active' => 1]);
    }
    
    public function delete()
    {     
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $del = $this->SalaryModel->deleteSalary($id);
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
