<?php
session_start();
require 'Database.php';
require 'Admin.php';
$database = new Database;
$admin = new AdminModel;
$database->query('SELECT * FROM photodb.admin ');
$rows = $database->resultSet();

$admin->logout();
