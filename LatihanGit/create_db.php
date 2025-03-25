<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "buku_tamu";

$conn = new mysqli($servername, $username, $password);


if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}


$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database berhasil dibuat.<br>";
} else {
    echo "Error membuat database: " . $conn->error;
}


$conn->select_db($dbname);

$sql = "CREATE TABLE IF NOT EXISTS keperluan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    deskripsi VARCHAR(255) NOT NULL
)";
$conn->query($sql);


$sql = "CREATE TABLE IF NOT EXISTS tamu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    pesan TEXT NOT NULL,
    keperluan_id INT,
    FOREIGN KEY (keperluan_id) REFERENCES keperluan(id)
)";
$conn->query($sql);

echo "Tabel berhasil dibuat.";
$conn->close();
?>
