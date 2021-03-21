<?php
session_start();
include('conf/config.php');
include('conf/checklogin.php');
check_login();
$client_id = $_SESSION['client_id'];

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
        <?php
        $client_id = $_SESSION['client_id'];
        $ret = "SELECT * FROM  iB_clients WHERE client_id =? ";
        $stmt = $mysqli->prepare($ret);
        $stmt->bind_param('i', $client_id);
        $stmt->execute(); //ok
        $res = $stmt->get_result();
        $cnt = 1;
        while ($row = $res->fetch_object()) {

        ?>
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1><?php echo $row->name; ?> iBanking Accounts</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="pages_dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="pages_balance_enquiries.php">Finances</a></li>
                                    <li class="breadcrumb-item"><a href="pages_balance_enquiries.php">Balances</a></li>
                                    <li class="breadcrumb-item active"><?php echo $row->name; ?> Accs</li>
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
                                    <h3 class="card-title">Select on any action options to check your account balances</h3>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Acc Number</th>
                                                <th>Rate</th>
                                                <th>Acc Type</th>
                                                <th>Acc Owner</th>
                                                <th>Date Opened</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            //fetch all iB_Accs Which belongs to selected client
                                            $client_id = $_SESSION['client_id'];
                                            $ret = "SELECT * FROM  iB_bankAccounts WHERE client_id = ?";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->bind_param('i', $client_id);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            $cnt = 1;
                                            while ($row = $res->fetch_object()) {
                                                //Trim Timestamp to DD-MM-YYYY : H-M-S
                                                $dateOpened = $row->created_at;

                                            ?>

                                                <tr>
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo $row->acc_name; ?></td>
                                                    <td><?php echo $row->account_number; ?></td>
                                                    <td><?php echo $row->acc_rates; ?>%</td>
                                                    <td><?php echo $row->acc_type; ?></td>
                                                    <td><?php echo $row->client_name; ?></td>
                                                    <td><?php echo date("d-M-Y", strtotime($dateOpened)); ?></td>
                                                    <td>
                                                        <a class="badge badge-success" href="pages_check_client_acc_balance.php?account_id=<?php echo $row->account_id; ?>&acccount_number=<?php echo $row->account_number; ?>">
                                                            <i class="fas fa-eye"></i>
                                                            <i class="fas fa-money-bill-alt"></i>
                                                            Check Balance
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
        <?php } ?>
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