<?php
// Database configurations
$db1 = new mysqli('localhost', 'root', '', 'db1');
$db2 = new mysqli('localhost', 'root', '', 'db2');

if ($db1->connect_error || $db2->connect_error) {
    die("Connection failed: " . $db1->connect_error . " / " . $db2->connect_error);
}

function startTransaction($db1, $db2) {
    $db1->begin_transaction();
    $db2->begin_transaction();
}

function rollbackTransaction($db1, $db2) {
    $db1->rollback();
    $db2->rollback();
}

try {
    startTransaction($db1, $db2);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];

    // Insert into db1
    $stmt = $db1->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
    if ($stmt === false) {
        throw new Exception('Prepare failed: ' . $db1->error);
    }
    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();
    if ($stmt->error) {
        throw new Exception('Execute failed: ' . $stmt->error);
    }
    
    // Get the last inserted ID
    $userId = $stmt->insert_id;
    $stmt->close();

  

    // Insert into db2
    $stmt = $db2->prepare("INSERT INTO orders (user_id, product, quantity) VALUES (?, ?, ?)");
    if ($stmt === false) {
        throw new Exception('Prepare failed: ' . $db2->error);
    }
    $stmt->bind_param("isi", $userId, $product, $quantity);
    $stmt->execute();
    if ($stmt->error) {
        throw new Exception('Execute failed: ' . $stmt->error);
    }
    $stmt->close();
    
    $db1->commit();
    $db2->commit();
    
    header("Location: index.php ");
    exit();

} catch (Exception $e) {
    rollbackTransaction($db1, $db2);
    echo "Transaction failed: " . $e->getMessage();
}

$db1->close();
$db2->close();
?>
