
<?php
session_start();
include "./connect.php";
$connect = new DB();
if ($connect) {
    $db = $connect->getConnect();
    if (isset($_POST)) {
        $category_name = $_POST['name'];
        $category_email = $_POST['email'];
        $category_bodytext= $_POST['bodytext'];
        $agree= isset($_POST['agreement']) != null ? $_POST['agreement'] : null;
        if ($agree == "on") {

            if (validateContact($category_name, $category_email, $category_bodytext) == "error") {
                echo "Barcha maydonlar bo'sh bo'lishi mumkin emas";
                return 0;
            }

            $category = $db->query("insert into contacts (name, email,bodytext) values (\"$category_name\",\"$category_email\",\"$category_bodytext\")");
            if ($category) {
                header("Location: /contacts.php");
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

function validateContact($name, $email, $bodyText) {
    $name = trim($name);
    $email = trim($email);
    $bodyText = trim($bodyText);

    if ($name == '' || $email == '' || $bodyText == '') {
        return "error";
    }else {
        return "success";
    }
}
?>
