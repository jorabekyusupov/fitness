<?php
session_start();
include "./connect.php";
$connect = new DB();
if ($connect) {
    $db = $connect -> getConnect();
    if (isset($_POST)) {
//        var_dump($_POST);
//        die();
        $name = $_POST['name'] == '' ? null : $_POST['name'];
        $create_time = $_POST['create_time'] == '' ? null : $_POST['create_time'];
        $category_id = $_POST['category_id'] == '' ? null : $_POST['category_id'];
        $status = $_POST['status']  ;
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
            };
            if ($_FILES['image']['size'] > 50000000) {
                echo "faylni hajmi 5mb dan ortib ketdi";
            } else {
                $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                if ($ext === 'jpg' || $ext === 'jpeg' || $ext === 'png' || $ext === 'gif' || $ext === 'bmp') {
                    if (!move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
                        echo "error IMAGE";
                    } else {
                        $path2 = $folder_read . $_FILES['image']['name'];
                    }
                }
            }
        }
    } else {
        echo "Image null!!";
    }
    if (isset($category_id)){
        /** @var TYPE_NAME $id */
        $news = $db->query(query: "UPDATE work_new SET name=\"$name\", bodytext =\"$bodytext\",category_id=\"$category_id\",title=\"$title\",status=\"$status\" ,image= \"$path2\",create_time =\"$create_time\",price =\"$price\"  where id ='$id' ");
        if ($news) {
            header("Location: ../trainers_table.php");
        } else {
            echo "data not save" . $db->error;
        }
    } else {
        echo "no date";
    }





}
?>
