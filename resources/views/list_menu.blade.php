@extends('layouts.app')  

@section('content')
@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
<div class="container">
        <div class="row">
            @foreach($data['menu'] as $menu)
                <span class="col-md-3" align="center" style="margin-bottom:18px;">
                    <div class="card">
                        <div class="card-header">
                            {{$menu->nama}}
                        </div>
                        <div class="card-body" style="padding-bottom:25px;">
                            <div>
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS2v4_fIAZ4n28cHA5--1u4xCMkW4TNba6FU26g91IgtrXzZmvr" style="height:200px;width:200px;">
                            </div>
                            <br>
                            <div class="badge badge-pill badge-success">{{ $menu->kategori }}</div>
                            <br>
                            <b>{{ "Rp " . number_format($menu->harga,2,',','.') }}</b>
                            <br>
                            <br>
                            <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#menu{{ $menu->id }}">
                                Detil
                            </button>
                             <a class="btn btn-xs btn-danger" href="delete/{{$menu->id}}">
                                Hapus
                            </a>
                        </div>
                    </div>
                </span>
            @endforeach
        </div>
</div>
@endsection

@section('modal')
    @foreach($data['menu'] as $menu)
        <div class="modal fade" id="menu{{ $menu->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <div class="badge badge-pill badge-success">{{ $menu->kategori }}</div>
                            <h3>{{ $menu->nama }}</h3>
                            <h5>{{ "Rp " . number_format($menu->harga,2,',','.') }}</h5>
                            <a>{{ $menu->keterangan }}</a>
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