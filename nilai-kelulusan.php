<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penilaian Ujian</title>
</head>
<body>
    <h2>Form Input Nilai Ujian</h2>
    <form method="post" action="">
        <label>Nama: </label>
        <input type="text" name="nama" required><br><br>
        
        <label>Email: </label>
        <input type="email" name="email" required><br><br>
        
        <label>Nilai Ujian: </label>
        <input type="number" name="nilai" min="0" max="100" required><br><br>
        
        <input type="submit" name="proses" value="Proses">
    </form>

    <?php
    if (isset($_POST['proses'])) {
        // Ambil data + cegah XSS pake htmlspecialchars
        $nama = htmlspecialchars($_POST['nama']);
        $email = htmlspecialchars($_POST['email']);
        $nilai = (int)$_POST['nilai'];

        // Struktur kendali: cek kelulusan
        if ($nilai > 70) {
            $keterangan = "Lulus";
        } elseif ($nilai == 70) {
            $keterangan = "Lulus dengan nilai pas"; // biar jelas
        } else {
            $keterangan = "Remedial";
        }

        // Tampilkan output
        echo "<hr>";
        echo "<h3>Hasil Penilaian</h3>";
        echo "Nama: $nama <br><br>";
        echo "Email: $email <br><br>";
        echo "Nilai Ujian: $nilai <br><br>";
        echo "<strong>Keterangan: $keterangan</strong> <br>";
    }
    ?>
</body>
</html>