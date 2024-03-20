<x-app-layout>
    <!DOCTYPE html>
    <!-- Website - www.codingnepalweb.com -->
    <html lang="en" dir="ltr">
      <head>
        <meta charset="UTF-8" />
        <title>Responsive Sidebar Menu HTML CSS | CodingNepal</title>
        <link rel="stylesheet" href="/users/style.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Boxicons CDN Link -->
        <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
              <a href="/home">
                <i class="bx bx-grid-alt"></i>
                <span class="links_name">Home</span>
              </a>
              <span class="tooltip">Home</span>
            </li>
            <li>
              <a href="/koleksi">
                <i class="bx bx-user"></i>
                <span class="links_name">Koleksi Pribadi</span>
              </a>
              <span class="tooltip">Koleksi Pribadi</span>
            </li>
            <li>
              <a href="/datapeminjaman">
                <i class="bx bx-pie-chart-alt-2"></i>
                <span class="links_name">Data Peminjaman</span>
              </a>
              <span class="tooltip">Data Peminjaman</span>
            </li>
            <li>
            <a href="/list-buku">
              <i class="bx bx-pie-chart-alt-2"></i>
              <span class="links_name">List Buku</span>
            </a>
            <span class="tooltip">List Buku</span>
          </li>
            
          </ul>
        </div>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <section class="about" id="about">
      @if($buku->cover!='')
      <img src="{{ asset('storage/cover/'.$buku->cover)}}" alt="">
      @else 
      <img src="{{ asset('images/no_image.png')}}" alt="">
      @endif
      <div class="isi">
          <h1>{{$buku->judul}}</h1>
          <p>{{$buku->judul}}</p>
          <p>Author:{{$buku->penulis}}</p>
         
          <ul>
              @foreach ($buku->kategoris as $kategori)
              <li>{{$kategori->name}}</li>
              @endforeach
          </ul>
          {{-- <form class="main-form mb-5" action="/peminjaman" method="POST" id="koleksiForm">
              @csrf
              <input type="hidden" name="buku_id" id="buku_id" class="form-control" value="{{$buku->id}}" placeholder="Nama Kategori">
              <button type="submit" class="btn btn-primary" id="favoriteButton" data-book-id="{{$buku->id}}">
                  <i class="fa fa-heart"></i>
                  @if (in_array($buku->id, $koleksipribadi))
                  Favorite
                  @else
                  Add to favorite
                  @endif
              </button>
            
          </form> --}}
          <form class="main-form mb-5" action="/peminjaman" method="POST">
            <input type="hidden" name="buku_id" id="buku_id" class="form-control" value="{{$buku->id}}" placeholder="Nama Kategori">
            @csrf
              
              <button type="submit" class="btn btn-primary">Pinjam Buku</button>
            </form>
      </div>
    
  </section>
 
<div class="container">
  <div class="row">
    <div class="col mt-4">
      <form class="py-2 px-4" action="/ulasan" style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
        @csrf
        <div class="form-group row">
          <input type="hidden" name="buku_id" id="buku_id" class="form-control" value="{{$buku->id}}" placeholder="Nama Kategori">
          <div class="col">
            <div class="rate">
              <input type="radio" id="star1" class="rate" name="rating" value="5" />
              <label for="star1" title="text">1 star</label>
              <input type="radio" id="star2" class="rate" name="rating" value="4" />
              <label for="star2" title="text">2 stars</label>
              <input type="radio" id="star3" class="rate" name="rating" value="3" />
              <label for="star3" title="text">3 stars</label>
              <input type="radio" id="star4" class="rate" name="rating" value="2" />
              <label for="star4" title="text">4 stars</label>
              <input type="radio" id="star5" class="rate" name="rating" value="1" />
              <label for="star5" title="text">5 stars</label>
            </div>
          </div>
        </div>
        <div class="form-group row mt-4">
          <div class="col">
            <textarea class="form-control" name="ulasan" rows="5" placeholder="Comment" maxlength="200"></textarea>
          </div>
        </div>
        <div class="mt-3 text-right">
          <button class="btn btn-sm py-2 px-3 btn-info">Submit</button>
        </div>
      </form>
      @foreach($ulasan as $value)
      @if($value->buku_id == $buku->id)
        @if(!empty($value->rating))
          <div class="container">
              <div class="row">
                 <div class="col mt-4">
                
                       <div class="form-group row">
                          <input type="hidden" name="buku_id" value="{{ $value->id }}">
                          <div class="col">
                         
                            <p>   <i class="bx bx-user" style="margin-right: 3px"></i>{{$value->user->name}}</p>
                             <div class="rated">
                          
                              @for($i=1; $i<=$value->rating; $i++)
                                <input type="radio" id="star{{$i}}" class="rate" name="rating" value="5"/> 
                                <label class="star-rating-complete" title="text">{{$i}} stars</label>
                              @endfor
                              </div>
                          </div>
                       </div>
                       <div class="form-group row mt-4">
                          <div class="col">
                              <p>{{ $value->ulasan }}</p>
                          </div>
                       </div>
                 </div>
              </div>
           </div>
        @endif
      @endif
    @endforeach
    </div>
  </div>
</div>

  
  
  
      
        <script src="/users/script.js"></script>
      </body>
    </html>
    
  </x-app-layout>
  