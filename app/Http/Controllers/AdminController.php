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
            'pesanan' => DB::table('menu')->get()
        ];

        return view('list_menu')->with(compact('data'));
    }


}
