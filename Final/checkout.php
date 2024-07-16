<?php
session_start();

// Connect to the database
$con = mysqli_connect("localhost", "root", "", "birdcage");

// Check connection
if (!$con) {
    die("Connection failed: ". mysqli_connect_error());
}

// Retrieve items from checkout table for the current user
$user_id = $_SESSION["user_id"];
$sql = "SELECT * FROM checkout WHERE user_id = '$user_id'";
$result = $con->query($sql);

$total_price = 0; // Initialize total price variable

if ($result->num_rows > 0) {
   ?>
    <!-- Display checkout table -->
    <html>
      <head>
        <title>Checkout</title>
        <link rel="stylesheet" href="style\checkout.css">
      </head>
      <body>
        <h1>&nbsp;</h1> <!-- added a blank h1 tag to add space -->
        <h1>Checkout</h1>
        <div class="container">
          <table>
            <tr>
              <th>Item Name</th>
              <th>Price</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
                $item_id = $row["item_id"];
                $sql = "SELECT * FROM product WHERE item_id = '$item_id'";
                $product_result = $con->query($sql);
                $product_row = $product_result->fetch_assoc();
                $price = $product_row["price"]; // Get the price of the item
                $total_price += $price; // Add the price to the total
               ?>
                <tr>
                  <td><?php echo $product_row["item_name"];?></td>
                  <td>$<?php echo $price;?></td>
                </tr>
                <?php
            }
           ?>
          </table>
          <p>Total: $<?php echo number_format($total_price, 2);?></p>
          <a href="payment.php" class="payment-button">Proceed to Payment</a>
          <div style="text-align: right; margin-top: 20px;">
            <p>Not done browsing?</p>
            <a href="homepage.php #services" class="back-button">Back to Home</a>
          </div>
        </div>
      </body>
    </html>
    <?php
} else {
    echo "No items in cart.";
   ?>
    <a href="homepage.php #services" class="back-button">Back to Home</a>
    <?php
}

// Close the database connection
$con->close();
?>