
<?php
session_start();
include "./connect.php";
$connect = new DB;
if ($connect) {
    $db = $connect->getConnect();
    if (isset($_POST)) {
        $title = $_POST['title'];
        $title2 = $_POST['title2'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $about = $db->query(query: "insert into club_cards (title,description,price,title2) values (\"$title\",\"$description\",\"$price\",\"$title2\")");


        if ($about) {
            header("Location: ../club_table.php");
        } else {
            echo "data not save" . $db->error;
        }
    }
}else {
    echo "No Connection";
}
?>

