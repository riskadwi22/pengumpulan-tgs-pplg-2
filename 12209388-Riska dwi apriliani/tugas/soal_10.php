<?php
//preparation
$nilai_pabp;
$nilai_mtk;
$nilai_dpk;
$rata_rata;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div style="display: flex;">
            <label for="pabp">Masukan Nilai PABP</label>
            <input type="number" name="pabp" id="pabp">
        </div>
        <div style="display: flex;">
            <label for="mtk">Masukan Nilai MTK</label>
            <input type="number" name="mtk" id="mtk">
        </div>
        <div style="display: flex;">
            <label for="dpk">Masukan Nilai DPK</label>
            <input type="number" name="dpk" id="dpk">
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    $nilai_pabp = $_POST['pabp'];
    $nilai_mtk= $_POST['mtk'];
    $nilai_dpk = $_POST['dpk'];

$rata_rata = ($nilai_dpk + $nilai_mtk + $nilai_pabp) / 3;

if($rata_rata <= 100 && $rata_rata >= 80){
    echo "Nilai A";
}
else if($rata_rata <= 80 && $rata_rata >= 75){
    echo "Nilai B";
}
else if($rata_rata <= 75 && $rata_rata >= 65){
    echo "Nilai C";
}
else if($rata_rata <= 65 && $rata_rata >= 45){
    echo "Nilai D";
}
else if($rata_rata <= 45 && $rata_rata >= 0){
    echo "Nilai E";
}
else{
    echo "Nilai tidak sesuai kriteria";
}
}
?>