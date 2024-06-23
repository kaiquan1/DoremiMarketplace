<!DOCTYPE html>
<html>

<head>
    <title>
        FAQ
    </title>
    <link rel="stylesheet" href="style.css">
    <script src="javascript.js"></script>

    <?php
    session_start();
    ?>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    #faq {
        text-align: center;
    }
    
    h1 {
        margin-bottom: 30px;
    }
</style>
<body class="default">
    <!-- Import Fixed Header -->
    <?php include('header.php');
    ?>

    <!-- Import Fixed Menu Sidebar -->
    <?php include('sidebar.html');
    ?>

    <!-- Contents -->
    <div id="faq" class="content">
        <h1>Frequently Asked Questions (FAQ)</h1>
        <?php
        include("database.php");
        $result = $conn->query("SELECT * from faq ORDER BY category");
        $byCategory = array();
        while ($row = $result->fetch_assoc()) {
            $byCategory[$row["category"]][] = $row;
        }
        ?>
        <!--Category Links List -->
        <div class="faq_category">
            <?php foreach ($byCategory as $category => $faqs) {
                echo "<a href= #$category>" . $category . "</a>";
            }
            ?>
        </div>

        <!-- FAQ Accordions-->
        <?php foreach ($byCategory as $category => $faqs) { ?>
        <div class="accordion">
            <div class="anchor">
                <div id="<?php echo $category; ?>"></div>
            </div>
            <?php echo "<b class='title'>" . $category . "</b>";
                foreach ($faqs as $faq) { ?>
            <div class=" faq_set">
                <div class="question">
                    <?php echo nl2br($faq["question"]); ?>
                </div>
                <div class="answer">
                    <?php echo nl2br($faq["answer"]); ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
    <!-- Import Fixed Footer -->
    <?php include('footer.html');
    ?>

</body>

</html>