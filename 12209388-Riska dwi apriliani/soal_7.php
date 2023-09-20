<?php
$total_gram; $harga_sebelum; $diskon; $harga_setelah;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>soal no 7</title>
</head>

<body>
    <form action="" method="post">
        <div style="display: flex;">
            <label for="grams">Masukan Total Gram</label>
            <input type="string" name="grams" id="grams">
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    $total_gram = $_POST['grams'];

$harga_sebelum = 500 * $total_gram;
$diskon = (5 * $harga_sebelum) / 100;
$harga_setelah = $harga_sebelum - $diskon;

echo "Harga sebelum diskon : " . $harga_sebelum . " || Diskon : " . $diskon . " || Harga setelah diskon : " . $harga_setelah;
}

?>