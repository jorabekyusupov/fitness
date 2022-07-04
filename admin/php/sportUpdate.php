<?php
session_start();
include "./connect.php";
$connect = new DB();
if ($connect) {
    $db = $connect->getConnect();
    if (isset($_POST)) {
        $id = $_POST['id'];
        $name = $_POST['Sport_name'];
        $status = $_POST['status'];
        if ( $status) {
            $news = $db->query("UPDATE categories SET Sport_name='$name',status =$status where id ='$id' ");
            if ($news) {
                header("Location: /admin/advance-table.php");
            } else {
                echo "data not save" . $db->error;
            }
        } else {
            echo "no date";
        }
    }
}

?>

