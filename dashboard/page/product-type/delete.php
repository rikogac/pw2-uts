<?php 

include_once "../../../database.php";

$product_type = $pdo->query("DELETE FROM product_type WHERE id = '$_GET[id]'");

header("Location: list.php");
