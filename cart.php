<!DOCTYPE html>
<html>

<head>
    <title>Cart</title>
    <link rel="stylesheet" href="style.css">
    <?php
        session_start();
    ?>
    <script src="javascript.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
div.cart_list {
    display: flex;
    align-items: flex-start;
    margin-left: 5%;
    margin-top: 5%;
    color: white;
    text-shadow: 2px 2px 2px black;
}

div.cart_list .size_dropdown {
    font-size: 15px;
}

tr.line td {
    border-bottom: 1px solid grey;
}

div.summary {
    margin-left: 5%;
    width: 400px;
    max-width: 100%;
    box-shadow: 0 0 5px 2px #0000003a;
    background-color: white;
    padding: 20px;
    border-radius: 20px;
    color: black;
    text-shadow: none;
}

div.summary button {
    background-color: black;
    color: white;
    width: 400px;
    max-width: 100%;
    height: 50px;
    border-radius: 10px;
}

div.summary button:hover {
    cursor: pointer;
    background-color: #333333;
}

.quantity_dropdown::-webkit-scrollbar {
    width: 4px;
    background-color: #999999;
}

.size_dropdown::-webkit-scrollbar {
    width: 4px;
    background-color: #999999;
}
</style>

<body class="default">
    <?php include("database.php"); ?>
    <!-- Import Fixed Menu Sidebar -->
    <?php include('sidebar.html'); ?>
    <!-- Import Fixed Header -->
    <?php include('header.php'); ?>

    <div class="content">
        <div class="cart_list">
            <?php
            if (isset($_POST["remove"])) {
                $remove_sql = "DELETE from cartitem WHERE id=" . $_POST["delete_id"];
                $conn->query($remove_sql);
            }
            ?>
            <table>
                <?php
                $cartitem_sql = "SELECT * from cartitem, product WHERE cartitem.sku=product.sku and username='" . $_SESSION["username"] . "'";
                $cartitem = $conn->query($cartitem_sql);
                $total_price = 0;
                $id = 1;
                while ($row = $cartitem->fetch_assoc()) {
                    $counter = 1;
                    $max_quantity = 0; // Initializing max_quantity here
                    if (isset($_POST["colour"])) {
                        $colour_cart = $_POST["colour"];
                        $quantity_sql = "SELECT quantity from productquantity WHERE sku='" . $row["sku"] . "' and " . "colour='" . $_POST["colour"] . "'";
                        $quantity_query = $conn->query($quantity_sql);
                        while ($quantity = $quantity_query->fetch_assoc()) {
                            $max_quantity = $quantity["quantity"];
                        }
                    }
                    $colour_list_sql = "SELECT * from productquantity WHERE sku='" . $row["sku"] . "'";
                    $colour_list = $conn->query($colour_list_sql);
                    ?>
                    <tr class="line">
                        <td>
                            <img style="height:300px; width:300px; border-radius: 20px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.7);" src=<?php echo $row["image"]; ?>>
                        </td>
                        <td style="padding-left: 30px;">
                            <?php
                            echo $row["name"] . "<br>";
                            echo $row["colour"] . "/" . $row["category"] . "<br><br>";
                            ?>
                            <form action="" method="post">
                                <label style="font-size:15px;" for="colour">Colour:</label>
                                <select onchange="this.form.submit()" name="colour" class="clour_dropdown"
                                        style="width:60px; height:20px;" id="colour" name="colour">
                                    <?php
                                    while ($colour = $colour_list->fetch_assoc()) {
                                        ?>
                                        <option
                                            <?php if (isset($_POST["colour"]) && $_POST["colour"] == $colour["colour"]) echo "selected='selected'" ?>
                                                value="<?php echo $colour["colour"]; ?>"><?php echo $colour["colour"]; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <label style="font-size:15px;" for="quantity">Quantity:</label>
                                <select onchange="this.form.submit()" name="quantity" class="quantity_dropdown"
                                        style="width:60px; height:20px;" id="quantity" name="quantity">
                                    <?php
                                    while ($counter <= $max_quantity) {
                                        ?>
                                        <option
                                            <?php if (isset($_POST["quantity"]) && $_POST["quantity"] == $counter) echo "selected='selected'" ?>
                                                value="<?php echo $counter; ?>"><?php echo $counter; ?></option>
                                        <?php $counter++; ?>
                                    <?php }
                                    ?>
                                </select>
                            </form>
                            <br><br>
                            <?php
                            if (isset($row)) {
                                if (isset($_POST["quantity"]) && is_numeric($_POST["quantity"])) {
                                    $price = $row["price"] * $_POST["quantity"];
                                } else {
                                    $price = $row["price"];
                                }
                            } else {
                                $price = 0;
                            }
                            ?>

                            <?php
                            echo "$" . number_format($price, 2) . "<br><br>";
                            $total_price = $total_price + $price;
                            ?>
                            <?php
                            $sql;
                            ?>
                            <form action="" method="post">
                                <input type="submit" value="Remove" name="remove" id="remove">
                                <input type="hidden" value="<?php echo $id; ?>" name="delete_id">
                            </form>
                        </td>
                    </tr>
                    <?php
                    $id++;
                }
                ?>
            </table>
            <div class="summary">
                <div style="text-align:center; font-weight:bold; font-size:20px">SUMMARY</div><br><br>
                <div style="margin-left:1%;">Subtotal</div>
                <div style="margin-top: -5%; margin-right:2%; text-align:right;">
                    <?php echo "$" . number_format($total_price, 2); ?></div><br><br>
                <div style="margin-left:1%;">Estimated Delivery & Handling</div>
                <div style="margin-top: -5%; margin-right:2%; text-align:right;">$0.00</div><br><br><br>
                <div
                    style="padding-top:20px; padding-bottom:20px; border-bottom: 1px solid black; border-top: 1px solid black; margin-left:1%;">
                    Total Price</div>
                <div style="margin-top: -10%; margin-right:2%; text-align:right;">
                    <?php echo "$" . number_format($total_price, 2); ?></div><br><br>
                
                <a href="paymentpage.php" style="text-decoration: none; color: white;">
                    <button id="checkoutButton">PROCEED TO PAYMENT</button>
                </a>
            </div>
        </div>
    </div>
</body>

</html>
