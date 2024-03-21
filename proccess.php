<?php
session_start();
include "Todo.php";

$todo = new Todo();

if (isset($_POST['task']) && empty($_POST['id'])) {
    $todo->create($_POST['task']);
    header("location: index.php?m=Success");
    exit();
} elseif (isset($_POST['task']) && !empty($_POST['id'])) {
    $todo->update($_POST['id'], $_POST['task']);
    header("location: index.php?m=Success");
    exit();
}
header("location: index.php?m=Error");
exit();
