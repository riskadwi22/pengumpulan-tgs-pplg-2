<!--preparation-->
<?php
$arrAngka =[];
$nilaiTerbesar;
$nilaiTerkecil;
$rataRata;
?>
<!--input-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yang pake js </title>
</head>
<body>
    <form action=" "method="post">
        <div id="wrap">
            <div style="display: flex;" >
            <label for="angka">Masukan Angka: </label>
            <!--name dengan tanda [] berarti bahwa semua input dengan name yang sama, 
            valuenya akan di ambil semua dan disimpan dalam bentuk array -->
            <input type="number" name="angka[]" id="angka"  required>
        </div>
        </div>
        <!-- atrtribute yang memiliki kata depan "on" disebut dengan event yang valuenya berisi script (baris code js)-->
        <p style="cursor: pointer; color:blueviolet" onclick="tambahInput()">Tambah Input Form</p>
        <button type="submit" name="submit">kirim</button>
    </form>
    <script>
        let JumlahInput = 1;
        function tambahInput(){
            //untuk mendefinisikan variabel pada js menggunakan let/const : let untuk variabel yang bisa berubah valuenya,const variabel yang tidak bisa di ubah valuenya
            //backtip(``) digunakan untuk pembuatan string yang tidak satu baris : bida di gunakan di php juga 
            let inputElement = `
            <div style="display: flex;">
            <label for="angka">Masukan angka : </label>
            <input type="number" name="angka[]" id="angka">
            </div>
            `;
            //jumlah input di increments untuk mengetahui sekarang jumlah inputnya sudah ada berapa
            JumlahInput +=1;
            //ducument : pengambilan alihan baris kode html
            //getElementById : mengambil tag html yang memiliki id tersebut : selain itu, ada getElementByClass,getElementByTagName,querySelector tergantung identitas yang akan di ambil
            if (JumlahInput < 10){
                //kalau jumlahInput masih kurang dari 10, input baru boleh dimuncul/ditambahin
                //appendChild : menambahkan element/tag baru pada bagian bawah (sebelum penutup) tag yang dimaksud (yang di panggil) pada "document."
                document.getElementById('wrap').innerHTML += inputElement;
            }
        }
    </script>
    <!--proses-->
    <?php
    if(isset($_POST['submit'])){
        //mengiris arrAngka dengan seluruh value dari input yang memiliki name angka 
        $arrAngka = $_POST['angka'];
        $nilaiTerbesar = max($arrAngka);
        $nilaiTerkecil = min($arrAngka);
        //array_sum : seluruh item arr dijumlahkan, count : menghitung jumlah item terdapat pada array 
        $rataRata = array_sum ($arrAngka)/ count($arrAngka);
        echo "Nilai Terbesar: " .$nilaiTerbesar. "<br> Nilai Terkecil :" .$nilaiTerkecil. "<br> Rata-Rata :" .$rataRata;
    }
    ?>
</body>
</html>