<?php
include 'koneksi.php';

$sql = "SELECT tamu.nama, tamu.email, keperluan.deskripsi AS keperluan, tamu.pesan, tamu.tanggal 
        FROM tamu 
        JOIN keperluan ON tamu.keperluan_id = keperluan.id 
        ORDER BY tamu.tanggal DESC 
        LIMIT 5";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tamu</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Daftar Tamu</h2>
    <table>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Keperluan</th>
            <th>Pesan</th>
            <th>Tanggal</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row["nama"] ?></td>
            <td><?= $row["email"] ?></td>
            <td><?= $row["keperluan"] ?></td>
            <td><?= $row["pesan"] ?></td>
            <td><?= $row["tanggal"] ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
