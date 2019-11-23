@extends('layouts.payment')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Checkout</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('checkout/submit') }}">
                        @csrf
                        <div class="form-group">
                            <label>Nama :</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama">
                        </div>
                        <div class="form-group">
                            <label>No. Handphone :</label>
                            <input type="number" class="form-control" placeholder="Masukkan No. Handphone" name="nomor_handphone">
                        </div>
                        <div class="form-group">
                            <label>Email :</label>
                            <input type="email" class="form-control" placeholder="Masukkan Email" name="email">
                        </div>
                        <div class="form-group">
                            <label>Waktu Pengambilan Makanan :</label>
                            <input type="time" class="form-control" name="jam_makanan_diambil">
                        </div>
                        <div class="form-group">
                            <label>Pembayaran :</label>
                            <select class="form-control" name="pembayaran">
                                <option value="Cash">Cash (Pembayaran saat pengambilan makanan)</option>
                                <option value="OVO">OVO</option>
                            </select>
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
                        <div align="center">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ovoModal">
                                Barcode OVO
                            </button>
                            <button type="submit" class="btn btn-xs btn-success">Bayar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')          
    <div class="modal fade" id="ovoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Barcode OVO</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary">
                    <a>Harap bukti transaksi ditunjukkan saat melakukan pengambilan makanan !</a>
                </div>
                <img  style="width:100%;height:100%;" src="https://www.grab.com/id/wp-content/uploads/sites/9/2018/08/Tent-Card-A5-OVO_GRAB-QR-contoh_tampilan.jpg">
            </div>
          </div>
        </div>
    </div>
@endsection