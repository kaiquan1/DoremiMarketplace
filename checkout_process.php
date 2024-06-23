<!DOCTYPE html>
<html>

<head>
    <title>Checkout Process</title>
	 <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        echo "<h2>Complete payment!</h2>";

        echo "<script>
                setTimeout(function() {
                    window.location.href = 'index.php';
                }, 3000); // Redirect after 3 seconds
              </script>";
    } else {
        
        header("Location: index.php");
        exit;
    }
    ?>
</body>

</html>
