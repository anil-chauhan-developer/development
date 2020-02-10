<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>{{ config('app.name') }}</title>
   <link rel="shortcut icon" href="{{asset('image/ic_logo_112.png')}}" />
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.addons.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{asset('vendors/iconfonts/font-awesome/css/font-awesome.min.css')}}" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/parsley.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/lightgallery/css/lightgallery.css')}}">
  <link rel="stylesheet" href="{{ asset('backend/css/timepicker.css')}}"/>`
  <!-- endinject -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{asset('image/ic_logo_112.png')}}" />
  <style>
  .tableimage{height:40px !important;border-radius: 50% !important;width:40px !important; margin-right: 5px !important;}
  </style>
  <style type="text/css">/* Chart.js */
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style>

<style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
  @yield('stylesheets')
</head>
