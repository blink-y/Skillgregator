<?php
include 'connection.php';

$stmt = $conn->prepare("SELECT DISTINCT skill_id, category FROM Skills LIMIT 3") or die ("Connection failed: " . mysqli_connect_error());
$stmt->execute();
$explore_skills = $stmt->get_result();

$stmt = $conn->prepare("SELECT * FROM Skills ORDER BY popularity DESC LIMIT 3") or die ("Connection failed: " . mysqli_connect_error());
$stmt->execute();
$recom_skills = $stmt->get_result();

?>