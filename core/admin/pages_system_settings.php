<?php
session_start();
include('conf/config.php');
include('conf/checklogin.php');
check_login();
if (isset($_POST['systemSettings'])) {
  //Error Handling and prevention of posting double entries
  $error = 0;
  if (isset($_POST['sys_name']) && !empty($_POST['sys_name'])) {
    $sys_name = mysqli_real_escape_string($mysqli, trim($_POST['sys_name']));
  } else {
    $error = 1;
    $err = "System Name Cannot Be Empty";
  }
  if (!$error) {
    $id = $_POST['id'];
    $sys_tagline = $_POST['sys_tagline'];
    $sys_logo = $_FILES['sys_logo']['name'];
    move_uploaded_file($_FILES["sys_logo"]["tmp_name"], "dist/img/" . $_FILES["sys_logo"]["name"]);

    $query = "UPDATE iB_SystemSettings SET sys_name =?, sys_logo =?, sys_tagline=? WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssss',  $sys_name,  $sys_logo, $sys_tagline, $id);
    $stmt->execute();
    if ($stmt) {
      $success = "Settings Updated" && header("refresh:1; url=pages_system_settings.php");
    } else {
      //inject alert that profile update task failed
      $info = "Please Try Again Or Try Later";
    }
  }
}
?>

<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php include("dist/_partials/head.php"); ?>

<body class="hold-transition sidebar-mini">
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
              <h1>System Settings</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="pages_dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active">System Settings</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Reconfigure This System Accordingly</h3>
              </div>
              <div class="card-body">
                <?php
                /* Persisit System Settings On Brand */
                $ret = "SELECT * FROM `iB_SystemSettings` ";
                $stmt = $mysqli->prepare($ret);
                $stmt->execute(); //ok
                $res = $stmt->get_result();
                while ($sys = $res->fetch_object()) {
                ?>
                  <form method="post" enctype="multipart/form-data" role="form">
                    <div class="card-body">
                      <div class="row">
                        <div class="form-group col-md-12">
                          <label for="">Company Name</label>
                          <input type="text" required name="sys_name" value="<?php echo $sys->sys_name; ?>" class="form-control">
                          <input type="hidden" required name="id" value="<?php echo $sys->id ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                          <label for="">Company Tagline</label>
                          <input type="text" required name="sys_tagline" value="<?php echo $sys->sys_tagline; ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                          <label for="">System Logo</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input required name="sys_logo" type="file" class="custom-file-input">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="text-right">
                      <button type="submit" name="systemSettings" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                <?php
                } ?>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
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
  <!-- DataTables -->
  <script src="plugins/datatables/jquery.dataTables.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- page script -->
  <script>
    $(function() {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
    });
    /* Custom File Uploads */
    $(document).ready(function() {
      bsCustomFileInput.init();
    });
  </script>
</body>

</html>