<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="style.css">
    <?php
    session_start();
    ?>
    <script src="javascript.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
div.product_page {
    margin-top: 50px;
    margin-left: 5px;
    display: flex;
    flex-wrap: wrap;
}

div.product_page .product_image {
    display: flex;
    align-items: flex-start;
    width: 100%;
    height: 100%;
    max-width: 30vw;
    border-radius: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.7);
}

div.product_page .product_description {
    position: relative;
    max-width: 45vw;
    margin-left: 5vw;
    border: 3px solid white;
    border-radius: 20px;
    padding: 20px;
    color: white;
    text-shadow: 2px 2px 2px black;
    flex-grow: 1;
}

div.product_page .size_list {
    max-width: 500px;
}

div.product_page .size_radio {
    display: none;
}

div.product_page .size_button {

    display: inline-block;
    background-color: #e6e6e6;
    color: black;
    margin-bottom: 10px;
    padding: 0px 10px 0px 10px;
    font-size: 30px;
}

div.product_page .size_button:hover {
    background-color: #000000;
    color: white;
    cursor: pointer;
}

div.product_page .size_radio:checked+.size_button {
    background-color: #000000;
    color: white;
}

.quantity_dropdown::-webkit-scrollbar {
    width: 4px;
    background-color: #999999;
}

div.product_description .add_cart {
    position: absolute;
    color: white;
    background-color: black;
    margin-left: 1%;
    height: 50px;
    width: 300px;
}

div.product_description .add_cart:hover {
    background-color: #333333;
    cursor: pointer;
}

div.product_detail {
    text-align: justify;
    font-weight: 500;
    font-size: 18px;
}

/*Review Accordions */
div.review_list {
    position: relative;
    background-color: white;
    border-top: solid 1px grey;
    border-bottom: solid 1px grey;
    border-radius: 10px;
    color: black;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.7);
    text-shadow: none;
}

div.review_list .title2 {
    position: relative;
    font-weight: bold;
    font-size: 20px;
    padding: 15px 10px 15px 10px;
}

div.review_list .title2:hover {
    cursor: pointer;
}


div.review_list .title2::after {
    content: '\25BD';
    position: absolute;
    right: 20px;
    transition: 0.2s;
}

div.review_list .title2.clicked::after {
    content: '\25BC';
    transform: rotate(-180deg);
}

div.review_list .title2+.reviews {
    height: 0px;
    transition: 0.5s;
    font-size: 18px;
    overflow: hidden;
}

div.review_list .title2.clicked+.reviews {
    height: auto;
    padding: 15px 10px 20px 10px;

}

div.add_cart_popup {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 300px;
    height: auto;
    padding: 30px 20px;
    line-height: 1.5rem;
    border-radius: 5px;
    font-size: 16px;
    box-shadow: 0 0 5px 2px #0000003a;
    background-color: white;
    text-align: center;
    z-index: 20;
    font-size: 20px;
    font-weight: 600;
    visibility: hidden;
}

div.add_cart_popup button {
    background-color: black;
    color: white;
    font-size: 18px;
    height: 40px;
    width: 100px;
}

div.add_cart_popup button:hover {
    cursor: pointer;
}
</style>

