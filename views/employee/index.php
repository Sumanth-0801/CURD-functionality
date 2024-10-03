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
</style>

<body class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <span class="h4" style="text-align: center;">Employee Information</span>
            <div class="pull-right">
                <?php  ?>
                <a href="../employee/form.php" class="btn btn-primary btn-sm " style="float: right;"><i class="fa fa-plus"></i> Add</a>
                <?php  ?>
            </div>
        </div>
        <div class="box-body pt-4">
            <div class="table-responsive">
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th class="">S.No</th>
                            <th class="">Employee Name</th>
                            <th class="">Employee Number</th>
                            <th class="">Employee Designation</th>
                            <th class="">Employee Salary</th>
                            <th class="">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($employee)) {
                            $i = 1;
                            foreach ($employee as $employees) { ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td>
                                        <?php echo !empty($employees['employee_name']) ? $employees['employee_name'] : ''; ?>
                                    </td>
                                    <td>
                                        <?php echo !empty($employees['employee_number']) ? $employees['employee_number'] : ''; ?>
                                    </td>
                                    <td>
                                        <?php echo !empty($employees['employee_designation']) ? $employees['employee_designation'] : ''; ?>
                                    </td>
                                    <td>
                                        <?php echo !empty($employees['employee_salary']) ? $employees['employee_salary'] : ''; ?>
                                    </td>
                                    <td>
                                        <a href="http://localhost/my_project1/employee/edit.php?id=<?php echo $employees['id']; ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit </a>
                                        <a href="#" class="btn btn-xs btn-danger delete" data-id="<?php echo $employees['id']; ?>"><i class="fa fa-remove"></i> Remove </a>
                                    </td>

                                </tr>
                        <?php $i++;
                            }
                        } else {
                            echo "<tr><th colspan='6' class='text-center text-danger'>No data found </th></tr>";
                        } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $(".delete").on('click', function(e) {
            e.preventDefault();
            var th = $(this);
            var id = th.data('id');
            //  alert(id);
            var res = window.confirm("Are you sure to remove this events ");
            if (res) {
                $.ajax({
                    url: 'delete.php',
                    type: "POST", // Use POST method to send data
                    data: {
                        id: id
                    }, // Pass the ID as data
                    dataType: "json",
                    success: function(data) {
                        if (data == true) {
                            location.reload();
                        }
                    }
                })
            }
        });


       
    })
</script>

</html>