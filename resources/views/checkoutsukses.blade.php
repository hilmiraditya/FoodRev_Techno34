@extends('layouts.payment')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Checkout</div>
                <div class="card-body">
                    <div align="center">
                        <br>
                        <img src="https://cdn3.iconfinder.com/data/icons/social-messaging-ui-color-line/254000/172-512.png" style="width:25%;height:25%;">
                        <br>
                        <br>

                        <a>Transaksi Berhasil, Silahkan Cek Email Anda</a>
                        <br>
                        <br>
                        <a class="btn btn-success" href="{{url('/')}}">Kembali Ke Menu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection