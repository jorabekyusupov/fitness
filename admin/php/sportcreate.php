<?php
session_start();
include "./connect.php";
$connect = new DB;
if ($connect) {
    $db = $connect->getConnect();
    if (isset($_POST)) {
        $Sport_id =$_POST['id'];
        $Sport_name = $_POST['Sport_name'];
        $status = $_POST['status'];
        $about = $db->query("insert into categories (Sport_name, status) values (\"$Sport_name\",\"$status\")");


        if ($about) {
            header("Location: ../advance-table.php");
        } else {
            echo "data not save" . $db->error;
        }
    }
}else {
    echo "No Connection";
}
?>
