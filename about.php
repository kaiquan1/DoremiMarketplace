<!DOCTYPE html>
<html>

<head>
    <title>
        About Us
    </title>
    <link rel="stylesheet" href="style.css">
    <script src="javascript.js"></script>
    <?php
    session_start();
    if (isset($_SESSION['gender'])) {
        $gender = $_SESSION['gender'];
    } else {
        $gender = "default";
    }
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
    .content_about {
        font-family: Arial, Helvetica, sans-serif;
        text-align: left;
        margin-left: 15%;
        margin-right: 15%;
        font-size: 25px;
        line-height: 1.5;
        text-align: justify;
        color: white;
        color: white;
        font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        text-shadow: 2px 2px 2px black;
    }

    .content_about h1 {
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
    }

    .about {
        margin-bottom: 30px;
    }

    .fa-envelope {
        background: #0072C6;
        color: white;
        cursor: pointer;
    }

    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.7);
    }
    </style>
</head>

<body class="default">
    <!-- Import Fixed Menu Sidebar -->
    <div><?php include('sidebar.html');
            ?></div>
    <!-- Import Fixed Header -->
    <div><?php include('header.php');
            ?></div>

    <!-- Contents -->
    <div class="content">
        <div class="content_about">
        <div class="about">
            <h1>About Us</h1>
            <hr>
            <p>
                DOREMI is your premier destination for high-quality mechanical keyboards, keycaps, and accessories. 
                Founded in 2024, we're dedicated to providing enthusiasts with top-notch products that enhance their 
                typing experience and reflect their personal style. From sleek keyboards to artisan keycaps, we offer 
                a curated selection of premium items to meet your needs.
                </br></br>
                With a focus on quality and customer satisfaction, 
                our team is committed to delivering an exceptional shopping experience. Whether you're a seasoned enthusiast 
                or new to mechanical keyboards, we're here to help you find the perfect products. 
                </br></br>
                Elevate your typing experience with DOREMI today!
            </p>
        </div>
            <div id="contact">
                <h1>Contact Us</h1>
                <hr>

            </div>
            <?php
            include('iconBar.html');
            ?>

        </div>
    </div>

    <div class="popup">

        <div class=popup-content>
            <div id="close">+</div>

            <form action="processContact.php" id="popup-form" method="post">
                <h1>Message Us</h1>
                <hr style="margin-bottom: 20px;">

                <label for="email" style="font-weight: bold">Email</label>
                <input type="email" id="email" name="contact_email" class="inputBox">

                <label for="title" style="font-weight: bold">Title</label>
                <input type="text" id="title" name="contact_title" class="inputBox">

                <label for="message" style="font-weight: bold">Message</label>
                <textarea style=height:100px; id="message" name="contact_message" class="inputBox"></textarea>

                <button type="submit" id="send">Submit</button>
            </form>
        </div>
    </div>


    <script>
    document.getElementById("email_button").addEventListener("click", function() {
        document.querySelector(".popup").style.display = "flex";
    });
    document.getElementById("close").addEventListener("click", function() {
        document.querySelector(".popup").style.display = "none";
    });
    </script>

    <!-- Import Fixed Footer -->
    <div><?php include('footer.html');
            ?></div>
</body>

</html>