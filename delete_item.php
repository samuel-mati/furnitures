<?php
require 'connect.php';
// Handle the AJAX request to delete the item
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the item ID from the request
    $itemId = $_POST["id"];
    
    $sql = "DELETE FROM sales_orders WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $itemId);
    $stmt->execute();
    
    // Close the statement and connection
    $stmt->close();
    $mysqli->close();
}

