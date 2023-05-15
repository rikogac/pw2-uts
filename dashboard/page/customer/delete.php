<?php 

include_once "../../../database.php";

$customer = $pdo->query("DELETE FROM customer WHERE id = '$_GET[id]'");

header("Location: list.php");
