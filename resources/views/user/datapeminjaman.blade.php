<x-app-layout>
    <!DOCTYPE html>
    <!-- Website - www.codingnepalweb.com -->
    <html lang="en" dir="ltr">
      <head>
        <meta charset="UTF-8" />
        <title>Responsive Sidebar Menu HTML CSS | CodingNepal</title>
        <link rel="stylesheet" href="users/style.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <!-- Boxicons CDN Link -->
        <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      </head>
      <body>
        <div class="sidebar">
          <div class="logo-details">
            <i class="bx bxl-c-plus-plus icon"></i>
            <div class="logo_name">Library</div>
            <i class="bx bx-menu" id="btn"></i>
          </div>
          <ul class="nav-list">
         
            <li>
              <a href="home">
                <i class="bx bx-grid-alt"></i>
                <span class="links_name">Home</span>
              </a>
              <span class="tooltip">Home</span>
            </li>
            <li>
              <a href="koleksi">
                <i class="bx bx-user"></i>
                <span class="links_name">Koleksi Pribadi</span>
              </a>
              <span class="tooltip">Koleksi Pribadi</span>
            </li>
            <li>
              <a href="datapeminjaman">
                <i class="bx bx-pie-chart-alt-2"></i>
                <span class="links_name">Data Peminjaman</span>
              </a>
              <span class="tooltip">Data Peminjaman</span>
            </li>
            <li>
            <a href="list-buku">
              <i class="bx bx-pie-chart-alt-2"></i>
              <span class="links_name">List Buku</span>
            </a>
            <span class="tooltip">List Buku</span>
          </li>
            
          
          </ul>
        </div>
 
        <div align="center">
        <table class="table" style="width: 70%">
            <thead>
              <tr>
                <th>No.</th>
                <th>judul buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Status </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($peminjaman as $item)
              <tr align="center" @if ($item->status == 'Sedang Di Pinjam') style="color: green; " @endif> 
                <td style="padding: 10px">
                  {{ $loop->iteration}}
                </td>
                 <td style="padding: 10px">
                    {{ $item->buku->judul}}
                  </td>
                 <td style="padding: 10px">
                  {{ $item->tanggal_peminjaman}}
                </td>
                 <td style="padding: 10px">
                    {{ $item->tanggal_pengembalian}}
                  </td>
                   <td style="padding: 10px "  >{{ $item->status}}</td>
                   
                 
                @endforeach
              </tr>
            </tbody>
          </table>
        </div>
      

        <script src="users/script.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script >
          $(document).ready(function() {
              $('.input-box').select2();
          });</script>
      </body>
    </html>
    
  </x-app-layout>
  