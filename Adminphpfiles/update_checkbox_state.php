<?php
include("./phpfiles/connection.php");


$id = $_POST['id'];
$checked = $_POST['checked'] ? 1 : 0;

$sql = "UPDATE checkboxes SET checked = ? WHERE id = ?";
$stmt= $conn->prepare($sql);
$stmt->execute([$checked, $id]);
?>