<body class="default">
    <?php include("database.php"); ?>
    <!-- Import Fixed Menu Sidebar -->
    <?php include('sidebar.html'); ?>
    <!-- Import Fixed Header -->
    <?php include('header.php'); ?>

    <?php
    if (isset($_POST["product_image"])) {
        $product = " WHERE sku='" . $_POST["product_image"] . "'";
    } else if (isset($_POST["product_name"])) {
        $product = " WHERE sku='" . $_POST["product_name"] . "'";
    } else if (isset($_POST["product_type"])) {
        $product = " WHERE sku='" . $_POST["product_type"] . "'";
    } else if (isset($_POST["product_price"])) {
        $product = " WHERE sku='" . $_POST["product_price"] . "'";
    } else if (isset($_POST["sku"])) {
        $product = " WHERE sku='" . $_POST["sku"] . "'";
    }

    $sql = "SELECT * from product" . $product;
    $product_desc = $conn->query($sql);
    $colour_sql = "SELECT * from productquantity" . $product;
    $colour_list = $conn->query($colour_sql);
    ?>
    <div class="content">
        <div class="product_page">
            <?php
            while ($sku = $product_desc->fetch_assoc()) {
            ?> <img class="product_image" src="<?php echo $sku["image"] ?>">
            <div class="product_description">
                <!-- <span
                    style="font-size: 20px; text-transform: capitalize;"><?php echo $sku["category"]; ?></span><br> -->
                <span style="font-weight:800;; font-size:30px;"><?php echo $sku["name"]; ?></span><br><br>
                <?php
                    if ($sku["discount"] !== 0.00) {
                        $discount = $sku["discount"] * 100;
                        $discount = $discount . "%"; ?>
                        <span style="font-size:20px; color:green;"><?php echo $discount . " Discount"; ?></span><br><br><?php
                    }
                ?>
                <?php
                    if ($sku["discount"] != 0.00) {
                        $price = $sku["price"] - ($sku["price"] * $sku["discount"]);
                    ?> 
                    <span style="font-weight:bold; font-size:30px; text-decoration:line-through; opacity:0.8;"><?php echo "$" . $sku["price"]; ?></span>
                    <span style="font-size:30px; font-weight:bold;"><?php echo "$" . number_format("$price", 2); ?></span><br><br><?php
                    } else if ($sku["discount"] == 0) {
                        $price = $sku["price"];
                    ?>
                    <span style="font-size:30px; font-weight:bold;"><?php echo "$" . $sku["price"]; ?></span><br><br><?php
                    }
                ?>
                <form action="" method="post">
                    <div class="colour_list">
                        <?php
                            while ($colour = $colour_list->fetch_assoc()) {
                            ?><input class="colour_radio" type="radio"
                            <?php if (isset($_POST["colour"]) and $_POST["colour"] == $colour["colour"]) echo "checked='checked'"; ?>
                            name="colour" id="<?php echo $colour["colour"]; ?>" value="<?php echo $colour["colour"]; ?>"
                            onChange="this.form.submit()">
                        <label class="colour_button"
                            for="<?php echo $colour["colour"]; ?>"><?php echo $colour["colour"]; ?></label>
                        <?php } ?>
                    </div>
                    <input type="hidden" name="sku" value="<?php echo $sku["sku"]; ?>">
                </form>
                <br><br>
                <?php
                    $colour_cart = "";
                    if (isset($_POST["colour"])) {
                        $colour_cart = $_POST["colour"];
                        $counter = 1;
                        $quantity_sql = "SELECT quantity from productquantity WHERE sku='" . $_POST["sku"] . "' and " . "colour='" . $_POST["colour"] . "'";
                        $quantity_query = $conn->query($quantity_sql);
                        while ($quantity = $quantity_query->fetch_assoc()) {
                            $max_quantity = $quantity["quantity"];
                        }
                    }
                    if (isset($_POST["colour"]) && $max_quantity != 0) {
                    ?>
                <form action="" method="post">

                    <label style="font-size:25px; font-weight:500" for="quantity">Quantity:</label>
                    <select name="quantity_cart" class="quantity_dropdown" style="width:50px; height:50px;"
                        id="quantity" name="quantity">
                        <?php
                                while ($counter <= $max_quantity) {
                                    echo '<option value="' . $counter . '">' . $counter . "</option>";
                                    $counter++;
                                }
                                ?>
                    </select>
                    <input class="add_cart" type="submit" name="add_bag" id="add_bag" value="ADD TO BAG"
                        onclick="AddCartPopup();">
                    <input type="hidden" name="sku" value="<?php echo $sku["sku"]; ?>">
                    <input type="hidden" name="colour_cart" value="<?php echo $_POST["colour"]; ?>">
                </form>
                <?php } else if (isset($_POST["colour"]) === false || $max_quantity == 0) {
                    ?>
                <form action="" method="post">
                    <label style="font-size:25px; font-weight:500" for="quantity">Quantity:</label>
                    <select class="quantity_dropdown" style="width:50px; height:50px;" id="quantity" name="quantity"
                        disabled>
                    </select>
                    <input class="add_cart" type="submit" name="add_bag" id="add_bag" value="ADD TO BAG">
                    <input type="hidden" name="sku" value="<?php echo $sku["sku"]; ?>">
                </form>
                <?php }
                    ?>
                <?php
                    $quantity_cart = "";
                    $is_page_refreshed = (isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] == 'max-age=0');
                    if (isset($_POST["quantity_cart"])) {
                        $add_cartitem_sql = "INSERT INTO cartitem (sku, quantity, colour, username) VALUES ('" . $sku["sku"] . "' , '" . $_POST["quantity_cart"] . "'" . ",'" . $_POST["colour_cart"] . "'" . ",'" . $_SESSION["username"] . "')";
                        if ($conn->query($add_cartitem_sql)) {
                    ?><div class="add_cart_popup">
                    <span>Item added!</span><br><br>
                    <button onclick="CloseAddCartPopup()">confirm</button>
                </div><?php
                                }
                            }
                                    ?>
                <br><br>
                <span style="font-weight:bold; font-size:25px;">Product Description: </span><br><br>
                <?php
                    echo '<div class="product_detail">';
                    echo $sku["description"];
                    echo "</div>"
                    ?>
                <br>
            </div>
            <?php } ?>
        </div>
    </div>
    <div id="overlay"></div>
    <?php include('footer.html'); ?>
</body>

</html>