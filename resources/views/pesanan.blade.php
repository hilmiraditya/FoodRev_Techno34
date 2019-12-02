@extends('layouts.app')  

@section('content')
<div class="container">
    <div class="row">
        <span class="col-md-12" align="center" style="margin-bottom:18px;">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Nomor HP</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($data['pesanan'] as $pesanan)
                        <tr>
                            <td>{{$pesanan->nama}}</td>
                            <td>{{ $pesanan->jam_makanan_diambil }}</td>
                            <td>{{ $pesanan->nomor_handphone}}</td>
                            <td><button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#pesanan{{ $pesanan->id }}">Detil</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>  
        </span>
    </div>
</div>
@endsection

@section('modal')
    @foreach($data['pesanan'] as $pesanan)
        <div class="modal fade" id="pesanan{{ $pesanan->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $pesanan->nama }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-12">
                            <div class="badge badge-pill badge-success">{{ $pesanan->jam_makanan_diambil }}</div>
                            <h3>{{ $pesanan->nomor_handphone }}</h3>
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama Menu</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">total Harga</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['keranjang'] as $detil)
                                    @if($detil->checkout_id == $pesanan->id)
                                        <tr>
                                            <td>{{ $detil->menu_nama }}</td>
                                            <td>{{ $detil->jumlah }}</td>
                                            <td>{{ "Rp " . number_format($detil->harga_satuan,2,',','.') }}</td>
                                            <td>{{ "Rp " . number_format($detil->harga_total,2,',','.') }}</td>
                                        </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
            </div>
        </div>
    @endforeach
@endsection