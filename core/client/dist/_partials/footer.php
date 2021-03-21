<?php
/* Persisit System Settings On Brand */
$ret = "SELECT * FROM `iB_SystemSettings` ";
$stmt = $mysqli->prepare($ret);
$stmt->execute(); //ok
$res = $stmt->get_result();
while ($sys = $res->fetch_object()) {
?>
  <footer class="main-footer">
    <strong>Copyright &copy; 2020-<?php echo date('Y'); ?>. <?php echo $sys->sys_name; ?>. Crafted with 💘 by <a target="_blank" href="http:martdev.info">MartDevelopers</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 2.0.0
    </div>
  </footer>
<?php } ?>