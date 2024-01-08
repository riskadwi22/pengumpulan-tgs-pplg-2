<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // menampilkan banyak data
    public function index()
    {
        //proses ambil data
        $medicines = Medicine::orderBy('name', 'ASC')->simplePaginate(5);
        //manggil html yg ada di folder resources/views/medicine/index.blade.php
        return view('medicine.index', compact('medicines'));
    }

    public function create()
    {
        return view('medicine.create');
    }

    // FUNGSI Request $request untuk mengambil data yang diinput user
    public function store(Request $request)
    {
        // validasi 'name_input' => 'validasi1|validasi2
        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);
        // simpan data ke db : 'name_column' => $request->name_input
        Medicine::create([
            'name' => $request->name,
            //pertama disesuaikan dengan inout, kedua sesuai  model
            'type' => $request->type,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        // abis simpen, arahin ke halaman nama
        return redirect()->back()->with('success', 'Berhasil Menambahkan data obat!');
    }

    public function edit($id)
    {
        $medicine = Medicine::find($id);
        return view('medicine.edit', compact('medicine'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'price' => 'required|numeric',
        ]);
        // simpan data ke db : 'name_column' => $request->name_input
        Medicine::where('id', $id)->update
        ([
                'name' => $request->name,
                //pertama disesuaikan dengan inout, kedua sesuai  model
                'type' => $request->type,
                'price' => $request->price,
            ]);

        return redirect()->route("medicine.data")->with('success', 'Berhasil mengubah data obat!');
    }

    public function destroy($id)
    {
        Medicine::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data obat!');
    }

    public function stockData()
    {
        $medicines = Medicine::orderBy('stock', 'ASC')->simplePaginate(5);
        return view('medicine.stock', compact('medicines'));
    }

    public function show($id)
    {
        // mengembalikan bentuk json dikirim data yang diambil dengan response status code 200 
        // response status code api :
        // 200 -> success/ok
        // 400 an -> error kode/validasi input user
        // 419 -> error token csrf
        // 500 an -> error server hosting
        $medicine = Medicine::find($id);
        return response()->json($medicine, 200);
    }

    public function updateStock(Request $request, $id)
    {
        // validasi input
        $request->validate([
            'stock' => 'required|numeric',
        ], [
            'stock.required' => 'Input stok harus diisi!',
        ]);
        // ambil dat asblm update, untuk dibandingkan
        $medicineBefore = Medicine::where('id', $id)->first();
        if ($request->stock <= $medicineBefore['stock']) {
            // jika stock yang diinput <= stock sebelumnya, kirim format error
            return response()->json(['message' => 'Stock tidak boleh kurang/sama dengan stock sebelumnya!'], 400);
        }
        $medicineBefore->update(['stock' => $request->stock]);
        return response()->json('berhasil', 200);
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}
// menambahkan atau mengubah data menggunakan parameter request
// mengambil isian route path dinamis, di dalam controller fonctionnya harus ada $id (sesuai path dinamis)