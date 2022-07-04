
<?php
session_start();
include "./connect.php";
$connect = new DB;
if ($connect) {
    $db = $connect->getConnect();
    $delete = $_POST['delete'];
    $id = $_POST['id'];
    if (isset($delete)) {
        $cat = $db->query(" DELETE FROM about_com WHERE id = $id");
        if ($cat) {
            header("Location: ../about_table.php");
        } else {
            echo "data not save" . $db->error;
        }
    } else {
        echo "no date";
    }
}
