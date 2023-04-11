<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>
    <h1>Thank you for your order!</h1>
    <p>Here's a summary of your order:</p>
    <ul>
        <li>Order Number: <?php echo $_POST['orderNumber']; ?></li>
        <li>Order Key: <?php echo $_POST['orderKey']; ?></li>
        <li>Order Date: <?php echo $_POST['orderDate']; ?></li>
        <li>Order Status: <?php echo $_POST['orderStatus']; ?></li>
        <li>Name: <?php echo $_POST['name']; ?></li>
        <li>Address: <?php echo $_POST['address']; ?></li>
        <li>City: <?php echo $_POST['city']; ?></li>
        <li>State: <?php echo $_POST['state']; ?></li>
        <li>Zip: <?php echo $_POST['zip']; ?></li>
        <li>Email: <?php echo $_POST['email']; ?></li>
        <li>Item: <?php echo $_POST['item']; ?></li>
        <li>Quantity: <?php echo $_POST['quantity']; ?></li>
    </ul>
</body>
</html>