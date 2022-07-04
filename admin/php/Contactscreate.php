

<?php
session_start();
include "./connect.php";
$connect = new DB();
if ($connect) {
    $db = $connect->getConnect();
    if (isset($_POST)) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone= $_POST['phone'];
        $address= $_POST['address'];
//        $fax= $_POST['faxs'];
        $agree= isset($_POST['agreement']) != null ? $_POST['agreement'] : null;
        if ($agree == "on") {

            if (validateContact($name, $email, $phone,$address) == "error") {
                echo "Barcha maydonlar bo'sh bo'lishi mumkin emas";
                return 0;
            }

            $category = $db->query("insert into contacts2 (name, email,phone,address) values (\"$name\",\"$email\",\"$phone\",\"$address\")");
            if ($category) {
                header("Location: ../ContactsaAbout.php");
            } else {
                echo "data not save" . $db->error;
            }

            return 0;
        }else {
            echo "Shartlarga rozilik berish lozim!";
        }
    }
}else {
    echo "No Connection";
}

function validateContact($name, $email,$phone,$address) {
    $name = trim($name);
    $email = trim($email);
    $phone = trim($phone);
    $address = trim($address);
//    $faxs = trim($faxs);

    if ($name == '' || $email == '' || $phone == '' || $address == '' ) {
        return "error";
    }else {
        return "success";
    }
}
?>
