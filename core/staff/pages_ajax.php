<?php
include('conf/pdoconfig.php');
if (!empty($_POST["iBankAccountType"])) {
    //get bank account rate
    $id = $_POST['iBankAccountType'];
    $stmt = $DB_con->prepare("SELECT * FROM iB_Acc_types WHERE  name = :id");
    $stmt->execute(array(':id' => $id));
?>
<?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
<?php echo htmlentities($row['rate']); ?>
<?php
    }
}

if (!empty($_POST["iBankAccNumber"])) {
    //get  back account transferables name
    $id = $_POST['iBankAccNumber'];
    $stmt = $DB_con->prepare("SELECT * FROM iB_bankAccounts WHERE  account_number= :id");
    $stmt->execute(array(':id' => $id));
?>
<?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
<?php echo htmlentities($row['acc_name']); ?>
<?php
    }
}

if (!empty($_POST["iBankAccHolder"])) {
    //get  back account transferables name
    $id = $_POST['iBankAccHolder'];
    $stmt = $DB_con->prepare("SELECT * FROM iB_bankAccounts WHERE  account_number= :id");
    $stmt->execute(array(':id' => $id));
?>
<?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
<?php echo htmlentities($row['client_name']); ?>
<?php
    }
}

?>


