<?php
$listFilm =[
    [
        "judul" =>"miracle in call no. 7",
        "min-usia" => 15,
        "harga" => 45000
         
    ],
    [
        "judul" =>"the invitation",
        "min-usia" => 17,
        "harga" => 35000
         
    ],
    [
        "judul" =>"luck",
        "min-usia" => 7,
        "harga" => 35000
         
    ]
]
?>
<center>
    <form action="" method="post">
        <table>
            <tr>
                <td>usia</td>
                <td><input type="number" name="usia"></td>
            </tr>
            <tr>
                <td>Film</td>
                <td>
                    <select name="judul">
                    <!-- menyembunyikan opsi ini ini dari list
                    select, disable:gabisa dipilih,selected:awal dibuka
                    opsi ini yang muncul di select  -->
                <option hidden disabled selected>--pilih film--</option>
                <!-- lopp tiap item arraynya agar muncul di list opsi select -->
                <?php
                    foreach($listFilm as $key => $film) {
                ?>
                <!-- value di option : data yang di ambil sistem ketika
            opsi ini dipilih ambil $key agar yang di ambil sistem index dari aary nya
             bukan nama film. kenapa? karena agar nanti mengambil property lain dari arry nya gampang
             ga harus ribet cari indexnya dulu  dari si judulnya. yang di pertengahan tag mengambil
            property judul karena agar yang di lihat di opsinya itu judul bukan angka index -->
            <!-- simbol php yang di value itu artinya tag php echo -->
            <option value="<?=$key ?>"><?= $film['judul'] ?></option>
            <!-- karena buat tanda kurung doang di simpan di tag php karena tanda
             penutup kurung ini penutup dari forech yg di buat php -->
             <?php
              }
             ?>
            </select>
                </td>
            </tr>
            <tr>
                <!-- td kosong karena di tr atasnya ada 2 tr
                biar sama dan sejajar ada 2 td di tr ini juga -->
                <td></td>
                <td><input type="submit" name="simpan" value="simpan"></td>
            </tr>
        </table>
    </form>
    </center>
    <?php
    if(isset($_POST['simpan'])) {
        $usia = $_POST['usia'];
        $filmId= $_POST['judul'];
        // karena tadi select nya udah nyimpen value berupa ket(index)
        // dr judul yang di pilih jadi buat ambil ptoperty
        // min-usia atau harga dari array yang sesuai dengan judul yang di pilih
        // tinggi ambil dari arr listfilm index ke sesuat $_post
        // ['judul'] terus ambil property minusia/harga
        $minUsia = $listFilm[$filmId]['min-usia'];
        $harga = $listFilm[$filmId]['harga'];

        if($usia >= $minUsia) {
            // number_format mengubah format int ke rupiah
            // $harga var int nya
            // dua jumlah nol yang mau di tambahkan di belakngnya(,)
            // tanda pemisah 2  nol tersebut , (.)
            // tanda pemisahan pertiga angka
            echo "<h2 style-'color : green'> silahkan untuk membayar sebesar Rp. " .
            number_format($harga, 2, ',', '.') . "</h2>";
        }else{
            echo"<h2 style='color : red'>usia belum cukup</h2>";
        }
        }
    ?>
    