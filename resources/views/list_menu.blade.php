@extends('layouts.app')  

@section('content')
<div class="container">
        <div class="row">
            @foreach($data['pesanan'] as $pesanan)
                <span class="col-md-3" align="center" style="margin-bottom:18px;">
                    <div class="card">
                        <div class="card-header">
                            {{$pesanan->nama}}
                        </div>
                        <div class="card-body" style="padding-bottom:25px;">
                            <div>
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS2v4_fIAZ4n28cHA5--1u4xCMkW4TNba6FU26g91IgtrXzZmvr" style="height:200px;width:200px;">
                            </div>
                            <br>
                            <div class="badge badge-pill badge-success">{{ $pesanan->kategori }}</div>
                            <br>
                            <b>{{ "Rp " . number_format($pesanan->harga,2,',','.') }}</b>
                            <br>
                            <br>
                            <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#menu{{ $pesanan->id }}">
                                Detil
                            </button>
                        </div>
                    </div>
                </span>
            @endforeach
        </div>
</div>
@endsection

@section('modal')
    @foreach($data['pesanan'] as $pesanan)
        <div class="modal fade" id="menu{{ $pesanan->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detil Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS2v4_fIAZ4n28cHA5--1u4xCMkW4TNba6FU26g91IgtrXzZmvr" style="height:100%;width:100%;">
                        </div>
                        <div class="col-md-8">
                            <div class="badge badge-pill badge-success">{{ $pesanan->kategori }}</div>
                            <h3>{{ $pesanan->nama }}</h3>
                            <h5>{{ "Rp " . number_format($pesanan->harga,2,',','.') }}</h5>
                            <a>{{ $pesanan->keterangan }}</a>
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