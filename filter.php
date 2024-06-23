<style>
    /*Sort by */
    div.sortby {
        color: white;
        border: 3px solid #ccc;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    div.sortby .title1 {
        position: relative;
        font-weight: bold;
        padding: 15px 10px 15px 10px;

    }

    div.sortby .title1:hover {
        cursor: pointer;
    }


    div.sortby .title1::after {
        content: '\25B2';
        position: absolute;
        right: 20px;
        transition: 0.2s;
    }

    div.sortby .title1.clicked::after {
        content: '\25BC';
    }

    div.sortby .title1+.option {
        max-height: 0;
        padding: 0;
        font-size: 18px;
        overflow: hidden;
        transition: max-height 0.5s, padding 0.5s;
    }

    div.sortby .title1.clicked+.option {
        max-height: 500px;
        padding: 15px 10px 20px 10px;
        transition: max-height 0.5s, padding 0.5s;
    }

    div.sortby input {
        display: none;
    }

    div.sortby .option label:hover {
        cursor: pointer;
        opacity: 0.5;
    }

    
    /* General styles for the sections */
    .type, .colour {
        margin-bottom: 20px;
        padding: 10px;
        border: 3px solid #ccc;
        border-radius: 5px;
    }

    /* Styles for the title of each section */
    .type .title, .colour .title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    /* Styles for the options in each section */
    .type .option, .colour .option {
        font-size: 14px;
    }

    /* Styles for the checkboxes */
    .type .option input[type="checkbox"], .colour .option input[type="checkbox"] {
        margin-right: 5px;
    }

    /* Styles for the labels */
    .type .option label, .colour .option label {
        font-size: 14px;
        color: white;
    }

    /* Styles for the options in the colour section */
    .colour .option {
        display: block !important;
    }


    /* Position the filter form below the sortby section */
    #filter_form {
        position: absolute;
        left: 0;
        width: 14%; 
        padding: 10px;
        margin-top: 10px;
        margin-left: 10px;
        color: white;
        text-shadow: 2px 2px 2px black;
    }

    /* Position the shop content to the right of the filter form */
    #shop_content {
        position: relative;
        left: 14%; 
        width: 80%;
    }
</style>
<?php
$option = "";
if (isset($_POST["newest"])) {
    $option = "Newest";
} else if (isset($_POST["high2low"])) {
    $option = "High to low";
} else if (isset($_POST["low2high"])) {
    $option = "Low to high";
} else if (isset($_POST["featured"])) {
    $option = "Featured";
}
?>

<form name="filter_form" id="filter_form" action="shop.php" method="post">
    <div class="sortby">
        <div class="title1" id="title1">
            Sort by<?php echo ":  " . $option; ?>
        </div>
        <div class="option">
            <input class="sort_btn" type="radio" onChange="this.form.submit()" id="featured" name="featured" value="featured">
            <label for="featured" id="afeatured" value="Featured">Featured</label><br>
            <input class="sort_btn" type="radio" onChange="this.form.submit()" id="newest" name="newest" value="newest">
            <label for="newest" onclick="showtitle1()" id="anewest" value="Newest">Newest</label><br>
            <input class="sort_btn" type="radio" onChange="this.form.submit()" id="high2low" name="high2low" value="high2low">
            <label for="high2low" onclick="showtitle1()" id="ahigh2low" value="Price: High to low">Price: High to low</label><br>
            <input class="sort_btn" type="radio" onChange="this.form.submit()" id="low2high" name="low2high" value="low2high">
            <label for="low2high" onclick="showtitle1()" id="alow2high" value="Price: Low to high">Price: Low to high</label><br>
        </div>
    </div>
        <div class="type" id="type">
            <div class="title">
                CATEGORY
            </div>
            <div class="option">
                <?php
                $filter = $conn->query("SELECT DISTINCT category FROM product ORDER BY category");
                while ($row = $filter->fetch_assoc()) {
                ?> <input type="checkbox" <?php if (isset($_POST[$row["category"]])) echo "checked='checked'"; ?> onChange="this.form.submit()" id="<?php echo $row["category"]; ?>" name="<?php echo $row["category"]; ?>" value="<?php echo $row["category"]; ?>">
                    <label for="<?php echo $row["category"]; ?>"><?php echo $row["category"]; ?></label><br>
                <?php } ?>
            </div>
        </div>
        <div class="colour" id="colour">
            <div class="title">
                COLOUR
            </div>
            <div class="option">
                <?php
                $filter = $conn->query("SELECT DISTINCT colour FROM productquantity ORDER BY colour");
                while ($row = $filter->fetch_assoc()) {
                ?> <input class="colour_btn" type="checkbox" <?php if (isset($_POST[str_replace('.', '_', $row["colour"])])) echo "checked='checked'"; ?> onChange="this.form.submit()" id="<?php echo str_replace('.', '_', $row["colour"]); ?>" name="<?php echo str_replace('.', '_', $row["colour"]); ?>" value="<?php echo str_replace('.', '_', $row["colour"]); ?>">
                    <label for="<?php echo str_replace('.', '_', $row["colour"]); ?>"><?php echo rtrim($row["colour"], ".0"); ?></label>
				<?php } ?>
			</div>
        </div>
        <div class="type" id="type">
            <div class="title">
                TYPE
            </div>
            <div class="option">
                <?php
                $filter = $conn->query("SELECT DISTINCT type FROM product ORDER BY type");
                while ($row = $filter->fetch_assoc()) {
                ?> <input type="checkbox" <?php if (isset($_POST[str_replace(' ', '', $row["type"])])) echo "checked='checked'"; ?> onChange="this.form.submit()" id="<?php echo str_replace(' ', '', $row["type"]); ?>" name="<?php echo str_replace(' ', '', $row["type"]); ?>" value="<?php echo $row["type"]; ?>">
                    <label for="<?php echo str_replace(' ', '', $row["type"]); ?>"><?php echo $row["type"]; ?></label><br>
                <?php } ?>
            </div>
        </div>
    </div>
</form>
</script>
