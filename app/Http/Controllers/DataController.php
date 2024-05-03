<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\menu;
use App\Models\pelanggan;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\carbon;

class DataController extends Controller
{
    public function index(){
        // // hitung jumlah menu
        // $data['count_menu'] = Menu::count();


        $detailTransaksi = DetailTransaksi::get();
        $totalPendapatan = $detailTransaksi->groupBy(function ($date){
            return Carbon::parse($date->tanggal)->format('m/d');
        })->map(function ($groupedItems){
            return $groupedItems->sum('subtotal');
        });


        
        //tampilkan 10 data pelanggan terakhir
        // $data['pelanggan'] = pelanggan::limit(0, 10)->sortBy('created_at','desc')->get();
        // $data = [
        //     'totalPendapatan' => $totalPendapatan->sum(),
        // ];
        // return view('data')->with($data);
        // $totalPendapatan = $totalPendapatan();



        //hitung top 5 menu penjualan
        // $menuSales = DetailTransaksi::select('menu_id', \DB::raw('SUM(jumlah) as total_sales'))
        //    ->with('menu')
        //    ->groupBy('menu_id')
        //    ->orderBy('total_sales', 'desc')
        //    ->take(5)
        //    ->get();

        //tambahkan data top 5 penjualan menu ke array data
        // $data['menuSales'] = $menuSales ;
         
        


        $data = [
            'totalPendapatan' => $totalPendapatan->sum(),
        ];
        return view('data')->with($data);
        $totalPendapatan = $totalPendapatan();


        


        //kirim data ke view
        // return view('templates.dashboard', ['data' => $data]);

        // $data = [
        //     'jumlahtransaksi' => $jumlahtransaksi->sum(),
        // ];
        // return view('data')->with($data);
        // $jumlahtransaksi = $jumlahtransaksi();
    }
    


    
}