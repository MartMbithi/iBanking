<?php
session_start();
include('conf/config.php');
include('conf/checklogin.php');
check_login();
$staff_id = $_SESSION['staff_id'];

if (isset($_POST['update_client_account'])) {
    //update client
    $name = $_POST['name'];
    $national_id = $_POST['national_id'];
    $client_number = $_GET['client_number'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    //$password = sha1(md5($_POST['password']));
    $address  = $_POST['address'];

    $profile_pic  = $_FILES["profile_pic"]["name"];
    move_uploaded_file($_FILES["profile_pic"]["tmp_name"], "../admin/dist/img/" . $_FILES["profile_pic"]["name"]);

    //Insert Captured information to a database table
    $query = "UPDATE  iB_clients SET name=?, national_id=?, phone=?, email=?, address=?, profile_pic=? WHERE client_number = ?";
    $stmt = $mysqli->prepare($query);
    //bind paramaters
    $rc = $stmt->bind_param('sssssss', $name, $national_id, $phone, $email,  $address, $profile_pic, $client_number);
    $stmt->execute();

    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Client Account Updated";
    } else {
        $err = "Please Try Again Or Try Later";
    }
}
//change password
if (isset($_POST['change_client_password'])) {
    $password = sha1(md5($_POST['password']));
    $client_number = $_GET['client_number'];
    //insert unto certain table in database
    $query = "UPDATE iB_clients  SET password=? WHERE  client_number=?";
    $stmt = $mysqli->prepare($query);
    //bind paramaters
    $rc = $stmt->bind_param('ss', $password, $client_number);
    $stmt->execute();
    //declare a varible which will be passed to alert function
    if ($stmt) {
        $success = "Client Password Updated";
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
            <!-- Content Header with logged in user details (Page header) -->
            <?php
            $client_number = $_GET['client_number'];
            $ret = "SELECT * FROM  iB_clients  WHERE client_number = ? ";
            $stmt = $mysqli->prepare($ret);
            $stmt->bind_param('s', $client_number);
            $stmt->execute(); //ok
            $res = $stmt->get_result();
            while ($row = $res->fetch_object()) {
                //set automatically logged in user default image if they have not updated their pics
                if ($row->profile_pic == '') {
                    $profile_picture = "

                        <img class='img-fluid'
                        src='../admin/dist/img/user_icon.png'
                        alt='User profile picture'>

                        ";
                } else {
                    $profile_picture = "

                        <img class=' img-fluid'
                        src='../admin/dist/img/$row->profile_pic'
                        alt='User profile picture'>

                        ";
                }


            ?>
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1><?php echo $row->name; ?> Profile</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="pages_dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="pages_manage_clients.php">iBanking Clients</a></li>
                                    <li class="breadcrumb-item"><a href="pages_manage_clients.php">Manage</a></li>
                                    <li class="breadcrumb-item active"><?php echo $row->name; ?></li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">

                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <?php echo $profile_picture; ?>
                                        </div>

                                        <h3 class="profile-username text-center"><?php echo $row->name; ?></h3>

                                        <p class="text-muted text-center">Client @iBanking </p>

                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>ID No.: </b> <a class="float-right"><?php echo $row->national_id; ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Email: </b> <a class="float-right"><?php echo $row->email; ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Phone: </b> <a class="float-right"><?php echo $row->phone; ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>ClientNo: </b> <a class="float-right"><?php echo $row->client_number; ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Address: </b> <a class="float-right"><?php echo $row->address; ?></a>
                                            </li>

                                        </ul>

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                                <!-- About Me Box 
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                    </div>
                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i> Education</strong>

                        <p class="text-muted">
                        B.S. in Computer Science from the University of Tennessee at Knoxville
                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                        <p class="text-muted">Malibu, California</p>

                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                        <p class="text-muted">
                        <span class="tag tag-danger">UI Design</span>
                        <span class="tag tag-success">Coding</span>
                        <span class="tag tag-info">Javascript</span>
                        <span class="tag tag-warning">PHP</span>
                        <span class="tag tag-primary">Node.js</span>
                        </p>

                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    </div>
                    <!-- /.card -->
                            </div>

                            <!-- /.col -->
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header p-2">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item"><a class="nav-link active" href="#update_Profile" data-toggle="tab">Update Profile</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#Change_Password" data-toggle="tab">Change Password</a></li>
                                        </ul>
                                    </div><!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <!-- / Update Profile -->
                                            <div class="tab-pane active" id="update_Profile">
                                                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="name" required class="form-control" value="<?php echo $row->name; ?>" id="inputName">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                        <div class="col-sm-10">
                                                            <input type="email" name="email" required value="<?php echo $row->email; ?>" class="form-control" id="inputEmail">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName2" class="col-sm-2 col-form-label">Phone Number</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" required name="phone" value="<?php echo $row->phone; ?>" id="inputName2">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName2" class="col-sm-2 col-form-label">National ID Number</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" required readonly name="national_id" value="<?php echo $row->national_id; ?>" id="inputName2">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName2" class="col-sm-2 col-form-label">Address</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" required name="address" value="<?php echo $row->address; ?>" id="inputName2">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName2" class="col-sm-2 col-form-label">Profile Picture</label>
                                                        <div class="input-group col-sm-10">
                                                            <div class="custom-file">
                                                                <input type="file" name="profile_pic" class=" form-control custom-file-input" id="exampleInputFile">
                                                                <label class="custom-file-label  col-form-label" for="exampleInputFile">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="offset-sm-2 col-sm-10">
                                                            <button name="update_client_account" type="submit" class="btn btn-outline-success">Update Account</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- /Change Password -->
                                            <div class="tab-pane" id="Change_Password">
                                                <form method="post" class="form-horizontal">
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Old Password</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" class="form-control" required id="inputName">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail" class="col-sm-2 col-form-label">New Password</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" name="password" class="form-control" required id="inputEmail">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName2" class="col-sm-2 col-form-label">Confirm New Password</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" class="form-control" required id="inputName2">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="offset-sm-2 col-sm-10">
                                                            <button type="submit" name="change_client_password" class="btn btn-outline-primary">Change Password</button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                            <!-- /.tab-pane -->
                                        </div>
                                        <!-- /.tab-content -->
                                    </div><!-- /.card-body -->
                                </div>
                                <!-- /.nav-tabs-custom -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->

            <?php } ?>
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
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>

</html>