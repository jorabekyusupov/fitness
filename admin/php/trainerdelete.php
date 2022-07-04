<?php
session_start();
include './connect.php';
$connect = new DB();
if ($connect){
    $db = $connect->getConnect();
    if (isset($_POST) && isset($_POST['id'])) {
        $id = $_POST['id'];
        $queryWorks = $db->query("SELECT image FROM work_new where id = " . $id . " LIMIT 1");
        if ($queryWorks->num_rows > 0) {
            while ($queryAll = $queryWorks->fetch_object()) {
                $results[] = $queryAll;
            }
        }
        $colns = $results[0];
        if ($colns->image != null) {
            $oldpath = '../assets/images/' . $colns->image;
            if (file_exists($oldpath)) {
                unlink($oldpath) or die("Couldn't delete file");
            }
        }
        $query = $db->query("DELETE FROM work_new WHERE id=".$id);
        if ($query) {
            echo '<script>alert("Product deleted!")</script>';
            header('Location: ../trainers_table.php');
        }
        else {
            echo '<script>alert("Product not deleted!")</script>';
        }

    }
}

?>
