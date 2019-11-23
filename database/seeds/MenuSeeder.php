<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert([
            'nama' => 'Ayam Saus Mentega', 
            'keterangan' => 'Ayam goreng dengan saus mentega, paket dilengkapi nasi putih dan es teh manis',
            'harga' => 18000,
            'kategori' => 'Makanan'
        ]);
        DB::table('menu')->insert([
            'nama' => 'Ayam Saus Inggris', 
            'keterangan' => 'Ayam goreng dengan saus inggris, paket dilengkapi nasi putih dan es teh manis',
            'harga' => 18000,
            'kategori' => 'Makanan'
        ]);
        DB::table('menu')->insert([
            'nama' => 'Ayam Goreng Kremes', 
            'keterangan' => 'Ayam goreng dengan kremes yang renyah dan gurih, paket dilengkapi nasi putih dan es teh manis',
            'harga' => 18000,
            'kategori' => 'Makanan'
        ]);
        DB::table('menu')->insert([
            'nama' => 'Ayam Saus Tiram', 
            'keterangan' => 'Ayam goreng dengan saus tiram dan gurih, paket dilengkapi nasi putih dan es teh manis',
            'harga' => 18000,
            'kategori' => 'Makanan'
        ]);

        DB::table('menu')->insert([
            'nama' => 'Gurame Saus Mentega', 
            'keterangan' => 'Gurame goreng dengan saus mentega, paket dilengkapi nasi putih dan es teh manis',
            'harga' => 18000,
            'kategori' => 'Makanan'
        ]);
        DB::table('menu')->insert([
            'nama' => 'Gurame Saus Inggris', 
            'keterangan' => 'Gurame goreng dengan saus inggris, paket dilengkapi nasi putih dan es teh manis',
            'harga' => 18000,
            'kategori' => 'Makanan'
        ]);
        DB::table('menu')->insert([
            'nama' => 'Gurame Goreng Kremes', 
            'keterangan' => 'Gurame goreng dengan kremes yang renyah dan gurih, paket dilengkapi nasi putih dan es teh manis',
            'harga' => 18000,
            'kategori' => 'Makanan'
        ]);
        DB::table('menu')->insert([
            'nama' => 'Gurame Saus Tiram', 
            'keterangan' => 'Gurame goreng dengan saus tiram dan gurih, paket dilengkapi nasi putih dan es teh manis',
            'harga' => 18000,
            'kategori' => 'Makanan'
        ]);
        DB::table('menu')->insert([
            'nama' => 'Es Teh Manis', 
            'keterangan' => 'Minuman Segar',
            'harga' => 5000,
            'kategori' => 'Minuman'
        ]);
        DB::table('menu')->insert([
            'nama' => 'Es Teh Tawar', 
            'keterangan' => 'Minuman Segar',
            'harga' => 3000,
            'kategori' => 'Minuman'
        ]);
        DB::table('menu')->insert([
            'nama' => 'Teh Tawar', 
            'keterangan' => 'Minuman Segar',
            'harga' => 2000,
            'kategori' => 'Minuman'
        ]);
    }
}
