{{-- untuk mengimpor template --}}
@extends('layouts.template')

{{-- untuk mengisi yield --}}
@section('content')
    @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::get('deleted'))
        <div class="alert alert-warning">{{ Session::get('deleted') }}</div>
    @endif
    <table class="table table-striped table-bordered table-hovered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Tipe</th>
                <th scope="col">Harga</th>
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
                    <td>{{ $item['type'] }}</td>
                    <td>{{ $item['price'] }}</td>
                    <td>{{ $item['stock'] }}</td>
                    <td class="d-flex">
                        <a href="{{ route('medicine.edit', $item['id']) }}" class="btn btn-success">Edit</a>
                        <form action="{{ route('medicine.delete', $item['id']) }}" method="post">
                            @csrf
                            {{-- method ::DELETE tidak bisa digunakan dalam a href, harus melalui form action --}}
                            {{-- menimpa/mengubah method='post' agar menjadi  method='delete' sesuai dengan method ROUTE(:: delete) --}}
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
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
@endsection