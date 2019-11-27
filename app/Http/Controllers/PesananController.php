<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;


class PesananController extends Controller
{
    public function order_etalase()
    {
        $getCookies = Cookie::get('user_token_keranjang');

        $data = [
            'pesanan' => DB::table('menu')->get()
        ];

        if($getCookies == null){
            $token = str_random(10);
            DB::table('token')->insert([
                'token' => $token
            ]);

            Cookie::queue(Cookie::make('user_token_keranjang', $token, 60));
            

            return redirect('/pesan');
        }   

        else{
            return view('pesan')
                ->with(compact('data'));
        }
    }
    
    public function tambah_keranjang($id)
    {
        $cekCookies = DB::table('token')
                        ->where('token', Cookie::get('user_token_keranjang'))
                        ->first();
        
        if($cekCookies == null){
            return 'akses ilegal';
        }

        else{
            $getMenu = DB::table('menu')
                        ->where('id', $id)
                        ->first();

            $cekKeranjang = DB::table('keranjang')
                            ->where('token_id', $cekCookies->id)
                            ->where('menu_id', $id)
                            ->first();

            if($cekKeranjang != null){
                DB::table('keranjang')
                    ->where('id', $cekKeranjang->id)
                    ->update([
                        'jumlah' => $cekKeranjang->jumlah + 1,
                        'harga_total' => $cekKeranjang->harga_total + $getMenu->harga
                    ]);
    
                return 'ok';
            }

            else{
                DB::table('keranjang')->insert([
                    'token_id' => $cekCookies->id,
                    'menu_id' => $id,
                    'jumlah' => 1,
                    'harga_satuan' => $getMenu->harga,
                    'harga_total' => $getMenu->harga
                ]);

                return 'ok';
            }
        }
    }

    public function getKeranjang($token)
    {
        $getToken = DB::table('token')->where('token', $token)->first();
        if($getToken == null){
            return 'akses ilegal';
        }
        else{
            $getKeranjang = DB::table('keranjang')
                        ->where('token_id', $getToken->id)
                        ->get();
            
            foreach($getKeranjang as $gt){
                $gt->menu_nama = DB::table('menu')
                                ->where('id', $gt->menu_id)
                                ->first()
                                ->nama;
            }

            $data = [
                'keranjang' => $getKeranjang
            ];

            return view('list_keranjang')->with(compact('data'))->render();
        }
    }

    public function hapusKeranjang($id)
    {
        $getCookies = Cookie::get('user_token_keranjang');
        
        $getTokenID = DB::table('token')
                ->where('token', $getCookies)
                ->first()
                ->id;
        
        DB::table('keranjang')
            ->where('token_id', $getTokenID)
            ->where('id', $id)
            ->delete();

        return $getCookies;
    }

    public function checkout()
    {
        $getCookies = Cookie::get('user_token_keranjang');
        
        $getToken = DB::table('token')
                ->where('token', $getCookies)
                ->first();

        $getKeranjang = DB::table('keranjang')
                    ->where('token_id', $getToken->id)
                    ->get();
        
        $total = 0;

        foreach($getKeranjang as $gt){
            $gt->menu_nama = DB::table('menu')
                        ->where('id', $gt->menu_id)
                        ->first()
                        ->nama;

            $gt->tanggal = DB::table('menu')
                        ->where('id', $gt->menu_id)
                        ->first()
                        ->tanggal;
            $total = $total + $gt->harga_total;
        }

        $data = [
            'pesanan' => $getKeranjang,
            'total' => $total
        ];

        return view('checkout')->with(compact('data'));
    }

    public function checkoutSubmit(Request $request)
    {
        $kode = uniqid();
        $getCookies = Cookie::get('user_token_keranjang');
        
        $getTokenID = DB::table('token')
                    ->where('token', $getCookies)
                    ->first()
                    ->id;

        DB::table('checkout')->insert([
            'nama' => $request->nama,
            'email' => $request->email,
            'kodebooking' => $kode,
            'nomor_handphone' => $request->nomor_handphone,
            'pembayaran' => $request->pembayaran
        ]);

        $getCheckoutID = DB::table('checkout')
                        ->where('nama', $request->nama)
                        ->where('email', $request->email)
                        ->where('nomor_handphone', $request->nomor_handphone)
                        ->first();

        DB::table('keranjang')->where('token_id', $getTokenID)->update([
            'isCheckout' => 1,
            'checkout_id' => $getCheckoutID->id
        ]);

        Cookie::queue(Cookie::forget('user_token_keranjang'));

        DB::table('token')
            ->where('token', $getCookies)
            ->delete();

        $getKeranjang = DB::table('keranjang')
            ->where('token_id', $getTokenID)
            ->get();

        $total = 0;

        foreach($getKeranjang as $gt)
        {
            $gt->menu_nama = DB::table('menu')
                        ->where('id', $gt->menu_id)
                        ->first()
                        ->nama;
            $total = $total + $gt->harga_total;
        }
    
        $data = array(
            'nama' => $request->nama,
            'email' => $request->email,
            'kodebooking' => $kode,
            'nomor_handphone' => $request->nomor_handphone,
            'pembayaran' => $request->pembayaran,
            'pesanan' => $getKeranjang,
            'total' => $total,
            'tanggal_pemesanan' => Carbon::today()->toDateString()
        );

        Mail::send('invoice2', compact('data'), function($message)use($data)
        {
            $message->to($data['email'], $data['nama']);
            $message->subject('Invoice Pemesanan');
            $message->from('raditya113@gmail.com', 'Admin Event ITS');
        });

        return redirect('/checkout/success');
    }
}
