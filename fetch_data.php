<?php
// Database configurations
$db1 = new mysqli('localhost', 'root', '', 'db1');
$db2 = new mysqli('localhost', 'root', '', 'db2');

if ($db1->connect_error || $db2->connect_error) {
    die("Connection failed: " . $db1->connect_error . " / " . $db2->connect_error);
}

// SQL query to join users and orders
$query = "SELECT u.name, u.email, o.id as order_id, o.product, o.quantity, o.status
          FROM db1.users u
          JOIN db2.orders o ON u.id = o.user_id
          WHERE o.status != '1'";

$result = $db1->query($query);

if ($result === false) {
    die("Query failed: " . $db1->error);
}

// Fetch and display the data
while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($row['name']) . '</td>';
    echo '<td>' . htmlspecialchars($row['email']) . '</td>';
    echo '<td>' . htmlspecialchars($row['product']) . '</td>';
    echo '<td>' . htmlspecialchars($row['quantity']) . '</td>';
    echo '<td><button class="btn btn-danger" onclick="deleteRecord(' . htmlspecialchars($row['order_id']) . ')">Delete</button></td>';
    echo '</tr>';
}

$db1->close();
$db2->close();
?>
