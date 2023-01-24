<?php
require_once '../db/connection.php';

$id = filter_input(INPUT_GET, 'id');
$query = "DELETE FROM pessoa WHERE id= {$id}";

mysqli_query($conn, $query);
mysqli_close($conn);

header("Location: ../index.php");

?>