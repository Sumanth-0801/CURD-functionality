<?php
// include_once '../employe/add.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<style>
    .box {
        position: relative;
        border-radius: 3px;
        background: #ffffff;
        border-top: 3px solid #d2d6de;
        margin-bottom: 20px;
        width: 80%;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        margin: 0% auto;
    }

    .content {
        min-height: 250px;
        padding: 15px;
        margin-right: auto;
        margin-left: auto;
        padding-left: 15px;
        padding-right: 15px;
    }

    label#employee_name-error {
        color: red;
    }
    label#employee_number-error {
        color: red;
    }
    label#employee_designation-error {
        color: red;
    }
    label#employee_salary-error {
        color: red;
    }

</style>

<body class="content">
    <div class="box box-default">
        <div class="box-header with-border pt-4">
            <span class="h5">Employess Info</span>
            <a href="../employee/index.php" class="btn btn-primary btn-sm pull-right" style="float: right;" title="Back"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="box-body pt-2">
            <form method="POST" id="form"  class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo !empty($employee['id']) ? $employee['id'] : ''; ?>" />
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Employee Name</label>
                            <div class="col-md-12">
                                <input type="text" name="employee_name" id="employee_name" class="form-control" value="<?php echo !empty($employee['employee_name']) ? $employee['employee_name'] : ''; ?>" aria-invalid="false" maxlength="45" placeholder="Employee Name *" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' required>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Employee Number</label>
                            <div class="col-md-12">
                                <input type="tel" name="employee_number" id="employee_number" class="form-control" value="<?php echo !empty($employee['employee_number']) ? $employee['employee_number'] : ''; ?>" aria-invalid="false"  placeholder="Phone* " maxlength="10" pattern="[6-9]{1}[0-9]{9}"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Employee Designation</label>
                            <div class="col-md-12">
                                <input type="text" name="employee_designation" id="employee_designation" class="form-control" value="<?php echo !empty($employee['employee_designation']) ? $employee['employee_designation'] : ''; ?>" aria-invalid="false" maxlength="15" placeholder="Employee Designation *" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Employee Salary</label>
                            <div class="col-md-12">
                                <input type="text" name="employee_salary" id="employee_salary" class="form-control" value="<?php echo !empty($employee['employee_salary']) ? $employee['employee_salary'] : ''; ?>" aria-invalid="false" placeholder="Employee Salary *" maxlength="10" pattern="[6-9]{1}[0-9]{9}"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-2 pb-2 text-center">
                    <button type="submit" class="btn btn-primary text-center"><i class="fa fa-save"></i> Save</button>
                </div>

            </form>
        </div>
    </div>
</body>
<script src="
https://cdn.jsdelivr.net/npm/jquery-validation@1.20.0/dist/jquery.validate.min.js
"></script>
<script>
    $(document).ready(function() {
        $("#form").validate({
            ignore: ".ignore",
            rules: {
                employee_name: {
                    required: true
                },
                employee_number: {
                    required: true
                },
                employee_designation: {
                    required: true
                },
                employee_salary: {
                    required: true
                },
            },
            messages: {
                employee_name: "Please enter your Employer Name",
                employee_number: "Please enter your Employer Number",
                employee_designation: "Please enter your Employer Designation",
                employee_salary: "Please enter your Employer Salary",
            }
        });
        $.ajax({
            type: "POST",
            cache: false,
            dataType: 'json',
            url: "my_project\demo\employe/add.php",
            data: data,
            success: function(res) {
                alert("inserted successfully");
            },
            error: function() {
                alert('Failed to Load data');
            }
        });
    });
</script>

</html>