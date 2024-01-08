@extends('layouts.template')

@section('content')
    <div class="container mt-3">
            <div class="justify-content-end d-flex" style="margin-bottom: 10px"> 
                <a href="{{ route('admin.order.download-excel') }}" class="btn btn-success">Export Excel</a>
            </div>{{-- <button type="submit" href="#" class="btn btn-secondary">Tambah Pengguna</button> --}}
            <br>
            <table class="table-striped w-100 table mt-3 ">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pembeli</th>
                        <th scope="col">Pesanan</th>
                        <th scope="col">Total Bayar</th>
                        <th scope="col">Kasir</th>
                        <th scope="col">Tanggal</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($orders as $order)
                        <tr>
                            {{-- currentpage : ambil posisi ada di page keberapa - 1 (misal udha klik next lagi ada di page 2 berarti jadi 2-1 = 1), perpage : mengambil jumlah data yang diterampilkan per page nya berapa (ada di controller bagian paginate/simplePaginate, misal 5), loop->index : mengambil index dari array (mulai dari 0)+1 --}}
                            {{-- jadi : (2-1) x 5 + 1 = 6 (dimulai dari angka 6 di page ke 2 nya) --}}

                            <td>{{ ($orders->currentpage() - 1) * $orders->perpage() + $loop->index + 1 }}</td>
                            <td>{{ $order['name_customer'] }}</td>
                            {{-- nested loop: looping didalam looping --}}
                            {{-- karna column medicines pada table orders tipe datanya json, jadi untuk akses nya perlu looping --}}
                            <td>
                                <ol>
                                    @foreach ($order['medicines'] as $medicine)
                                        {{-- tampilan yang ingin ditampilkan --}}
                                        {{-- 1. nama obat Rp. 1.000 (qty 2) = Rp. 2.000 --}}
                                        <li>{{ $medicine['name_medicine'] }} <small>Rp.
                                                {{ number_format($medicine['price'], 0, ',', '.') }} <b>(qty :
                                                    {{ $medicine['qty'] }})</b></small> =Rp.
                                            {{ number_format($medicine['price_after_qty'], 0, ',', '.') }}</li>
                                    @endforeach
                                </ol>
                            </td>
                            {{-- mengambil column dari relasi, $variable['namaFunctionDiModel'] 
                        ['namaColumnDiDBRelasi'] --}}

                            @php
                                $ppn = $order['total_price'] * 0.1;
                            @endphp

                            <td>Rp. {{ number_format($order['total_price'] + $ppn, 0, ',', '.') }}</td>

                            <td>
                                {{ $order['user']['name'] }}
                                <a href="mailto:{{ $order['user']['email'] }}">({{ $order['user']['email'] }})</a>
                            </td>
                            @php
                                // set lokasi waktu berdasarkan penamaan dan jam WIB indonesia
                                setLocale(LC_ALL, 'IND');
                            @endphp

                            {{-- carbon : package bawaan laravel untuk memanipulasi format tanggal/waktu --}}
                            <td>{{ Carbon\Carbon::parse($order['created_at'])->formatLocalized('%d %B %Y') }}</td>

                            <td>
                                {{-- <a href="{{ route('order.download-pdf', $order['id']) }}"
                                    class="btn btn-success">Download</a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                @if ($orders->count())
                    {{ $orders->links() }}
                @endif
            </div>
        
    @endsection