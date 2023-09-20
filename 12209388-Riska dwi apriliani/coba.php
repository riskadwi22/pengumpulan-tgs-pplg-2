<!DOCTYPE html>
<html>
<head>
    <title>Konversi Detik ke Jam-Menit-Detik</title>
</head>
<body>
    <h2>Konversi Detik ke Jam-Menit-Detik</h2>
    <form method="post" action="">
        <label for="total_detik">Total Detik:</label>
        <input type="number" id="total_detik" name="total_detik" required><br><br>
        
        <input type="submit" name="konversi" value="Konversi">
    </form>
    
</body>
</html>
    <?php
    if (isset($_POST['konversi'])) {
        $total_detik = $_POST['total_detik'];
        
        $jam = floor($total_detik / 3600);
        $sisa_detik = $total_detik % 3600;
        $menit = floor($sisa_detik / 60);
        $detik = $sisa_detik % 60;
        
        echo "<h3>Hasil Konversi</h3>";
        echo "<p>$total_detik sama dengan $jam jam $menit menit $detik detik</p>";
    }
    ?>
