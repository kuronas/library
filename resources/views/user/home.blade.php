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
          <i class='bx bxs-book icon'></i>
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
      <div class="color-bg">
      <section class="header"> 
        <div class="mt-3">
        @if (session('status'))
    <div id="statusAlert" class="alert alert-success">
        {{ session('status') }}
    </div>
    
<script>
  setTimeout(function() {
      var statusAlert = document.getElementById('statusAlert');
      if (statusAlert) {
          statusAlert.remove();
      }
  }, 1000); // Remove the alert after 3 seconds (3000 milliseconds)
</script>
@endif

        <div class="link">
          <div class="content">
          <h2>Make Happines</h2>
          <h2 style="color: coral">By Reading Books</h2>
          <p>Reading books transports us to a world we don't know<br> maybe we will gain new knowledge or get a new story
          </p>
        </div>
        <br>
          <a href="#" class="hire">Rent Now</a>
        </div>
      </section>  

      <section class="buku">
        <div class="judul" style="text-align:center">
        <h1 class="mt-5" >List Buku </h1>
      </div>
        <div class="mt-5" style="margin-left: 9%">
          <div class="container-fluid">
            <div class="row">
              @php $count = 0; @endphp
              @foreach($bukus as $item)
              @php $count++; @endphp
              <div class="ms-4 mb-3">
                <div class="card h-100" style="width: 17rem; ">
                  <div >
                    @if($item->cover!='')
                    <img style="margin-left: auto; margin-right: auto; padding: 5px 10px; width: 180px; height:200px; " class="card-img-top" src="{{ asset('public/storage/app/public/cover/'.$item->cover)}}" alt="">
                    @else  
                    <img style="margin-left: auto; margin-right: auto; padding: 10px 15px; width: 180px; height:200px;" class="card-img-top"src="{{ asset('images/no_image.png')}}" alt="">
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
              @if($count == 4)
              @break
              @endif
              @endforeach
            </div>
            @if(count($bukus) > 4)
            <div class="text-center mt-3">
              <a href="list-buku" class="btn btn-primary">More</a>
            </div>
            @endif
          </div>
        </div>
      </section>
    
    <section class="peminjaman bg-white">
     
    <div class="page-section">
      <div class="container">
        <h1 class="heading"></h1>

        <form class="main-form mb-5" action="/peminjaman" method="POST">

        @csrf

          <div class="row mt-5 ">
            
           
            <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
              <select name="buku_id" id="departement" class="custom-select input-box">
                <option value="" ></option>
                @foreach($bukus as $item)
                      <option value="{{$item->id}}">{{$item->judul}}</option>
                      @endforeach
             
              </select>
            </div>
          
  
          <button type="submit" class="btn btn-primary">Submit Request</button>
        </form>
      </div>
    </div> <!-- .page-section -->

  </section>
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
