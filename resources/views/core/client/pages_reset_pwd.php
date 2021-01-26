<?php
session_start();
include('conf/config.php');
if (isset($_POST['reset_pwd'])) {
  $email = $_POST['email'];
  $token = $_POST['token'];
  $dummy_pwd = $_POST['dummy_pwd'];

  $query = "INSERT INTO iB_password_resets (email, token, dummy_pwd) VALUES (?,?,?)";
  $stmt = $mysqli->prepare($query);
  $rc = $stmt->bind_param('sss', $email, $token, $dummy_pwd);
  $stmt->execute();
  /*
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/
  //declare a varible which will be passed to alert function
  if ($stmt) {
    $success = "Check your email for password reset instructions";
  } else {
    $err = "Please Try Again Or Try Later";
  }
}
?>
<!DOCTYPE html>
<html>
<?php include("dist/_partials/head.php"); ?>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href=""><b>i</b>Banking</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

        <form method="POST">
          <div class="input-group mb-3">
            <input type="email" required name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3" style="display:none">
            <?php
            //PHP function to generate random numbers
            $length = 20;
            $_tk =  substr(str_shuffle('0123456789qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM'), 1, $length);
            ?>
            <input type="text" name="token" value="<?php echo $_tk; ?>" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3" style="display:none">
            <?php
            //PHP function to generate random numbers
            $length = 8;
            $Pwd =  substr(str_shuffle('0123456789qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM'), 1, $length);
            ?>
            <input type="text" name="dummy_pwd" value="<?php echo $Pwd; ?>" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" name="reset_pwd" class="btn btn-primary btn-block">Request new password</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <p class="mt-3 mb-1">
          <a href="pages_client_index.php">Login</a>
        </p>

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="lugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>

</body>

</html>