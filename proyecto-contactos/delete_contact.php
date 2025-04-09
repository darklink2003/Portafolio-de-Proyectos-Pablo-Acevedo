<?php
include 'includes/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM contacts WHERE id = :id");
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: index.php?success=true");
        exit;
    } else {
        header("Location: index.php?success=false");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>