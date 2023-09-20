<?php
$waktu;
$jam;
$menit;
$detik;
// = "" untuk mendefinisikan bahwa variabel ini tipe datanya string
$hasil = "";
?>

<!-- siapkan input -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <titl>konversi waktu</title>
</head>
<body>
    <form action="" method="post">
        <div style="display: flex;">
        <label for="waktu">Masukan waktu awal (detik) : </label>
        <input type="number"  id="waktu" name="waktu">
    </div>
    <button type="Submit" name = "submit">Kirim</button>
    </form>
</body>
</html>

<!--proses-->
<?php
 if (isset($_POST['submit'])){
    $waktu = $_POST['waktu'];
    //desicion
    if($waktu >= 3600){
        //floor : membulakan kebawah
        //ceil : membulatkan keatas
        //round : membulatkan keatas dan kebawah
        $jam = floor($waktu/3600);
        $waktu = ($jam*3600);
        $hasil .= $jam . "jam ";
    }
    if($waktu >= 60){
        $menit = floor($waktu/60);
        $waktu -=($menit*60);
        $hasil.=$menit . " menit ";
    }
    $detik = $waktu;
    $hasil.=$detik . "detik ";
    echo "<h3>Hasil Konversi</h3>";
    echo "$total_detik detik sama dengan $jam jam $menit menit $detik detik";
 }