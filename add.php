<?php
include("database.php");
if (isset($_POST["add_faq"])) {
    $category = strtolower($_POST["category"]);
    $question = $_POST["question"];
    $answer = $_POST["answer"];
    $conn->query("INSERT INTO faq (category,question, answer) VALUES ('$category','$question','$answer')");
}

if (isset($_POST["add_product"])) {
    $sku = $_POST["sku"];
    $name = $_POST["name"];
    $category = $_POST["category"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $discount = $_POST["discount"];
    $type = $_POST["type"];
    $errors = array();
    $file_name = $_FILES['image']['name'];
    $file_colour = $_FILES['image']['colour'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    if ($file_colour > 3145728) {
        $errors += 'File size must be less than 3 MB';
    }

    if (empty($errors)) {
        move_uploaded_file($file_tmp, "photo/product/$file_name");
        $conn->query("INSERT INTO product VALUES ($sku,$name,$category,$description,$price,$discount,$type,'photo/product/$file_name')");
    } else {
        echo "<script> window.location.href='adminProds.php'; 
           alert('$errors'); </script>";
    }
}
unset($_POST);
header("location: " . $_SERVER["HTTP_REFERER"]);