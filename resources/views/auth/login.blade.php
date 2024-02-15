<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="loginpage/style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>  <x-auth-session-status class="mb-4" :status="session('status')" />
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="../images/logi.jpg" alt="">
        <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="../images/logi.jpg" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <label for="email" :value="__('Email')" ></label>
                <input  id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
           
              </div>
              <x-input-error :messages="$errors->get('email')" class="mt-2 " style="color: red"/>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <label for="password" :value="__('Password')" ></label>
                <input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="current-password" >
               
              </div>
              <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: red" />
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
              <div class="button input-box">
                <input type="submit" value="Sumbit"       {{ __('Log in') }}>
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
            </div>
        </form>
      </div>
        <div class="signup-form">
          <div class="title">Signup</div>
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
              
                <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="name">
              </div>
              <x-input-error :messages="$errors->get('name')" class="mt-2" />
                <div class="input-box">
                    <i class="fas fa-address-book"></i>
                  
                    <input id="nama_lengkap" class="block mt-1 w-full" type="text" name="nama_lengkap" :value="old('nama_lengkap')" required autofocus autocomplete="nama_lengkap" placeholder="Nama Lengkap">
                  </div>
                  <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
                    <div class="input-box">
                        <i class="fa fa-map-marker"></i>
                       
                        <input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" required autofocus autocomplete="alamat" placeholder="Alamat">
                      </div>
                      <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                        <div class="input-box">
                            <i class="fas fa-envelope"></i>

                            <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username"  placeholder="Email">
                          </div>
                          <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                             
                                <input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" placeholder="Password" />              </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                <div class="input-box">
                                    <i class="fas fa-lock"></i>
                                   
                                    <input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password"/>
                                          </div>
                                          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
              <div class="button input-box">
                <input type="submit" value="Sumbit"      {{ __('Register') }}>
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>
  </div>
</body>
</html>


