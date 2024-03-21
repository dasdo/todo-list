<?php
session_start();
include "Todo.php";

$todo = new Todo();

$todo->clear();
header("location: index.php?m=Success");
exit();
