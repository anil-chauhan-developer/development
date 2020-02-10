
@extends('layouts.backend')
@section('content')
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-home"></i>
          </span> Dashboard </h3>

      </div>
      <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
          <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
              <img src="{{asset('backend/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
              <h4 class="font-weight-normal mb-3">Total customers (Today/Total)<i class="mdi mdi-chart-line mdi-24px float-right"></i>
              </h4>
            <h2 class="mb-5">

            </h2>
            </div>
          </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
          <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
              <img src="{{asset('backend/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
              <h4 class="font-weight-normal mb-3">Total coaches <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
              </h4>
            <h2 class="mb-5">

            </h2>
            </div>
          </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
          <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
              <img src="{{asset('backend/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
              <h4 class="font-weight-normal mb-3">Total plans <i class="mdi mdi-diamond mdi-24px float-right"></i>
              </h4>
            <h2 class="mb-5">

            </h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
          <div class="card bg-gradient-warning card-img-holder text-white">
            <div class="card-body">
              <img src="{{asset('backend/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
              <h4 class="font-weight-normal mb-3">View daily revenue (Today/Total)<i class="mdi mdi-chart-line mdi-24px float-right"></i>
              </h4>
            <h2 class="mb-5">
              0/0

            </h2>
            </div>
          </div>
        </div>
      </div>

    </div>
@endsection
@section('scripts')
@endsection
