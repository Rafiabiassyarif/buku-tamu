<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "buku_tamu";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}


$sql = "INSERT INTO keperluan (liburan) VALUES ('Bisnis'), ('Wisata'), ('Kunjungan Keluarga')";
$conn->query($sql);


$sql = "INSERT INTO tamu (nama, email, pesan, keperluan_id) VALUES
    ('John Doe', 'john@example.com', 'Saya ingin berkunjung', 1),
    ('Jane Smith', 'jane@example.com', 'Ingin tahu lebih lanjut', 2)";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil dimasukkan.";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
