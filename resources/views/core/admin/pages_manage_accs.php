<?php
session_start();
include('conf/config.php');
include('conf/checklogin.php');
check_login();
$admin_id = $_SESSION['admin_id'];
if (isset($_GET['deleteBankAccType'])) {
  $id = intval($_GET['deleteBankAccType']);
  $adn = "DELETE FROM  iB_Acc_types  WHERE acctype_id = ?";
  $stmt = $mysqli->prepare($adn);
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $stmt->close();

  if ($stmt) {
    $info = "iBanking Account Type Removed";
  } else {
    $err = "Try Again Later";
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
              <h1>iBanking Account Types</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="pages_dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="pages_manage_accs.php">iBank Account Types</a></li>
                <li class="breadcrumb-item active">Manage Clients</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Select on any action options to manage your account types</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Rate</th>
                      <th>Code</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    //fetch all iB_Acc_types
                    $ret = "SELECT * FROM  iB_Acc_types ORDER BY RAND() ";
                    $stmt = $mysqli->prepare($ret);
                    $stmt->execute(); //ok
                    $res = $stmt->get_result();
                    $cnt = 1;
                    while ($row = $res->fetch_object()) {

                    ?>

                      <tr>
                        <td><?php echo $cnt; ?></td>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo $row->rate; ?>%</td>
                        <td><?php echo $row->code; ?></td>

                        <td>
                          <a class="badge badge-success" href="pages_update_accs.php?code=<?php echo $row->code; ?>">
                            <i class="fas fa-cogs"></i>
                            <i class="fas fa-briefcase"></i>
                            Manage
                          </a>

                          <a class="badge badge-danger" href="pages_manage_accs.php?deleteBankAccType=<?php echo $row->acctype_id; ?>">
                            <i class="fas fa-trash"></i>
                            <i class="fas fa-briefcase"></i>
                            Delete
                          </a>


                        </td>

                      </tr>
                    <?php $cnt = $cnt + 1;
                    } ?>
                    </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
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
  </script>
</body>

</html>