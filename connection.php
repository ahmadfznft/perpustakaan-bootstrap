<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'fauzan_digitallibrary_bootstrap');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>