@extends('layouts.template')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-4">
            <form action="{{ route('order.search')}}" class="d-flex" method="GET">
                <input type="date" class="form-control" name="query" placeholder="Cari...">
                <button type="submit" class="btn btn-sm btn-primary ml-2" style="margin-left: 5px">Cari</button>
                <button class="btn btn-sm btn-primary ml-2" style="margin-left: 4px">
                <a href="{{ route('order.index')}}" style="text-decoration: none;color:white;">reset</a>
            </button>
            </form>
        </div>
        <div class="col-4"></div>
        <div class="col-4">
            <div class="mt-5">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('order.create')}}" class="btn btn-sm btn-primary ml-2">tambah pembelian</a>
                </div>
            </div>
        </div>
    </div>
</div>




    
    <table class="table table-stripped w-100 tabble mt-3 bordered table-hovered table-bordered">
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

            @php $no = 1; @endphp
            @foreach ($orders as $order)
            <tr>
                {{-- ini yang nomor --}}
                {{-- currentPage : ambil posisi ada di page ke berapa -1 (misal udah klik next lagi ada di page 2
                berarti jadi 2-1 = 1),perpage : mengambil jumlah data yang ditampilkan per page nya berapa 
                (ada di controller bagian paginate/simplePaginate, misal 5), loop->index : mengambil index dari array
                (mulai dari 0 + 1) --}}
                {{-- jadi : (2-1) x 5 + 1 = 6 (dimulai dari angka 6 d page ke 2 nya) --}}
                <td> {{ ($orders->currentPage()-1) * $orders->perpage() + $loop->index + 1 }}</td>

                {{-- ini yang nama pembeli --}}
                <th>{{ $order['name_customer'] }} </th>
                {{-- nested loop : looping didalam looping --}}
                {{-- karena column medicines pada table orders tipe datanya json, jadi untuk aksesnya peru looping --}}

                {{-- ini data obatnya --}}
                <td>
                    <ol>
                        @foreach ($order['medicines'] as $medicine)
                        {{-- tampilan yang ingin ditampilkan --}}
                        {{-- 1. nama obat rp.1000 (qty 2) = rp.2000 --}}
                        <li>
                            {{ $medicine['name_medicine'] }} <small> Rp. {{number_format($medicine['price'], 0, '.', '.')}} <b>(qty : {{ $medicine['qty'] }})</b></small> = Rp. {{ number_format($medicine['price_after_qty'], 0, '.', '.') }}
                        </li>
                        @endforeach
                    </ol>
                </td>
                <td>Rp. {{ number_format($order['total_price'],0,'.','.') }}</td>
                {{-- mengambil column dari relasi, $variable['namaFunctionDiModel']['namaColumnDiDBRelasi'] --}}
                <td class="d-flex"> 
                    <p>{{ $order['user']['name'] }} ( 
                    <a href="mailto:{{ $order['user']['email'] }}">{{ $order['user']['email'] }}</a> )</p>
                </td>
                @php
                    // set lokasi waktu berdasarkan penamaan dan jam WIB indonesia
                    setLocale(LC_ALL,'IND');
                @endphp
                {{-- carbon: package bawaan laravel untuk memanipulasi format tanggal/waktu --}}
                <td> {{ Carbon\Carbon::parse($order['created_at'])->formatLocalized('%d %b %y') }}</td>  
                <td>    <a href="{{ route('order.download-pdf', $order['id']) }}" class="btn btn-sm btn-primary ml-2">Cetak (.pdf)</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end mt-3">
        @if ($orders->count())
            <div style="margin-right: auto;">
                Halaman {{ $orders->currentPage() }}
            </div>
            @if ($orders->previousPageUrl())
                <a href="{{ $orders->previousPageUrl() }}" class="btn btn-sm btn-outline-secondary ml-2" style="margin-right: 5px;"">Sebelumnya</a>
            @endif
            @if ($orders->hasMorePages())
                <a href="{{ $orders->nextPageUrl() }}" class="btn btn-sm btn-outline-secondary ml-2" style="margin-right:5px">Selanjutnya</a>
            @endif
        @endif
    </div>
    
    
@endsection