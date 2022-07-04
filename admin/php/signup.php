<?php
session_start();
include './connect.php';
$connect = new DB();
if ($connect) {
    $db = $connect->getConnect();
    $query = $db->query("SELECT * FROM users");
    if ($query->num_rows > 0) {
        while ($queryAll = $query->fetch_object()) {
            $users[] = $queryAll;
        }
    }
    if (isset($_POST)) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $remember= isset($_POST['remember']) != null ? $_POST['remember'] : null;

        if($remember == "on"){

            if(validateLogin($username, $password) == "error"){
                echo '<script>alert("Barcha maydonlar bosh bolishi mumkin !")</script>';
                return 0;
            }
            $query = $db->query("SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1");
            if ($query->num_rows > 0) {
                while ($queryAll = $query->fetch_object()) {
                    $user[] = $queryAll;
                }
            }
            if (isset($user)) {
                $user = $user[0];
                $_SESSION['is_login'] = true;
                $_SESSION['is_admin'] = $user->is_admin == 1;
                $_SESSION['user'] = $user;

                header('Location: ../index.php ');
            }


            return 0;
        }else {
            echo '<script>alert("Shartlarga rozilik berish lozim!")</script>';

         }










    }else {
        echo '<script>alert("No Connection!")</script>';

}



  }

function validateLogin($username, $password) {
    $username = trim($username);
    $password = trim($password);


    if ($username == '' || $password == '') {
        return "error";
    }else {
        return "success";
    }
}



?>