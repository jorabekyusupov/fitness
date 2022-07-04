<?php
session_start();
include "./connect.php";
$connect = new DB();
if ($connect) {
    $db = $connect -> getConnect();
    if (isset($_POST)) {
        $name = $_POST['name'] == '' ? null : $_POST['name'];
        $create_time = $_POST['create_time'] == '' ? null : $_POST['create_time'];
        $category_id = $_POST['category_id'] == '' ? null : $_POST['category_id'];
        $status = $_POST['status'] ;
        $bodytext = $_POST['bodytext'] == '' ? null : $_POST['bodytext'];
        $title = $_POST['title'] ;
        $price = $_POST['price'] ;
        $image = $_FILES['image'];
              if (isset($_FILES['image'])) {
            $folder_read = '/assets/images/';
            $folder = '../../assets/images/';
            $path = $folder . $_FILES['image']['name'];
            if (file_exists($path)) {
                unlink($path);
                if ($_FILES['image']['size'] > 50000000) {
                    echo "faylni hajmi 5mb dan ortib ketdi";
                    die();
                } else {
                    $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                    if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif' || $ext == 'bmp') {
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
                            $path2 = $folder_read . $_FILES['image']['name'];
                        } else {
                            echo "error IMAGE";
                        }
                    }
                }

            } else {

                if ($_FILES['image']['size'] > 50000000) {
                    echo "faylni hajmi 5mb dan ortib ketdi";
                    die();
                } else {
                    $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                    if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif' || $ext == 'bmp') {
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
                            $path2 = $folder_read . $_FILES['image']['name'];
                        } else {
                            echo "error IMAGE";
                        }
                    }
                }

            }

        } else {
            echo "Image null!!";
        }

        if ($name && $bodytext && $category_id && $title && $status && $path2 && $create_time && $price ) {
            $news = $db->query("INSERT INTO work_new (name,bodytext,category_id,title,status,image,create_time,price) values
             (  \"$name\", \"$bodytext\", \"$category_id\",'$title', $status , \"$path2\" ,\" $create_time\", \"$price\")");
            if ($news) {
                header("Location: ../trainers_table.php");
            } else {
                echo "data not save" . $db->error;
            }
        } else {
            echo "no date";
        }
    }
}
?>