{{-- untuk mengimpor template --}}
@extends('layouts.template')

{{-- untuk mengisi yield --}}
@section('content')
    {{-- tempat alert --}}
    <div id="msg-success"></div>
    <table class="table table-striped table-bordered table-hovered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Stok</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($medicines as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td style="background: {{ $item['stock'] <= 3 ? 'red' : 'none' }}">{{ $item['stock'] }}</td>
                    <td>
                        <div class="btn btn-primary" onclick="edit({{ $item['id'] }})">Tambah Stock</div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end">
        @if ($medicines->count())
            {{ $medicines->links() }}
        @endif
    </div>

    {{-- modal --}}
    <div class="modal fade" id="tambah-stock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data Stok</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="form-stock">
                    <div class="modal-body">
                        {{-- tempat alert error --}}
                        <div id="msg"></div>
                        {{-- input hidden tidak akan tertampil, biasanya digunakan untuk menyimpan data yang dioerlukan di proses BE tp tidak bole diketahui/diubah user --}}
                        <input type="hidden" name="id" id="id">
                        <div>
                            <label for="name">Nama obat :</label>
                            <input type="text" disabled name="name" id="name" class="form-control">
                        </div>
                        <div>
                            <label for="stock">Stok :</label>
                            <input type="number" name="stock" id="stock" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        // crsf token ver js
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr("content"),
            }
        })

        function edit(id) {
            // panggil route dari web.php yang akan menangani proses ambil data
            let url = "{{ route('medicine.show', 'id') }}";
            // ganti bagian 'id' di url nya jadi data dari parameter id di function nya (id kedua sesuai dengan path dinamis di controller )
            url = url.replace('id', id);

            // pengambilan data dari FE ke BE dijembatani oleh jquery ajax
            $.ajax({
                // route nya pakai method :: apa
                type: 'GET',
                // link route nya dari let url
                // pertama property ajax kedua 
                url: url,
                // data yang dihasilkan bentuk json
                contentType: 'json',
                // kalau proses ambil data berhasil, ambil data yg dikirim BE lewat parameter res
                success: function(res) {
                    // munculkan modal yg id nya tambah-stock
                    $("#tambah-stock").modal("show");
                    // isi value input dari hasil response BE
                    $("#name").val(res.name);
                    $("#stock").val(res.stock);
                    $("#id").val(res.id);
                }
            })
        }
        // ketika form dengan id='form-stock' button submit nya di klik
        $("#form-stock").submit(function(e) {
            // element form penanganan actionnya akan diambil alih (ditangani) oleh js
            e.preventDefault();
            // ambil value dari inputan id yang disembunyikan, untuk mengisi path {id} di routenya
            let id = $('#id').val();
            // route action penanganan update data
            let url = "{{ route('medicine.stock.update', "id") }}"
            url = url.replace('id', id);
            // buat variable data yang akan dikirim ke BE 
            let data = {
                stock: $("#stock").val(),
            }

            $.ajax({
                type: 'PATCH',
                url: url,
                data: data,
                cache: false,
                success: function(res) {
                    // jika berhasil, modal di hide
                    $("#tambah-stock").modal("hide");
                    // buat session js bernama 'successUpdateStock'
                    sessionStorage.successUpdateStock = true;
                    window.location.reload();
                },
                error: function(err) {
                    // kalau terjadi error, pada element id="msg" tambah class dengan value alert alert-danger
                    $('#msg').attr("class", "alert alert-danger");
                    // isi text element id="msg" diambil dr responsejson bagian message
                    $("#msg").text(err.responseJSON.message);
                }
            })

        });

        // function tanpa nama akan dijalankan ketika web baru selesai loading
        $(function() {
            if (sessionStorage.successUpdateStock) {
                $("#msg-success").attr("class", "alert alert-success");
                $("#msg-success").text("Berhasil mengubah data stock");
                // hapus kembali data session setelah alert success dimunculkan
                sessionStorage.clear();
            }
        })
    </script>
@endpush
