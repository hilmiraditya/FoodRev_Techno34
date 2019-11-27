@if($data['keranjang']->count() != 0)
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Nama Event</th>
            <th scope="col">Jumlah Tiket</th>
            <th scope="col">Harga</th>
            <th scope="col">Pilihan</th>
        </tr>
        </thead>
        <tbody>
            @foreach($data['keranjang'] as $keranjang)
                <tr>
                    <td>{{ $keranjang->menu_nama }}</td>
                    <td>{{ $keranjang->jumlah }}</td>
                    <td>{{ "Rp " . number_format($keranjang->harga_total,2,',','.') }}</td>
                    <td><a style="color: white;" class="btn btn-sm btn-danger" onclick="hapusItem('{{$keranjang->id}}')">Hapus</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div align="center">
        <a href="{{ url('/checkout') }}" style="color:white;" class="btn btn-success">
            Checkout
        </a>
    </div>  
@else
    <div class="alert alert-danger">Keranjang Pesanan Kosong !</div>
@endif