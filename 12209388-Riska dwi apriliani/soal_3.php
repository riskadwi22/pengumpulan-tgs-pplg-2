<?php
//peparation
$bilangan_satu;
$bilangan_dua;
$bilangan_tiga;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menentukan nilai terbesar</title>
</head>
<body>
    <form action="" method="post">
        <div style="display:flex;">
           <label for="angka_pertama">Masukan Angka Pertama</label>
           <input type="number" name="angka_kesatu" id="angka_kesatu">
        </div>
         <div style="display:flex;">
           <label for="angka_kedua">Masukan Angka Kedua</label>
           <input type="number" name="angka_kedua" id="angka_kedua">
        </div>
         <div style="display:flex;">
           <label for="angka_ketiga">Masukan Angka Ketiga</label>
           <input type="number" name="angka_ketiga" id="angka_ketiga">
        </div>
        <button type="Submit" name = "submit">Kirim</button>
</body>
</html>

<!---proses --->
<?php
//cek apakah button dengan name submit di klik 
if (isset($_POST['submit'])){
  //pengisian input ke variable 
  // $_POST disamakan dengan attr name 

  $bilangan_satu = $_POST['angka_kesatu'];
  $bilangan_dua = $_POST['angka_kedua'];
  $bilangan_tiga = $_POST['angka_ketiga'];


  //desicion 
  if($bilangan_satu > $bilangan_dua && $bilangan_satu > $bilangan_tiga){
    //. namanya concat : menghubungkan string dan variable
    echo "Bilangan pertama : " . $bilangan_satu . " || Bilangan kedua : " . 
    $bilangan_dua . "|| Bilangan ketiga : " . $bilangan_tiga . ". Yang terbesar :
    <b>" . $bilangan_satu . "</b>";
  }else if ($bilangan_dua > $bilangan_satu && $bilangan_dua > $bilangan_tiga){
    echo "Bilangan pertama : " . $bilangan_satu . " || Bilangan kedua : " . 
    $bilangan_dua . "|| Bilangan ketiga : " . $bilangan_tiga . ". Yang terbesar :
    <b>" . $bilangan_dua . "</b>";
  } else if($bilangan_tiga > $bilangan_satu && $bilangan_tiga > $bilangan_dua){
    echo "Bilangan pertama : " . $bilangan_satu . " || Bilangan kedua : " . 
    $bilangan_dua . "|| Bilangan ketiga : " . $bilangan_tiga . ". Yang terbesar :
    <b>" . $bilangan_tiga . "</b>";
  } else{
    echo "Bilangan Pertama : " . $bilangan_satu . "|| Bilangan kedua : " . 
    $bilangan_dua . "|| Bilangan ketiga : " . $bilangan_tiga . "<b> BILANGAN SAMA BESAR </b>";
  }
}