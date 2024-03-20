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
          <th>Buku</th>             
          <th>Penulis</th>
          <th>Kategori</th>
          <th>Penerbit</th>
          <th>Tahun Terbit</th>
 
        </tr>
      </thead>
      <tbody>
         @foreach ($data as $item)
        <tr>
          <td >
            {{ $loop->iteration}}
          </td>
          <td >
            {{ $item->judul}}
          </td>
       
          <td >
            {{ $item->penulis}}
          </td>
            <td >
              @foreach($item->kategoris as $kategori)
              {{$kategori->name}} <br>
              @endforeach
            </td>
      <td >
            {{ $item->penerbit}}
          </td> <td >
            {{ $item->tahunterbit}}
          </td>
      
        </tr>
        @endforeach
      </tbody>
</table>

</body>
</html>


