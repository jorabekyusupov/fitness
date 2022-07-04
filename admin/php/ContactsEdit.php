<?php
session_start();
include "./connect.php";
$connect = new DB();
if ($connect) {
    $db = $connect->getConnect();
    if (isset($_POST)) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $phone= $_POST['phone'];
        $email = $_POST['email'];
        $address= $_POST['address'];
        if ($name) {
            $news = $db->query("UPDATE contacts2 SET name='$name',phone ='$phone', email='$email',address='$address' where id ='$id' ");
            if ($news) {
                header("Location: /admin/ContactsaAbout.php");
            } else {
                echo "data not save" . $db->error;
            }
        } else {
            echo "no date";
        }
    }
}

?>


