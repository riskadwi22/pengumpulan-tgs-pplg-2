<?php 
$menus = [
    [
        'menu' => 'Nasi Goreng',
        'harga' => 15000,
        'tipe' => 'makanan',
    ],
    [
        'menu' => 'Mie Goreng',
        'harga' => 10000,
        'tipe' => 'makanan',
    ],
    [
        'menu' => 'Kwetiaw',
        'harga' => 15000,
        'tipe' => 'makanan',
    ],
    [
        'menu' => 'Es Jeruk',
        'harga' => 5000,
        'tipe' => 'minuman',
    ],
    [
        'menu' => 'Teh Manis',
        'harga' => 5000,
        'tipe' => 'minuman',
    ],
]
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>makan</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    form {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 400px;
        margin: 0 auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table, th, td {
        border: 1px solid #ccc;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    select, input[type="number"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    label {
        font-weight: bold;
    }

    input[type="submit"] {
        background-color: #5C5470   ;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    h2 {
        font-size: 20px;
        margin-top: 20px;
    }

    p {
        margin-bottom: 20px;
    }
</style>

</head>
<body>
    <form action="" method="post">
        <table>
            <h1>Waroeng xxyn</h1>
                <tr>
                    <td><strong>Daftar Menu</strong></td>
                    <td><strong>Harga</strong></td>
                </tr>
                <?php foreach ($menus as $key => $m) : ?>
                    <tr>
                        <td>Menu: <?= $m['menu'] ?></td>
                        <td>Harga: <?= $m['harga'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <br>
            <br>
    <!-- pilih menu -->
    <form action="" method="post" id="purchase-form">
        <!-- <h2>Makanan</h2> -->
        <label for="food_menu">Pilih Makanan:</label>
        <select id="food_menu" name="food_menu">
            <option hidden disabled selected>--pilih makanan--</option>
            <?php foreach ($menus as $item): ?>
                <?php if ($item['tipe'] == 'makanan'): ?>
                    <option value="<?= $item['menu']; ?>"><?= $item['menu']; ?> - Rp <?= number_format($item['harga'], 0, ',', '.'); ?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </select><br>
                
                <label for="food_quantity" required>Jumlah Pembelian Makanan:</label>
        <option hidden disabled selected>--pilih minuman--</option>
        <input type="number" id="food_quantity" name="food_quantity" required><br>

        <!-- <h2>Minuman</h2> -->
        <label for="drink_menu">Pilih Minuman:</label>
        <select id="drink_menu" name="drink_menu">
        <option hidden disabled selected>--pilih minuman--</option>
            <?php foreach ($menus as $item): ?>
                <?php if ($item['tipe'] == 'minuman'): ?>
                    <option value="<?= $item['menu']; ?>"><?= $item['menu']; ?> - Rp <?= number_format($item['harga'], 0, ',', '.'); ?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </select><br>
                
                <label for="drink_quantity">Jumlah Pembelian Minuman:</label>
                <input type="number" id="drink_quantity" name="drink_quantity"><br>
                
                <input type="submit" value="Beli">
            </form>
            
            <!-- Menampulkan struk-->
            <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $food_menu = $_POST["food_menu"];
    $food_quantity = (int)$_POST["food_quantity"];
    $drink_menu = $_POST["drink_menu"];
    $drink_quantity = (int)$_POST["drink_quantity"];
    
    // Menghitung total
    $total_cost = 0;
    
    foreach ($menus as $item) {
        if ($item['menu'] == $food_menu) {
            $food_price = $item['harga'];
            $total_cost += $food_price * $food_quantity;
        } elseif ($item['menu'] == $drink_menu) {
            $drink_price = $item['harga'];
            $total_cost += $drink_price * $drink_quantity;
        }
    }
?>

<h2>Bukti Pembelian</h2>
<p> Makanan : <?= $food_menu ?> (<?= $food_quantity ?>)<br> Harga Makanan : <?= number_format($food_price * $food_quantity, 0, ',', '.'); ?>
<br>Minuman : <?= $drink_menu ?> (<?= $drink_quantity ?>)<br> Harga Minuman :<?= number_format($drink_price * $drink_quantity, 0, ',', '.'); ?>
<br>Total Pembayaran: <b>Rp <?= number_format($total_cost, 0, ',', '.'); ?></b></p>


<?php } ?>

</body>
</html>