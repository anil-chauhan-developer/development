<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title> Striker </title>
      <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{asset('backend/css/stylelogin.css')}}">
      <link rel="icon" href="{{asset('backend/images/DashLogo.png')}}" type="image/x-icon" />
   </head>
   <body >

      <div class="hedaer">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-4 col-sm-4 col-xs-4 logo-color text-center"  >
                  <h1>Admin Login</h1>
               </div>
               <div class="col-md-8 col-sm-8 col-xs-8">
               </div>
            </div>
         </div>
      </div>

      <div class="login-page">
         <center><h1>Admin Login</h1></center>
         <form method="POST" action="{{ route('login') }}">
             @csrf
             @if(Session::has('error'))
                  <div class="alert alert-danger">
                      {{ Session::get('error') }}
                  </div>
           @endif

             <input id="email" type="email" placeholder="Email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

             @error('email')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror
             <input id="password" type="password" placeholder="Password " class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
             @error('password')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror
             <input type="submit" name="" value="Login">
         </form>
      </div>
      <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
   </body>
</html>
