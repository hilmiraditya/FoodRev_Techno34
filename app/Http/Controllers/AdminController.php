<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function lihat_list_menu()
    {
        $data = [
            'menu' => DB::table('menu')->get()
        ];

        return view('list_menu')->with(compact('data'));
    }
    public function lihat_pesanan()
    {
        $getKeranjang = DB::table('keranjang')
                        ->get();
            
        foreach($getKeranjang as $gt){
            $gt->menu_nama = DB::table('menu')
                            ->where('id', $gt->menu_id)
                            ->first()
                            ->nama;
        }
        $data = [
            'pesanan'   => DB::table('checkout')->get(),
            'keranjang' => $getKeranjang   
        ];
        // dd($data);
        return view('pesanan')->with(compact('data'));
    }

}
