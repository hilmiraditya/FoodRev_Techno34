<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Berikut ini adalah detil pesanan anda : </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="alert alert-success">
                                        <p>Keterangan Tambahan :</p>
                                        <ul>
                                            <li>Konfirmasi pesanan akan dikirim via SMS (08781234567).</li>
                                            <li>Apabila terdapat perubahan dalam pemesanan, silahkan hubungi customer service 08781234567.</li>
                                            <li>Perubahan yang dapat dilakukan dalam pemesanan hanyalah perubahan waktu pengambilan makanan, menu yang dipesan tidak dapat diubah.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nama :</label>
                                    <input type="text" class="form-control" value="{{ $data['nama'] }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>No. Handphone :</label>
                                    <input type="number" class="form-control" value="{{ $data['nomor_handphone'] }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Email :</label>
                                    <input type="email" class="form-control" value="{{ $data['email'] }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Waktu Pengambilan Makanan :</label>
                                    <input type="time" class="form-control" value="{{ $data['jam_makanan_diambil'] }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Pembayaran :</label>
                                    <input class="form-control" value="{{ $data['pembayaran'] }}" disabled>
                                </div>
                                <br>
                                <label>Menu Yang Dipesan :</label>
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Nama Menu</th>
                                        <th scope="col">Harga Satuan</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Harga Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data['pesanan'] as $pesanan)
                                            <tr>
                                                <td>{{ $pesanan->menu_nama }}</td>
                                                <td>{{ "Rp " . number_format($pesanan->harga_satuan,2,',','.') }}</td>
                                                <td>{{ $pesanan->jumlah }}</td>
                                                <td>{{ "Rp " . number_format($pesanan->harga_total,2,',','.') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <div align="right">
                                    <label>Total : <b>{{ "Rp " . number_format($data['total'],2,',','.') }}</b></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
