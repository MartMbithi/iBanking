<?php
  session_start();
  include('conf/config.php');
  include('conf/checklogin.php');
  check_login();
  $client_id = $_SESSION['client_id'];
  //fire staff
  if(isset($_GET['deleteClient']))
  {
        $id=intval($_GET['deleteClient']);
        $adn="DELETE FROM  iB_clients  WHERE client_id = ?";
        $stmt= $mysqli->prepare($adn);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();	 
  
          if($stmt)
          {
            $info = "iBanking Client Account Deleted";
          }
            else
            {
                $err = "Try Again Later";
            }
    }
?>

<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php include("dist/_partials/head.php");?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
    <?php include("dist/_partials/nav.php");?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include("dist/_partials/sidebar.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>iBanking Clients</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="pages_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="pages_manage_clients.php">iBank Staffs</a></li>
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
              <h3 class="card-title">Select on any action options to manage your clients</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Client Number</th>
                  <th>ID No.</th>
                  <th>Phone Number</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        //fetch all iBank clients
                        $ret="SELECT * FROM  iB_clients ORDER BY RAND() ";
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute() ;//ok
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($row=$res->fetch_object())
                        {
                           
                    ?>

                        <tr>
                            <td><?php echo $cnt;?></td>
                            <td><?php echo $row->name;?></td>
                            <td><?php echo $row->client_number;?></td>
                            <td><?php echo $row->national_id;?></td>
                            <td><?php echo $row->phone;?></td>
                            <td><?php echo $row->email;?></td>
                            <td><?php echo $row->address;?></td>
                            <td>
                                <a class="badge badge-success" href="pages_view_client.php?client_number=<?php echo $row->client_number;?>">
                                    <i class="fas fa-cogs"></i>
                                        <i class="fas fa-user"></i>
                                            Manage
                                </a>
                               
                                <a class="badge badge-danger" href="pages_manage_clients.php?deleteClient=<?php echo $row->client_id;?>">
                                    <i class="fas fa-trash"></i>
                                        <i class="fas fa-user"></i>
                                            Delete
                                </a>

                            
                            </td>

                        </tr>
                    <?php $cnt = $cnt +1; }?>    
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
  <?php include("dist/_partials/footer.php");?>

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
  $(function () {
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
