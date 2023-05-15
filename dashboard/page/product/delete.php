<?php

include_once "../../../database.php";

$product = $pdo->query("DELETE FROM product WHERE id = '$_GET[id]'");

header("Location: list.php");
