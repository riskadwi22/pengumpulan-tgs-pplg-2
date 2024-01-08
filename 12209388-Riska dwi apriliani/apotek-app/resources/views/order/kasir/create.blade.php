@extends('layouts.template')

@section('content')
<form action="{{route('order.store')}}" class="card p-4 mt-5" method="POST">
    @csrf
    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        
    </ul>
 @endif
@if (Session::get('failed'))
    <div class="alert alert-danger">{{ Session::get('failed') }}</div>
@endif
    <div class="mb-3"> 
        <div class="d-flex align-items-center">
        <label for="name_customer" class="form-label" style="width: 16%">Penanggung Jawab : </label>
        <div style="width: 84%"><b>{{ Auth::user()->name }}</b></div>
    </div>
    <div class="mb-3 d-flex align-items-center">
        <label for="name_customer" class="form-label" style="width: 12%">Nama Pembeli : </label>
        <input type="text" name="name_customer" id="name_customer" class="form-control" style="width: 88%">
    </div>
    <div class="mb-3 d-flex align-items-center">
        <label for="medicines" class="form-label" style="width: 12%">Obat : </label>
        {{-- nama dengan  --}}
        <select name="medicines[]" id="medicines" class="form-control" style="width: 88%">
            <option selected hidden disabled>Pesanan 1</option>
            @foreach ($medicines as $medicine)
            <option value="{{ $medicine['id'] }}">{{ $medicine['name'] }}</option>
            @endforeach
        </select>
    </div>

        {{-- karena akan ada 15 yang menampilkan select ketika di klik, maka sediakan tempat penyimpanan element yang akan dihasilkan dr 15 tsb --}}

        <div id="wrap-select" class="mb-3"></div>
        <p class="text-primary" style="margin-left: 12%; cursor:pointer;" onclick="addSelect()">+ Tambah Pesanan</p>
    </div>
    <button type="submit" class="btn btn-primary">Kirim</button>
</form>
@endsection

@push('script')
    <script>
        let no = 2;
        function addSelect(){
            let el = `<div class="d-flex align-items-center mb-3">
                <label for="medicines" class="form-label" style="width: 12%"></label>
                <select name="medicines[]" id="medicines" class="form-control" style="width: 88%">
                    <option selected hidden disabled>Pesanan ${no}</option>
                    @foreach ($medicines as $medicine)
                    <option value="{{$medicine['id']}}">{{$medicine['name']}}</option>
                    @endforeach
               </select>
               </div>`;     
               $("#wrap-select").append(el);

               no++;
        }
    </script>
@endpush