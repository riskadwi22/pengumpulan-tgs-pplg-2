<?php 
    class Motor {
        private $hargaMatic;
        private $hargaSport;
        private $hargaTrail;
        private $listMember = ['erlan', 'aripin', 'ucup'];//cuma di clas yang motor
        public $motorYangDipilih;
        public $waktuRental;
        public $namaPelanggan;
        protected $totalPembayaran;//karena di class turunan
        protected $diskon;
        protected $pajak;

        function __construct()//nilai yang udah pasti
        {
            $this->diskon = 0.05;
        }

    
        public function setHarga($Matic,$Sport,$Trail,) {
            $this->hargaMatic = $Matic;
            $this->hargaSport = $Sport;
            $this->hargaTrail = $Trail;
        }

        public function getlistMember() {
            return $this->listMember;
        }

        public function setListNama($nama) {
            $this->namaPelanggan = $nama;
        }

        public function getListNama() {
            return $this->namaPelanggan;
        }

        public function getHarga(){
            $semuaDataMotor["Matic"] = $this->hargaMatic;
            $semuaDataMotor["Sport"] = $this->hargaSport;
            $semuaDataMotor["Trail"] = $this->hargaTrail;
            return $semuaDataMotor;
        }

    }

    class Rental extends Motor {
        public function totalHargaRental() {
            $hargaMotor = $this->getHarga();
            $hargaRental = $this->waktuRental * $hargaMotor[$this->motorYangDipilih];
            $hargaRental += 10000;
            return $hargaRental;
        }

        public function hargaDiskon() {
            $hargaMotor = $this->getHarga();
            $hargaRental = $this->waktuRental * $hargaMotor[$this->motorYangDipilih];
            $diskon = $hargaRental * $this->diskon;
            $totalDiskon = $hargaRental - $diskon + 10000;
            return $totalDiskon;
        }

        public function cetakRental() {
            $hargaMotor = $this->getHarga();

            if (in_array($this->getListNama(), $this->getlistMember())) {
                echo"<br>";
                echo "----------------STRUK RENTAL PINPIN MOTOR----------------<br>";
                echo"<br>";
                echo "Nama Pelanggan: " .ucfirst($this->getListNama()) . "<br>";
                echo "Jenis Motor Yang Disewa: " .ucfirst($this->motorYangDipilih) . "<br>";
                echo "Harga Sewa Per Hari: Rp. " .number_format($hargaMotor[$this->motorYangDipilih], 0, ',', '.')  . "<br>";
                echo "Waktu Peminjaman (hari): " .$this->waktuRental . "<br>";
                echo "Total Harga Yang Harus Dibayar tambah pajak: Rp. " . number_format($this->hargaDiskon(), 0, ',', '.') . "<br>";
                echo "Mendapatkan Diskon Sebesar 5% <br>";
                echo "Terimakasih telah berkunjung di toko kami <br>";
        } else {
            echo"<br>";
            echo "----------------STRUK RENTAL PINPIN MOTOR----------------<br>";
            echo"<br>";
            echo "Nama Pelanggan: " .ucfirst($this->getListNama()) . "<br>";
            echo "Jenis Motor Yang Disewa: " .ucfirst($this->motorYangDipilih) . "<br>";
            echo "Harga Sewa Per Hari: Rp. " .number_format($hargaMotor[$this->motorYangDipilih], 0, ',', '.')  . "<br>";
            echo "Waktu Peminjaman (hari): " .$this->waktuRental . "<br>";
            echo "Total Harga Yang Harus Dibayar tambah pajak: Rp. " . number_format($this->totalHargaRental(), 0, ',', '.') . "<br>";
            echo "Tidak Ada Diskon untuk Pelanggan yang bukan member <br>";
            echo "Terimakasih telah berkunjung di toko kami<br>";
        }

    } 
}
?>