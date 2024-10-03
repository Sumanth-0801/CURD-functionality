<?php
echo "one";die;
include_once '../controllers/Salary.php';
$data = new Salary();
$data->add();
