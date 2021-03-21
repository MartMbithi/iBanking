<nav class="main-header navbar navbar-expand navbar-white navbar-light">

  <!-- SEARCH FORM -->
  <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <?php
        //code for summing up notifications
        $result = "SELECT count(*) FROM iB_notifications";
        $stmt = $mysqli->prepare($result);
        $stmt->execute();
        $stmt->bind_result($ntf);
        $stmt->fetch();
        $stmt->close();
        ?>
        <span class="badge badge-danger navbar-badge"><?php echo $ntf; ?></span>
      </a>

      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <?php
          $ret = "SELECT * FROM  iB_notifications  ";
          $stmt = $mysqli->prepare($ret);
          $stmt->execute(); //ok
          $res = $stmt->get_result();
          $cnt = 1;
          while ($row = $res->fetch_object()) {
            //Tim timestamp to DD-MM-YYY : HH:MM🧂 
            $notification_time = $row->created_at;

          ?>
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm"><?php echo $row->notification_details; ?></p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i><?php echo date("d-M-Y :: h:m", strtotime($notification_time)); ?></p>
              </div>
            </div>
            <a href="pages_dashboard.php?Clear_Notifications=<?php echo $row->notification_id; ?>" class="float-right text-sm text-danger">
              <i class="fas fa-trash"></i>
              Clear
            </a>
            <hr>
          <?php } ?>
          <!-- Message End -->
        </a>

      </div>

    </li>

  </ul>
</nav>