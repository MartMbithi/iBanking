<?php
session_start();
include('conf/config.php'); //get configuration file
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = sha1(md5($_POST['password'])); //double encrypt to increase security
  $stmt = $mysqli->prepare("SELECT email, password, admin_id  FROM iB_admin  WHERE email=? AND password=?"); //sql to log in user
  $stmt->bind_param('ss', $email, $password); //bind fetched parameters
  $stmt->execute(); //execute bind
  $stmt->bind_result($email, $password, $admin_id); //bind result
  $rs = $stmt->fetch();
  $_SESSION['admin_id'] = $admin_id; //assaign session to admin id
  //$uip=$_SERVER['REMOTE_ADDR'];
  //$ldate=date('d/m/Y h:i:s', time());
  if ($rs) { //if its sucessfull
    header("location:pages_dashboard.php");
  } else {
    #echo "<script>alert('Access Denied Please Check Your Credentials');</script>";
    $err = "Access Denied Please Check Your Credentials";
  }
}

/* Persisit System Settings On Brand */
$ret = "SELECT * FROM `iB_SystemSettings` ";
$stmt = $mysqli->prepare($ret);
$stmt->execute(); //ok
$res = $stmt->get_result();
while ($auth = $res->fetch_object()) {
?>
  <!DOCTYPE html>
  <html>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <?php include("dist/_partials/head.php"); ?>

  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <p><?php echo $auth->sys_name; ?> - <?php echo $auth->sys_tagline; ?></p>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign In To Start Adminstrator Session</p>

          <form method="post">
            <div class="input-group mb-3">
              <input type="email" name="email" class="form-control" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" name="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember">
                  <label for="remember">
                    Remember Me
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>


          <!-- /.social-auth-links -->

          <p class="mb-1">
            <a href="pages_reset_pwd.php">I forgot my password</a>
          </p>
          <!--
          Uncomment this line to allow account creations for admins
          
      <p class="mb-0">
        <a href="pages_signup.php" class="text-center">Register a new membership</a>
      </p>
      -->
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

  </body>

  </html>
<?php
} ?>