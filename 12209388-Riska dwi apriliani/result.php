<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
* {
    font-family: 'Poppins', sans-serif;
}

body {
    font-family: 'Poppins', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #FAF1E4;
    color: fff;
}

.result {
    text-align: left;
    box-shadow: 8.5px 8.5px 7px 0 rgba(255, 255, 255, 0.786);
    padding: 20px;
    border-radius: 10px;
    background-color: #f0f0f0;
    width: 600px;
    height: 55vh;
    position: relative;
}

button {
    width: 80%;
    padding: 10px;
    margin: 10px 0;
    background-color: #9EB384;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

button:hover {
    background-color: #435334;
    transform: scale(1.02);
}

.back-button {
    width: 80%;
    padding: 8px 30px;
    margin: 10px 0;
    background-color: #435334;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s ease, transform 0.2s ease;
    font-size: 15px;
}

.back-button:hover {
    background-color: #435334;
    transform: scale(1.02);
}

@media screen and (max-width: 600px) {
    .container {
        padding: 20px;
        height: 270px;
        width: 270px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-size: 9.5px;
        box-shadow: 7px 7px 6px 0 rgba(255, 255, 255, 0.786);
    }

    .result {
        height: 270px;
        width: 270px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        font-size: 9.5px;
        box-shadow: 7px 7px 6px 0 rgba(255, 255, 255, 0.786);
    }


    button {
        width: 80%;
        padding: 5px;
        font-size: 9px;
        width: 70px;
    }

   
    
}
    </style>
    <title>Document</title>
</head>
<body>
<div class="result">
    <h1>Result</h1>
        <?php 
        if (isset($_POST["submit"])) {
            if (empty($_POST["Ekonomi"]) && empty($_POST["Vip"]) && empty($_POST["Eksekutif"])) {
                echo "<p class='error'>Masukan input terlebih dahulu</p>";
            } else {
                $Ekonomi = $_POST["Ekonomi"];
                $Vip = $_POST["Vip"];
                $Eksekutif = $_POST["Eksekutif"];
                
                $Bioskop = new Bioskop($Ekonomi,$Vip,$Eksekutif);
                $Bioskop->outputHasil();
            }
        }
        ?>

<?php 
class Bioskop {
    protected $Ekonomi = 0,
           $Vip = 0,
           $Eksekutif = 0,
           $KeuntunganEkonomi = 7,
           $KeuntunganVip = 0,
           $KeuntunganEksekutif = 0,
           $TotalTiketTerjual = 0,
           $TotalKeuntungan = 0;


    public function __construct($Ekonomi, $Vip, $Eksekutif) 
    {
        if (!is_numeric($Ekonomi) || !is_numeric($Vip) || !is_numeric($Eksekutif)) 
        {
            exit("<p class='error'>Input harus berupa angka</p>");
        } elseif ($Ekonomi > 50 || $Vip > 50 || $Eksekutif > 50) 
        {
            exit("<p class='error'>Input harus diantara 1 - 50</p>");
        }

        $this->Ekonomi = $Ekonomi;
        $this->Vip = $Vip;
        $this->Eksekutif = $Eksekutif;

        $this->TotalTiketTerjual = $Ekonomi + $Vip + $Eksekutif;

        $this->cariKeuntunganVip();
        $this->cariKeuntunganEksekutif();
        $this->TotalKeuntungan = $this->KeuntunganEkonomi + $this->KeuntunganVip + $this->KeuntunganEksekutif;
    }

    public function cariKeuntunganVip() 
    {
        if ($this->Vip >= 35) {
            $this->KeuntunganVip = 25;
        } elseif ($this->Vip >= 20 && $this->Vip <= 35) {
            $this->KeuntunganVip = 15;
        } else {
            $this->KeuntunganVip = 5;
        }
    }

    public function cariKeuntunganEksekutif() 
    {
        if ($this->Eksekutif >= 40) {
            $this->KeuntunganEksekutif = 20;
        } elseif ($this->Eksekutif >= 20 && $this->Eksekutif < 40) {
            $this->KeuntunganEksekutif = 10;
        } else {
            $this->KeuntunganEksekutif = 2;
        }
    }

    public function outputHasil()
    {
        echo "<p class='total output'> Total tiket terjual :" . $this->TotalTiketTerjual . "</p>";
        echo "<p class='outputEkonomi output'> Tiket ekonomi : " . $this->Ekonomi . "</p>";
        echo "<p class='outputVip output'> Tiket Vip : " . $this->Vip . "</p>";
        echo "<p class='outputEksekutif output'> Tiket Eksekutif : " . $this->Eksekutif . "</p>";
        echo "<p class='total output'> Total Keuntungan : " . $this->TotalKeuntungan . "%</p>";
        echo "<p class='keuntungan output'> Keuntungan Ekonomi : " . $this->KeuntunganEkonomi . "%</p>";
        echo "<p class='keuntungan output'> Keuntungan Vip : " . $this->KeuntunganVip . "%</p>";
        echo "<p class='keuntungan output'> Keuntungan Eksekutif : " . $this->KeuntunganEksekutif . "%</p>";
        
    }
}
?>
    </div>

    
</body>
</html>