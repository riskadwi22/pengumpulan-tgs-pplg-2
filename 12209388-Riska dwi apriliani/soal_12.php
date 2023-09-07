<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waktu</title>
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
        <h1>Data Waktu Gila</h1>
        
        <?php
        if(isset($_POST['jam']) && isset($_POST['menit']) && isset($_POST['detik'])) {
            $jam = intval($_POST['jam']);
            $menit = intval($_POST['menit']);
            $detik = intval($_POST['detik']);

            $detikBaru = $detik + 1;
            if ($detikBaru == 60) {
                $detikBaru = 0;
                $menitBaru = $menit + 1;
                if ($menitBaru == 60) {
                    $menitBaru = 0;
                    $jamBaru = $jam + 1;
                    if ($jamBaru == 24) {
                        $jamBaru = 0;
                    }
                } else {
                    $jamBaru = $jam;
                }
            } else {
                $menitBaru = $menit;
                $jamBaru = $jam;
            }

            echo "<p>Waktu awal: " . sprintf("%02d:%02d:%02d", $jam, $menit, $detik) . "</p>";
            echo "<p>Waktu setelah ditambahkan 1 detik: " . sprintf("%02d:%02d:%02d", $jamBaru, $menitBaru, $detikBaru) . "</p>";
        }
        ?>
        
        <form method="post">
            <label for="jam">Jam:</label>
            <input type="number" id="jam" name="jam" min="0" max="23" required>
            <label for="menit">Menit:</label>
            <input type="number" id="menit" name="menit" min="0" max="59" required>
            <label for="detik">Detik:</label>
            <input type="number" id="detik" name="detik" min="0" max="59" required>
            <button type="submit">Hitung</button>
        </form>
    </div>
</body>
</html>
