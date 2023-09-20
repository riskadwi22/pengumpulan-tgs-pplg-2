<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Pegawai</title>
    <style>

 body {
    font-family: Arial, sans-serif;
    background-color: #FFF6DC;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: white;
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
    background-color: #FFC6AC;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #E48586;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Informasi Pegawai</h1>
        
        <form method="post">
            <label for="pegawaiCode">Masukan Kode Pegawai 11 digit:</label>
            <input type="number" id="pegawaiCode" name="pegawaiCode" required>
            <button type="submit">Tampilkan Informasi</button>
        </form>
        
        <?php
        if(isset($_POST['pegawaiCode'])) {
            $pegawaiCode = $_POST['pegawaiCode'];

            $nomorGolongan = substr($pegawaiCode, 0, 1);
            $tanggalLahir = substr($pegawaiCode, 1, 2);
            $bulanLahir = substr($pegawaiCode, 3, 2);
            $tahunLahir = substr($pegawaiCode, 5, 4);
            $nomorUrut = substr($pegawaiCode, 9, 2);
            
            $bulanLahirName = "";
            if ($bulanLahir == "01") {
                $bulanLahirName = "JANUARI";
            } elseif ($bulanLahir == "02") {
                $bulanLahirName = "FEBRUARI";
            } elseif ($bulanLahir == "03") {
                $bulanLahirName = "MARET";
            } elseif ($bulanLahir == "04") {
                $bulanLahirName = "APRIL";
            } elseif ($bulanLahir == "05") {
                $bulanLahirName = "MEI";    
            } elseif ($bulanLahir == "06") {
                $bulanLahirName = "JUNI";
            } elseif ($bulanLahir == "07") {
                $bulanLahirName = "JULI";
            } elseif ($bulanLahir == "08") {
                $bulanLahirName = "AGUSTUS";
            } elseif ($bulanLahir == "09") {
                $bulanLahirName = "SEPTEMBER";
            } elseif ($bulanLahir == "10") {
                $bulanLahirName = "OKTOBER";
            } elseif ($bulanLahir == "11") {
                $bulanLahirName = "NOVEMBER";
            } elseif ($bulanLahir == "12") {
                $bulanLahirName = "DESEMBER";
            }
            
            echo "<p>Nomor Golongan: " . $nomorGolongan . "</p>";
            echo "<p>Tanggal Lahir: " . $tanggalLahir . " " . $bulanLahirName . " " . $tahunLahir . "</p>";
            echo "<p>Nomor Urut: " . $nomorUrut . "</p>";
        }
        ?>
    </div>
</body>
</html>