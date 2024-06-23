<?php
session_start();
include("database.php");
if (isset($_POST["edit_faq"])) {
    $id = $_POST["id"];
    $category = $_POST["category"];
    $question = $_POST["question"];
    $answer = $_POST["answer"];
    $conn->query("UPDATE faq set category='$category', question='$question', answer='$answer' WHERE id='$id'");
}

if (isset($_POST["edit_contact"])) {
    $status = $_POST["edit_contact"];
    $id = $_POST["id"];
    $conn->query("UPDATE contact set status='$status' WHERE id='$id'");
}

if (isset($_POST["edit_product"])) {
    $sku = $_POST["sku"];
    $name = $_POST["name"];
    $category = $_POST["category"];
    $description = $_POST["description"];
    $price = $_POST["price"];
	$type = $_POST["type"];
    $discount = $_POST["discount"];

    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
        // Process image upload
        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
    
        if ($file_size > 3145728) {
            $errors[] = 'File size must be less than 3 MB';
        }
    
        if (empty($errors)) {
            // Move uploaded image to the desired location
            move_uploaded_file($file_tmp, "photo/product/$file_name");
    
            // Update product information with new image path
            $conn->query("UPDATE product SET `name`='$name', `category`='$category',
                          `description`='$description', `price`='$price', `discount`='$discount',
                          `type`='$type', `image`='photo/product/$file_name' WHERE `sku`='$sku'");
        } else {
            // Redirect back to product edit page with error message
            echo "<script>window.location.href='adminProdcuts.php'; alert('" . implode('\n', $errors) . "');</script>";
        }
    } else {
        // If no new image is uploaded, retain the existing image path
        $conn->query("UPDATE product SET `name`='$name', `category`='$category',
                      `description`='$description', `price`='$price', `discount`='$discount',
                      `type`='$type' WHERE `sku`='$sku'");
    }
    
}
unset($_POST);
header("location: " . $_SERVER["HTTP_REFERER"]);