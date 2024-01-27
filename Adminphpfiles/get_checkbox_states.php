<?php
// Connect to the database
include("./phpfiles/connection.php");

// Retrieve the checkbox states
$query = $db->query('SELECT id, state FROM checkboxes');
$checkboxStates = $query->fetchAll(PDO::FETCH_KEY_PAIR);

echo json_encode($checkboxStates);
?>