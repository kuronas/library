<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Data Buku</h1>

<table id="customers">
    <thead>
        <tr>
          <th>No.</th>
          <th>nama</th>
          <th>judul</th>
          <th>tanggal pinjam</th>
          <th>tanggal pengembalian</th>
          <th>Status </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $item)
        <tr>
          <td>{{ $loop->iteration}}</td>
          <td>{{ $item->user->name}}</td>
          <td>{{ $item->buku->judul}}</td>
          <td>{{ $item->tanggal_peminjaman}}</td>
          <td>{{ $item->tanggal_pengembalian}}</td>
          <td  @if ($item->status == 'sedang dipinjam') style="background-color: green; color:white;" @endif>{{ $item->status}}</td>
        </tr>
        @endforeach
        </tr>
      </tbody>
</table>

</body>
</html>


