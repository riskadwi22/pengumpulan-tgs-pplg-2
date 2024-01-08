<?php

namespace App\Exports;

use App\Models\Order;
use Carbon\Carbon;
use App\Models\Medicine;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class OrderExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::with('user')->get();
    }


    //menemtukan nama nama column di excelnya
    public function headings() : array 
    {
        return [
            "Nama Pembeli", "Pesanan", "Total Harga (+ppn)", "Kasir", "Tanggal"
        ];
    }


    //data dari collection (pengambilan dari db) yang akan dimunculkan ke excel 
    public function map($item) : array
    {
        $pesanan = "";
        foreach ($item['medicines'] as $medicine) {
            $pesanan .="( " . $medicine ['name_medicine'] . " : qty " . $medicine['qty']. "" .number_format($medicine['price_after_qty'], 0, '.', ',') . " ),";
        }
        $totalAfterPPN = $item['total_price'] + ($item['total_price'] * 0.1);

        return [
            $item['name_customer'],
            $pesanan,
            "Rp. " . number_format($totalAfterPPN, 0,'.', ','),
            $item['user']['name'],
            Carbon::parse($item['created_at'])->format("d-m-Y H:i:s")
        ];
    }
}
