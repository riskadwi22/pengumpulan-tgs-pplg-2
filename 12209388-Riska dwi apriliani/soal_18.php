<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Juara Kelas</title>
    <style>
                body {
    font-family: Arial, sans-serif;
    background-color:#658864 ;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #C4D7B2;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

h1 {
    margin-bottom: 20px;
}

form {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    padding: 8px 15px;
    background-color: #9EB384;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #435334;
}
    </style>
</head>
<body>
    <div class="container">
        <h1>Pencarian Juara Kelas</h1>
        
        <form method="post">
            <label for="nilai_mtk">Input Nilai Matematika:</label>
            <input type="number" id="nilai_mtk" name="nilai_mtk" min="0" max="100" required>
            <label for="nilai_indo">Input Nilai Indonesia:</label>
            <input type="number" id="nilai_indo" name="nilai_indo" min="0" max="100" required>
            <label for="nilai_ingg">Input Nilai Inggris:</label>
            <input type="number" id="nilai_ingg" name="nilai_ingg" min="0" max="100" required>
            <label for="nilai_dpk">Input Nilai DPK :</label>
            <input type="number" id="nilai_dpk" name="nilai_dpk" min="0" max="100" required>
            <label for="nilai_agama">Input Nilai Agama:</label>
            <input type="number" id="nilai_agama" name="nilai_agama" min="0" max="100" required>
            <label for="kehadiran">Persentase Kehadiran (%):</label>
            <input type="number" id="kehadiran" name="kehadiran" min="0" max="100" required>
            <button type="submit">Cek dulu ya!</button>
        </form>
        
        <?php
        if(isset($_POST['nilai_mtk']) && isset($_POST['nilai_indo']) && isset($_POST['nilai_ingg']) && isset($_POST['nilai_dpk']) && isset($_POST['nilai_agama']) && isset($_POST['kehadiran'])) {
            $nilai_mtk = intval($_POST['nilai_mtk']);
            $nilai_indo = intval($_POST['nilai_indo']);
            $nilai_ingg = intval($_POST['nilai_ingg']);
            $nilai_dpk = intval($_POST['nilai_dpk']);
            $nilai_agama = intval($_POST['nilai_agama']);
            $kehadiran = intval($_POST['kehadiran']);
            
            $total_nilai = $nilai_mtk + $nilai_indo + $nilai_ingg + $nilai_dpk + $nilai_agama;
            
            if ($total_nilai >= 475 && $kehadiran == 100) {
                echo "<p>Selamat! Anda adalah juara kelas.</p>";
            } else {
                echo "<p>Maaf, Anda belum memenuhi syarat untuk menjadi juara kelas.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
