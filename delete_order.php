<?php
// Database configurations
$db2 = new mysqli('localhost', 'root', '', 'db2');

if ($db2->connect_error) {
    die("Connection failed: " . $db2->connect_error);
}

// Get the order ID from the request
$order_id = intval($_POST['order_id']); // Use POST for AJAX requests

// Update the status to 1
$query = "UPDATE orders SET status = 1 WHERE id = ?";
$stmt = $db2->prepare($query);
$stmt->bind_param("i", $order_id);
$result = $stmt->execute();

if ($result) {
    echo "success";
} else {
    echo "Error updating order status: " . $stmt->error;
}

$stmt->close();
$db2->close();
?>
