<?php
session_start();
include "Todo.php";

$todo = new Todo();

if (isset($_GET['id'])) {
    $todo->delete($_GET['id']);
    header("location: index.php?m=Success");
    exit();
}
header("location: index.php?m=Error");
exit();
