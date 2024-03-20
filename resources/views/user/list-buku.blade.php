<x-app-layout>
    <!DOCTYPE html>
    <!-- Website - www.codingnepalweb.com -->
    <html lang="en" dir="ltr">
      <head>
        <meta charset="UTF-8" />
        <title>Responsive Sidebar Menu HTML CSS | CodingNepal</title>
        <link rel="stylesheet" href="users/style.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Boxicons CDN Link -->
        <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
      </head>
      <body >
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

        <div class=" mt-5" style="margin-left: 9%">
            <div class="container-fluid">
            <div class="row">
                @foreach($bukus as $item)
                <div class="ms-4 mb-3">
                    <div class="card h-100" style="width: 17rem; ">
                     <div>
                        @if($item->cover!='')
                        <img style="   
                      
                    margin-left: auto;
                    margin-right: auto;
                    padding: 5px 10px;
                    width: 180px; 
                    height:200px;     "
                     
                    class="card-img-top" src="{{ asset('storage/cover/'.$item->cover)}}" alt="">
                    @else  
                    <img style="         
                  
                    margin-left: auto;
                    margin-right: auto;             
                    padding: 10px 15px;
                    width: 180px; 
                    height:200px;      
                        " class="card-img-top"src="{{ asset('images/no_image.png')}}" alt="">
                        @endif
                     </div>
                     
                        <div class="card-body">
                          <h5 class="card-title">{{$item->judul}}</h5>
                          <div>
                            <a href="detailbuku/{{$item->slug}}" class="btn btn-primary">Detail</a>
                          </div>
                        </div>
                      </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

  
  
  
      
        <script src="users/script.js"></script>
      </body>
    </html>
    
  </x-app-layout>
  