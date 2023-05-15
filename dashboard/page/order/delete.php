<?php

include_once "../../../database.php";

$order = $pdo->query("DELETE FROM `order` WHERE id = '$_GET[id]'");

header("Location: list.php");
