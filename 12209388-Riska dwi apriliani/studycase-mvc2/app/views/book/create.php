<div class="container">
    <h3 class="mb-3">Tambah Peminjaman</h3>
    <form action="<?= BASE_URL; ?>/book/simpanBuku" method="post">
    <div class="class-body">
            <div class="form-group mb-3">
                <label for="nama_peminjam">Nama Peminjam</label>
                <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" required>
            </div>
            <div class="form-group mb-3">
                <label for="jenis_barang">Jenis Barang</label>
                <select name="jenis_barang" id="jenis_baranag" class="form-control" required>
                    <option hidden disabled selected value="">Pilih</option>
                    <option value="Laptop">Laptop</option>
                    <option value="HP">HP</option>
                    <option value="Adaptor LAN">Adaptor LAN</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="no_barang">No Barang</label>
                <input type="text" class="form-control" id="no_barang" name="no_barang" required>
            </div>
            <div class="form-group mb-3">
                <label for="tgl_selesai">Tanggal Pinjam</label>
                <input type="datetime-local" class="form-control" id="tgl_selesai" name="tgl_pinjam" required>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>