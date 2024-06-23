<?php
session_start();
include("database.php");
if (isset($_POST["delete_faq"])) {
    $id = $_POST["id"];
    $conn->query("DELETE from faq WHERE id='$id'");
}

if (isset($_POST["delete_product"])) {
    $sku = $_POST["sku"];
    $conn->query("DELETE from product WHERE sku='$sku'");
}
unset($_POST);
header("location: " . $_SERVER["HTTP_REFERER"]);