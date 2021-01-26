<?php
session_start();
include('conf/config.php');
include('conf/checklogin.php');
check_login();
$admin_id = $_SESSION['admin_id'];
if (isset($_POST['create_acc_type'])) {
    //Register  account type
    $name = $_POST['name'];
    $description = $_POST['description'];
    $rate = $_POST['rate'];
    $code = $_POST['code'];

    //Insert Captured information to a database table
    $query = "INSERT INTO iB_Acc_types (name, description, rate, code) VALUES (?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    //bind paramaters
    $rc = $stmt->bind_param('ssss', $name, $description, $rate, $code);
    $stmt->execute();

    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "iBank Account Category Created";
    } else {
        $err = "Please Try Again Or Try Later";
    }
}

?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php include("dist/_partials/head.php"); ?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include("dist/_partials/nav.php"); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include("dist/_partials/sidebar.php"); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Create iBank Account Categories</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="pages_dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="pages_add_acc_type.php">iBanking</a></li>
                                <li class="breadcrumb-item active">Add</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Fill All Fields</h3>
                                </div>
                                <!-- form start -->
                                <form method="post" enctype="multipart/form-data" role="form">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class=" col-md-4 form-group">
                                                <label for="exampleInputEmail1">Account Category Name</label>
                                                <input type="text" name="name" required class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class=" col-md-4 form-group">
                                                <label for="exampleInputEmail1">Account Category Rates % Per Year </label>
                                                <input type="text" name="rate" required class="form-control" id="exampleInputEmail1">
                                            </div>
                                            <div class=" col-md-4 form-group">
                                                <label for="exampleInputPassword1">Account Category Code</label>
                                                <?php
                                                //PHP function to generate random passenger number
                                                $length = 5;
                                                $_Number =  substr(str_shuffle('0123456789QWERTYUIOPLKJHGFDSAZXCVBNM'), 1, $length);
                                                ?>
                                                <input type="text" readonly name="code" value="ACC-CAT-<?php echo $_Number; ?>" class="form-control" id="exampleInputPassword1">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class=" col-md-12 form-group">
                                                <label for="exampleInputEmail1">Account Category Decription</label>
                                                <textarea type="text" name="description" required class="form-control" id="desc"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" name="create_acc_type" class="btn btn-primary">Add Account Type</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include("dist/_partials/footer.php"); ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
    <!--Load CK EDITOR Javascript-->
    <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('desc')
    </script>
    </script>
</body>

</html>