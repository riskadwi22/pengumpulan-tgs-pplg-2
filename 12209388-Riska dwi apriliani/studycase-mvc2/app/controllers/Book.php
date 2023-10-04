<?php

class Book extends Controller{
    public function index()
    {
        $data['judul'] = 'Data Buku';
        $data['buku'] = $this->model('BukuModel')->getAllBuku();
        $this->view('templates/header', $data);
        $this->view('book/index', $data);
        $this->view('templates/footer');
    }
    
    public function tambah()
    {
        $data['judul'] = 'Tambah Buku';
        $this->view('templates/header', $data);
        $this->view('book/create', $data);
        $this->view('templates/footer');
    }

    public function simpanBuku(){
        if ($this->model('BukuModel')->tambahBuku($_POST) > 0) {
            header('location: '. BASE_URL . '/book/index');
            exit;
        }else {
            header('location: '. BASE_URL . '/book/index');
            exit;
        }
    }

    public function edit($id){
        $data['judul'] = 'Edit Buku';
        $data['buku'] = $this->model('BukuModel')->getBukuById($id);
        $this->view('templates/header', $data);
        $this->view('book/edit', $data);
        $this->view('templates/footer');
    }

    public function updateBuku(){
        // echo $this->model('BukuModel')->updateDataBuku($_POST);
        if ($this->model('BukuModel')->updateDataBuku($_POST) > 0) {
            header('location: '. BASE_URL . '/book/index');
            exit;
        }else {
            header('location: '. BASE_URL . '/book/index');
            exit;
        }
    }

    public function hapus($id){
        if ($this->model('BukuModel')->deleteBuku($id) > 0) {
            header('location: '. BASE_URL . '/book/index');
            exit;
        }else {
            header('location: '. BASE_URL . '/book/index');
            exit;
        }
    }

    public function cari(){
        $data['judul'] = 'Daftar Peminjam';
        $data['buku'] = $this->model('BukuModel')->caridata($_POST['keyword']);
        $this->view('templates/header', $data);
        $this->view('book/index', $data);
        $this->view('templates/footer');
    }
}
?>