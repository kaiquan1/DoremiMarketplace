<!DOCTYPE html>
<html>

<head>
    <title>
        DOREMI
    </title>
    <link rel="stylesheet" href="style.css">
    <script src="javascript.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    table {
        margin: 0 -5% 0 5%; /* Center the table */
        width: 80%; /* Make the table take up the full width of its container */
        border-collapse: separate; /* Separate the borders of the cells */
        border-spacing: 10px; /* Add space between the cells */
    }

    table td {
        padding: 20px;
    }
 </style>

<body class="default">
    <?php
    //Filter the products
    $filtered = "SELECT *, round(price*(1-discount),2) as discount_price,GROUP_CONCAT(productquantity.colour separator ',')FROM `product` , productquantity WHERE productquantity.sku=product.sku group by product.sku";
    if (isset($_POST["BRANDS"]) and strpos($filtered, "and (category=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (category='" . $_POST["BRANDS"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["BRANDS"]) and strpos($filtered, "and (category=") !== false) {
        $position = strpos($filtered, "category=");
        $replacement = "category='" . $_POST["BRANDS"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    }
    if (isset($_POST["KEYCAPS"]) and strpos($filtered, "and (category=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (category='" . $_POST["KEYCAPS"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["KEYCAPS"]) and strpos($filtered, "and (category=") !== false) {
        $position = strpos($filtered, "category=");
        $replacement = "category='" . $_POST["KEYCAPS"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    }
    if (isset($_POST["ACCESSARIES"]) and strpos($filtered, "and (category=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (category='" . $_POST["ACCESSARIES"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["ACCESSARIES"]) and strpos($filtered, "and (category=") !== false) {
        $position = strpos($filtered, "category=");
        $replacement = "category='" . $_POST["ACCESSARIES"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    }   
   if (isset($_POST["blue"]) and strpos($filtered, "and (colour=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (colour='" . $_POST["blue"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["blue"]) and strpos($filtered, "and (colour=") !== false) {
        $position = strpos($filtered, "colour=");
        $replacement = "colour='" . $_POST["blue"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    }
    if (isset($_POST["white"]) and strpos($filtered, "and (colour=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (colour='" . $_POST["white"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["white"]) and strpos($filtered, "and (colour=") !== false) {
        $position = strpos($filtered, "colour=");
        $replacement = "colour='" . $_POST["white"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    }
    if (isset($_POST["silver"]) and strpos($filtered, "and (colour=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (colour='" . $_POST["silver"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["silver"]) and strpos($filtered, "and (colour=") !== false) {
        $position = strpos($filtered, "colour=");
        $replacement = "colour='" . $_POST["silver"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    }
    if (isset($_POST["rose"]) and strpos($filtered, "and (colour=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (colour='" . $_POST["rose"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["rose"]) and strpos($filtered, "and (colour=") !== false) {
        $position = strpos($filtered, "colour=");
        $replacement = "colour='" . $_POST["rose"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    }
    if (isset($_POST["black"]) and strpos($filtered, "and (colour=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (colour='" . $_POST["black"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["black"]) and strpos($filtered, "and (colour=") !== false) {
        $position = strpos($filtered, "colour=");
        $replacement = "colour='" . $_POST["black"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    }
    if (isset($_POST["brown"]) and strpos($filtered, "and (colour=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (colour='" . $_POST["brown"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["brown"]) and strpos($filtered, "and (colour=") !== false) {
        $position = strpos($filtered, "colour=");
        $replacement = "colour='" . $_POST["brown"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    }
    if (isset($_POST["pink"]) and strpos($filtered, "and (colour=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (colour='" . $_POST["pink"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["pink"]) and strpos($filtered, "and (colour=") !== false) {
        $position = strpos($filtered, "colour=");
        $replacement = "colour='" . $_POST["pink"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    }
    if (isset($_POST["green"]) and strpos($filtered, "and (colour=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (colour='" . $_POST["green"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["green"]) and strpos($filtered, "and (colour=") !== false) {
        $position = strpos($filtered, "colour=");
        $replacement = "colour='" . $_POST["green"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    }
    if (isset($_POST["purple"]) and strpos($filtered, "and (colour=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (colour='" . $_POST["purple"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["purple"]) and strpos($filtered, "and (colour=") !== false) {
        $position = strpos($filtered, "colour=");
        $replacement = "colour='" . $_POST["purple"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    }	
    if (isset($_POST["red"]) and strpos($filtered, "and (colour=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (colour='" . $_POST["red"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["red"]) and strpos($filtered, "and (colour=") !== false) {
        $position = strpos($filtered, "colour=");
        $replacement = "colour='" . $_POST["red"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    }
    if (isset($_POST["yellow"]) and strpos($filtered, "and (colour=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (colour='" . $_POST["yellow"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["yellow"]) and strpos($filtered, "and (colour=") !== false) {
        $position = strpos($filtered, "colour=");
        $replacement = "colour='" . $_POST["yellow"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    }
	


    if (isset($_POST["JAMESDONKEY"]) and strpos($filtered, "and (type=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (type='" . $_POST["JAMESDONKEY"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["JAMESDONKEY"]) and strpos($filtered, "and (type=") !== false) {
        $position = strpos($filtered, "type=");
        $replacement = "type='" . $_POST["JAMESDONKEY"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    }
	if (isset($_POST["FEKER"]) and strpos($filtered, "and (type=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (type='" . $_POST["FEKER"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["FEKER"]) and strpos($filtered, "and (type=") !== false) {
        $position = strpos($filtered, "type=");
        $replacement = "type='" . $_POST["FEKER"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    }
	if (isset($_POST["MCHOSE"]) and strpos($filtered, "and (type=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (type='" . $_POST["MCHOSE"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["MCHOSE"]) and strpos($filtered, "and (type=") !== false) {
        $position = strpos($filtered, "type=");
        $replacement = "type='" . $_POST["MCHOSE"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } 
	if (isset($_POST["LOFREE"]) and strpos($filtered, "and (type=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (type='" . $_POST["LOFREE"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["LOFREE"]) and strpos($filtered, "and (type=") !== false) {
        $position = strpos($filtered, "type=");
        $replacement = "type='" . $_POST["LOFREE"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } 
	if (isset($_POST["AULO"]) and strpos($filtered, "and (type=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (type='" . $_POST["AULO"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["AULO"]) and strpos($filtered, "and (type=") !== false) {
        $position = strpos($filtered, "type=");
        $replacement = "type='" . $_POST["AULO"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } 
	if (isset($_POST["PBT"]) and strpos($filtered, "and (type=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (type='" . $_POST["PBT"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["PBT"]) and strpos($filtered, "and (type=") !== false) {
        $position = strpos($filtered, "type=");
        $replacement = "type='" . $_POST["PBT"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } 
	if (isset($_POST["ABS"]) and strpos($filtered, "and (type=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (type='" . $_POST["ABS"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["ABS"]) and strpos($filtered, "and (type=") !== false) {
        $position = strpos($filtered, "type=");
        $replacement = "type='" . $_POST["ABS"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } 	
	if (isset($_POST["POM"]) and strpos($filtered, "and (type=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (type='" . $_POST["POM"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["POM"]) and strpos($filtered, "and (type=") !== false) {
        $position = strpos($filtered, "type=");
        $replacement = "type='" . $_POST["POM"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } 	
	if (isset($_POST["SA_PROFILE"]) and strpos($filtered, "and (type=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (type='" . $_POST["SA_PROFILE"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["SA_PROFILE"]) and strpos($filtered, "and (type=") !== false) {
        $position = strpos($filtered, "type=");
        $replacement = "type='" . $_POST["SA_PROFILE"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    }
	if (isset($_POST["CHERRY_PROFILE"]) and strpos($filtered, "and (type=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (type='" . $_POST["CHERRY_PROFILE"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["CHERRY_PROFILE"]) and strpos($filtered, "and (type=") !== false) {
        $position = strpos($filtered, "type=");
        $replacement = "type='" . $_POST["CHERRY_PROFILE"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    }	
	if (isset($_POST["MOUSE_PADS"]) and strpos($filtered, "and (type=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (type='" . $_POST["MOUSE_PADS"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["MOUSE_PADS"]) and strpos($filtered, "and (type=") !== false) {
        $position = strpos($filtered, "type=");
        $replacement = "type='" . $_POST["MOUSE_PADS"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    }	
	if (isset($_POST["DESK_PADS"]) and strpos($filtered, "and (type=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (type='" . $_POST["DESK_PADS"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["DESK_PADS"]) and strpos($filtered, "and (type=") !== false) {
        $position = strpos($filtered, "type=");
        $replacement = "type='" . $_POST["DESK_PADS"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    }	
	if (isset($_POST["CABLE_ORGANIZERS"]) and strpos($filtered, "and (type=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (type='" . $_POST["CABLE_ORGANIZERS"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["CABLE_ORGANIZERS"]) and strpos($filtered, "and (type=") !== false) {
        $position = strpos($filtered, "type=");
        $replacement = "type='" . $_POST["CABLE_ORGANIZERS"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    }	
	if (isset($_POST["WRIST_RESTS"]) and strpos($filtered, "and (type=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (type='" . $_POST["WRIST_RESTS"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["WRIST_RESTS"]) and strpos($filtered, "and (type=") !== false) {
        $position = strpos($filtered, "type=");
        $replacement = "type='" . $_POST["WRIST_RESTS"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    }		
	if (isset($_POST["KEYBOARD_CLEANERS"]) and strpos($filtered, "and (type=") === false) {
        $position = strpos($filtered, "group by");
        $replacement = "and (type='" . $_POST["KEYBOARD_CLEANERS"] . "')";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    } else if (isset($_POST["KEYBOARD_CLEANERS"]) and strpos($filtered, "and (type=") !== false) {
        $position = strpos($filtered, "type=");
        $replacement = "type='" . $_POST["KEYBOARD_CLEANERS"] . "'or ";
        $filtered = substr_replace($filtered, $replacement, $position, 0);
    }		

	
 
    //Sort the products
    // if (isset($_POST["newest"])) {
    //     $filtered = $filtered . " order by year";
    // } else 
    if (isset($_POST["high2low"])) {
        $filtered = $filtered . " order by discount_price DESC";
    } else if (isset($_POST["low2high"])) {
        $filtered = $filtered . " order by discount_price";
    } else if (isset($_POST["featured"])) {
        $filtered = $filtered;
    }
    ?>

    <?php include("database.php"); ?>
    <!-- Import Fixed Menu Sidebar -->
    <?php include('sidebar.html'); ?>
    <!-- Import Fixed Header -->
    <?php include('header.php'); ?>
    <!-- Import Filters -->
    <?php include('filter.php'); ?>
    <div id="shop_content">
        <div class="allproducts">
            <h1 style="text-align: center; margin-top: 20px; margin-bottom: 10px;">DOREMI SHOP</h1>
            <?php
            $all_products = $conn->query($filtered);
            $products = array();
            $i = 0;
            $count = 0;
            while ($result = $all_products->fetch_assoc()) {
                $products[$i] = $result;
                $i++;
            }
            $row = ceil($i / 3);
            ?>
            <table>
                <?php
                for ($i = 0; $i < $row; $i++) {
                    echo "<tr>";
                    for ($j = 0; $j < 3; $j++) {
                        if ($count < count($products)) {

                            echo "<td>"; ?><form action="individual_product.php" method="post">
                    <input class="product_image" type="image" name="product_image" style="width: 300px; height: 200px;"
                        src="<?php echo $products[$count]["image"];?>"
                        value="<?php echo $products[$count]["sku"]; ?>"><br>
                    <div class="product_name" style="font-size:15px; font-weight: bold;">
                        <label for="product_name"><?php echo $products[$count]["name"]; ?></label><br>
                        <input type="hidden" name="product_name" value="<?php echo $products[$count]["sku"]; ?>">
                    </div>
                    <div class="product_price" style="font-size:15px; font-weight:normal;">
                        <?php
                                    if ($products[$count]["discount"] != 0.00) {
                                        $price = $products[$count]["price"] - ($products[$count]["price"] * $products[$count]["discount"]);
                                    ?> <label
                            style="text-decoration:line-through; opacity:0.8;"><?php echo "$" . $products[$count]["price"]; ?></label>
                        <input type="hidden" name="product_price" value="<?php echo $products[$count]["sku"]; ?>">
                        <label><?php echo "$" . number_format("$price", 2); ?></label><?php
                                                                                                } else if ($products[$count]["discount"] == 0) {
                                                                                                    $price = $products[$count]["price"];
                                                                                                    ?><label><?php echo "$" . $products[$count]["price"]; ?></label><?php
                                                                                                    }
                                                                                                        ?>
                        <?php
                            echo "<br><br><br>";
                            echo "</div>";
                            echo "</td>";
                            echo "</form>";
                            $count++;
                        }
                    }
                    echo "</tr>";
                }
                        ?>
            </table>
        </div>
    </div>
    <!-- Import Fixed Footer -->
    <?php include('footer.html'); ?>
    <script>
    //Get the button
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
            if (!mybutton.classList.contains("btnEntrance")) {
                mybutton.classList.remove("btnExit");
                mybutton.classList.add("btnEntrance");
                mybutton.style.display = "block";
            }
        } else {
            if (mybutton.classList.contains("btnEntrance")) {
                mybutton.classList.remove("btnEntrance");
                mybutton.classList.add("btnExit");
                setTimeout(function() {
                    mybutton.style.display = "none";
                }, 250);
            }
        }
    }
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    //Filter Accordions
    window.addEventListener("DOMContentLoaded", function() {
        var expand = document.getElementsByClassName("title");
        for (var i = 0; i < expand.length; i++) {
            expand[i].classList.add("clicked");
            expand[i].addEventListener("click", function() {
                this.classList.toggle("clicked");
            })
        }
    })
    </script>
</body>

</html>