<div class="header">
    <div class="left circle_hover menu_icon">
        <a href="javascript:void(0)" onclick="openSidebar()"><img src="photo/menu.png" width=25% height=25%></a>
    </div>
    <div class="header_center img_hover" style="text-align:center;">
        <div style="margin-left: -1000px;">
            <img src="photo/logo.png" width="400px" height="150px" />
        </div>
    </div>

    <div class="right">
        <a href="cart.php"><img src="photo/cart.png" width=40px height=30px style="vertical-align: middle; filter: invert(100%);"></a>
        <?php if (isset($_SESSION['username'])) : ?>
        <a style="border-right: 2px solid white" href="#"><?php echo $_SESSION['name'] ?></a>
        <a href="logout.php">Log Out</a>
        <?php else : ?>
        <a href="login" style="vertical-align: middle; border-right: 2px solid white">Login</a>
        <a href="signup" style="vertical-align: middle;">Sign Up</a>
        <?php endif ?>
    </div>

    <div class="right circle_hover">
    </div>
</div>
<div class="navbar">
    <nav>
        <ul>
            <li id="brands">KEYBOARDS
                <ul class="sub-nav">
                    <form action="shop.php" method="post">
                        <input class="nav_filter" type="submit" value="JAMESDONKEY">
                        <input type="hidden" name="JAMESDONKEY" value="JAMESDONKEY">
                    </form>
                    <form action="shop.php" method="post">
                        <input class="nav_filter" type="submit" value="FEKER">
                        <input type="hidden" name="FEKER" value="FEKER">
                    </form>
                    <form action="shop.php" method="post">
                        <input class="nav_filter" type="submit" value="MCHOSE">
                        <input type="hidden" name="MCHOSE" value="MCHOSE">
                    </form>
                    <form action="shop.php" method="post">
                        <input class="nav_filter" type="submit" value="LOFREE">
                        <input type="hidden" name="LOFREE" value="LOFREE">
                    </form>
                    <form action="shop.php" method="post">
                        <input class="nav_filter" type="submit" value="AULA">
                        <input type="hidden" name="AULA" value="AULA">
                    </form>
                </ul>
            </li>
            <li id="keycaps">KEYCAPS
                <ul class="sub-nav">
                    <form action="shop.php" method="post">
                        <input class="nav_filter" type="submit" value="PBT">
                        <input type="hidden" name="PBT" value="PBT">
                    </form>
                    <form action="shop.php" method="post">
                        <input class="nav_filter" type="submit" value="ABS">
                        <input type="hidden" name="ABS" value="ABS">
                    </form>
                    <form action="shop.php" method="post">
                        <input class="nav_filter" type="submit" value="POM">
                        <input type="hidden" name="POM" value="POM">
                    </form>
                    <form action="shop.php" method="post">
                        <input class="nav_filter" type="submit" value="SA PROFILE">
                        <input type="hidden" name="SA_PROFILE" value="SA PROFILE">
                    </form>
                    <form action="shop.php" method="post">
                        <input class="nav_filter" type="submit" value="CHERRY PROFILE">
                        <input type="hidden" name="CHERRY_PROFILE" value="CHERRY PROFILE">
                    </form>
                </ul>
            </li>
            <li id="accessories">ACCESSORIES
                <ul class="sub-nav">
                    <form action="shop.php" method="post">
                        <input class="nav_filter" type="submit" value="MOUSE PADS">
                        <input type="hidden" name="MOUSE_PADS" value="MOUSE PADS">
                    </form>
                    <form action="shop.php" method="post">
                        <input class="nav_filter" type="submit" value="WRIST REST">
                        <input type="hidden" name="WRIST_RESTS" value="WRIST REST">
                    </form>
                    <form action="shop.php" method="post">
                        <input class="nav_filter" type="submit" value="CABLE ORGANIZERS">
                        <input type="hidden" name="CABLE_ORGANIZERS" value="CABLE ORGANIZERS">
                    </form>
                    <form action="shop.php" method="post">
                        <input class="nav_filter" type="submit" value="KEYBOARD CLEANERS">
                        <input type="hidden" name="KEYBOARD_CLEANERS" value="KEYBOARD CLEANERS">
                    </form>
                    <form action="shop.php" method="post">
                        <input class="nav_filter" type="submit" value="DESK MATS">
                        <input type="hidden" name="DESK_PADS" value="DESK MATS">
                    </form>
                </ul>
            </li>


        </ul>
    </nav>
</div>

</html>