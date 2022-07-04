<?php
session_start();
include "./connect.php";
$connect = new DB();
 if ($connect){
    $db = $connect->getConnect();
    if (isset($_POST)){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $is_admin = 1;
        $agree= isset($_POST['agree']) != null ? $_POST['agree'] : null;
        if ($agree == "on") {
            if (validateregister($firstname, $lastname, $username,$password,$is_admin) == "error") {

                echo '<script class="alert alert-danger">alert ("Barcha maydonlar bosh bolishi mumkin !")</script>';
                return 0;
            }

            $query = $db->query("INSERT INTO users (firstname, lastname, username, password, is_admin) VALUES ('$firstname', '$lastname', '$username', '$password', '$is_admin')");
            if ($query) {
                header("Location: ../index.php");
            } else {

                echo '<script class="alert alert-danger">alert("data not save !")</script>' . $db->error;

            }

            return 0;
        }else {


            echo '<script class="alert alert-danger"  >alert("Shartlarga rozilik berish lozim!")</script>';

        }














    }else {
        echo '<script>alert("No Connection!")</script>';


}

}
function validateregister($firstname, $lastname, $username, $password, $is_admin) {
    $username = trim($username);
    $password = trim($password);
    $firstname = trim($firstname);
    $lastname = trim($lastname);
    $is_admin = trim($is_admin);


    if ($username == '' || $password == '' || $firstname == '' || $lastname == '' || $is_admin == '' ) {
        return "error";
    }else {
        return "success";
    }
}
 ?>