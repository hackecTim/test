<?php
session_start();
require_once "Config.php";

if (!isset($_SESSION['userID'])) {
    header("Location: ../Sites/login.php?error=login_required");
    exit;
}

if (!isset($_POST['placeID'])) {
    die("Missing placeID");
}

$userID  = (int) $_SESSION['userID'];
$placeID = (int) $_POST['placeID'];

$checkSql = "SELECT 1 FROM Wishlist WHERE userID = ? AND placeID = ?";
$checkStmt = $conn->prepare($checkSql);
$checkStmt->bind_param("ii", $userID, $placeID);
$checkStmt->execute();
$checkStmt->store_result();

if ($checkStmt->num_rows > 0) {
    header("Location: ../pages-layout/page_layout.php?placeID=$placeID&wishlist=exists");
    exit;
}

$insertSql = "INSERT INTO Wishlist (userID, placeID) VALUES (?, ?)";
$insertStmt = $conn->prepare($insertSql);
$insertStmt->bind_param("ii", $userID, $placeID);

if (!$insertStmt->execute()) {
    die("Database error: " . $insertStmt->error);
}

header("Location: ../pages-layout/page_layout.php?placeID=$placeID&wishlist=added");
exit;
