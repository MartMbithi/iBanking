<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo 
    and load this 
    page with logged in user instance
    -->
  <?php
  $admin_id = $_SESSION['admin_id'];
  $ret = "SELECT * FROM  iB_admin  WHERE admin_id = ? ";
  $stmt = $mysqli->prepare($ret);
  $stmt->bind_param('i', $admin_id);
  $stmt->execute(); //ok
  $res = $stmt->get_result();
  while ($row = $res->fetch_object()) {
    //set automatically logged in user default image if they have not updated their pics
    if ($row->profile_pic == '') {
      $profile_picture = "<img src='dist/img/user_icon.png' class='img-circle elevation-2' alt='User Image'>
                ";
    } else {
      $profile_picture = "<img src='dist/img/$row->profile_pic' class='img-circle elevation-2' alt='User Image'>
                ";
    }

    /* Persisit System Settings On Brand */
    $ret = "SELECT * FROM `iB_SystemSettings` ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute(); //ok
    $res = $stmt->get_result();
    while ($sys = $res->fetch_object()) {
  ?>


      <a href="pages_dashboard.php" class="brand-link">
        <img src="dist/img/<?php echo $sys->sys_logo; ?>" alt=" Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo $sys->sys_name; ?></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <?php echo $profile_picture; ?>
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $row->name; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item has-treeview">
              <a href="pages_dashboard.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard

                </p>
              </a>
            </li>
            <!-- ./DAshboard -->

            <!--Account -->
            <li class="nav-item">
              <a href="pages_account.php" class="nav-link">
                <i class="nav-icon fas fa-user-secret"></i>
                <p>
                  Account
                </p>
              </a>
            </li>
            <!-- ./Account-->

            <!--Ibank Staff-->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>
                   Staff
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages_add_staff.php" class="nav-link">
                    <i class="fas fa-user-plus nav-icon"></i>
                    <p>Add Staff</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages_manage_staff.php" class="nav-link">
                    <i class="fas fa-user-cog nav-icon"></i>
                    <p>Manage Staff</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- ./iBank staff-->

            <!--Clients -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                   Clients
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages_add_client.php" class="nav-link">
                    <i class="fas fa-user-plus nav-icon"></i>
                    <p>Add Client</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages_manage_clients.php" class="nav-link">
                    <i class="fas fa-user-cog nav-icon"></i>
                    <p>Manage Clients</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- ./ Clients -->

            <!--iBank Accounts-->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>
                   Accounts
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages_add_acc_type.php" class="nav-link">
                    <i class="far fas fa-plus nav-icon"></i>
                    <p>Add Acc Type</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages_manage_accs.php" class="nav-link">
                    <i class="fas fa-cogs nav-icon"></i>
                    <p>Manage Acc Types</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages_open_acc.php" class="nav-link">
                    <i class="fas fa-lock-open nav-icon"></i>
                    <p>Open  Acc</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages_manage_acc_openings.php" class="nav-link">
                    <i class="fas fa-cog nav-icon"></i>
                    <p>Manange Acc Openings</p>
                  </a>
                </li>
              </ul>
            </li>
            <!--./ iBank Acounts-->

            <!--Finances-->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-dollar-sign"></i>
                <p>
                  Finances
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages_deposits.php" class="nav-link">
                    <i class="fas fa-upload nav-icon"></i>
                    <p>Deposits</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages_withdrawals.php" class="nav-link">
                    <i class="fas fa-download nav-icon"></i>
                    <p>Withdrawals</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages_transfers.php" class="nav-link">
                    <i class="fas fa-random nav-icon"></i>
                    <p>Transfers</p>
                  </a>
                </li>
                <!--
              <li class="nav-item">
                <a href="pages_loans.php" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Loans</p>
                </a>
              </li>

              -->
                <li class="nav-item">
                  <a href="pages_balance_enquiries.php" class="nav-link">
                    <i class="fas fa-money-bill-alt nav-icon"></i>
                    <p>Balance Enquiries</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- ./Finances -->

            <!--Statements-- Will be implemented later versions.
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-receipt"></i>
              <p>
                   iBanking Statements
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages_bank" class="nav-link">
                  <i class="fas fa-upload nav-icon"></i>
                  <p>Bank Accounts</p>
                </a>
              </li>
            </ul>
          </li>
          ./Statements -->


            <li class="nav-header">Advanced Modules</li>
            <li class="nav-item">
              <a href="pages_transactions_engine.php" class="nav-link">
                <i class="nav-icon fas fa-exchange-alt"></i>
                <p>
                  Transactions Engine
                </p>
              </a>
            </li>
            <!--./Transcactions Engine-->

            <!--Financial Reporting-->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                <p>
                  Finacial Reporting
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages_financial_reporting_deposits.php" class="nav-link">
                    <i class="fas fa-file-upload nav-icon"></i>
                    <p>Deposits</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages_financial_reporting_withdrawals.php" class="nav-link">
                    <i class="fas fa-cart-arrow-down nav-icon"></i>
                    <p>Withdrawals</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages_financial_reporting_transfers.php" class="nav-link">
                    <i class="fas fa-random nav-icon"></i>
                    <p>Transfers</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- ./ End financial Reporting-->

            <!--Password Resets-->
            <li class="nav-item">
              <a href="pages_system_settings.php" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  System Settings
                </p>
              </a>
            </li>
            <!-- ./ Password Resets-->

            <!-- Log Out -->
            <li class="nav-item">
              <a href="pages_logout.php" class="nav-link">
                <i class="nav-icon fas fa-power-off"></i>
                <p>
                  Log Out
                </p>
              </a>
            </li>
            <!-- ./Log Out -->
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
</aside>
<?php
    }
  } ?>