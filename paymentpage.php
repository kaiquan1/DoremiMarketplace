<!DOCTYPE html>
<html>

<head>
    <title>Payment Page</title>
    <link rel="stylesheet" href="style.css">
    <script src="javascript.js"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin-top: 5%;
            background-color: #f0f0f0; 
        }

        .container {
            text-align: center; 
        }

        form {
            width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block; 
            text-align: left; 
        }

        h2 {
            margin-bottom: 15px;
            margin-top: 0; 
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <form action="checkout_process.php" method="post">
            <h2>Shipping Information</h2>
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required><br>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required><br>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" required><br>

            <label for="state">State/Province:</label>
            <input type="text" id="state" name="state" required><br>

            <label for="zip">Zip/Postal Code:</label>
            <input type="text" id="zip" name="zip" required><br>

            <label for="country">Country:</label>
            <input type="text" id="country" name="country" required><br>

            <!-- <h2>Payment Information</h2>
            <label for="cardname">Name on Card:</label>
            <input type="text" id="cardname" name="cardname" required><br>

            <label for="cardnumber">Credit Card Number:</label>
            <input type="text" id="cardnumber" name="cardnumber" required><br>

            <label for="expdate">Expiration Date:</label>
            <input type="text" id="expdate" name="expdate" required><br>

            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" required><br> -->

            <!-- <input type="submit" value="Complete Purchase" href="https://tngportal.touchngo.com.my/#login"> -->
            <!-- <a href="https://tngportal.touchngo.com.my/#login" style="width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;background-color: #007bff;
        color: #fff;
        display: inline-block;
        text-align: center;
        text-decoration: none;">Proceed Payment</a> -->
        <a href="https://tngportal.touchngo.com.my/#login" class="payment-button">Proceed Payment</a>

        </input>
        <!-- <button type="button" id="completePurchase">Complete Purchase</button> -->
    </form>
    
</div>


    <!-- <script>
        document.getElementById("checkoutButton").addEventListener("click", function () {
            console.log("Checkout button clicked");
            document.getElementById("checkoutForms").style.display = "block";
        });
    </script> -->

    <!-- <script>
    document.getElementById('completePurchase').addEventListener('click', function() {
        // Submit the form
        console.log("Checkout button clicked");
            document.getElementById("checkoutForms").style.display = "block";
        
        // Redirect to the specified URL
        window.location.href = 'https://tngportal.touchngo.com.my/#login';
    });
</script> -->
</body>

</html>
