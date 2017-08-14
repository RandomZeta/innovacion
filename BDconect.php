<?php
$mysqli = new mysqli("127.0.0.1", "root", "root", "sistema_innovacion");

$user='root';
$password='root';
$dbname='sistema_innovacion';
$host='127.0.0.1';

$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);

if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}