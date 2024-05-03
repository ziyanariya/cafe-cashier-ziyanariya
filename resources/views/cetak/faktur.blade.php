<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Cafe yaya</h2>
    <h5>Jl. Seoul No. 32, 65464</h5>
    <hr>
        <h5>No.Faktur : {{ $data->id }}</h5>
        <h5>{{ $data->tanggal }}</h5>
        <table border="0">
            <thead>
                <tr>
                    <td>Qty</td>
                    <td>Item</td>
                    <td>Harga</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data->detailTransaksi as $item)
             <tr>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->menu->nama_menu }}</td>
                <td>{{ number_format($item->menu->harga, 0,",",".") }}</td>
                <td>{{ number_format($item->subtotal, 0,",",".") }}</td>
             </tr>
             @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Total</td>
                    <td>{{ number_format($data->total_harga, 0,",",".") }}</td>

                </tr>
            </tfoot>
        </table>
    </body>
</html>