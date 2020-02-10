@extends('layouts.backend')
@section('content')
  <section class="content">
        <!-- Content Header (Page header) -->
        <div class="page-header">
          <h3 class="page-title">@if(!empty($player->id)){{"Update Player"}}@else{{ "Create Player" }}@endif</h3>
          <nav aria-label="breadcrumb">
          </nav>
        </div>
        <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                @if ($message = Session::get('success'))
                  <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong>{{ $message }}</strong>
                  </div>
                  @endif
                  @if ($errors->any())
         @foreach ($errors->all() as $error)
           <div class="alert alert-danger alert-block">
             <button type="button" class="close" data-dismiss="alert">×</button>
                   <strong>{{ $error }}</strong>
           </div>
         @endforeach
     @endif
     <?php
      if(!empty($player->id)){
       $id =$player->id;
       }else{
         $id =0;
       }
     ?>
              <form class="forms-sample" id="playerform" action="{{route('playercreate',$id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                  <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6">
                          <div class="form-group">
                              <label>First Name</label>
                                <input type="text" class="form-control" maxlength="20" name="first_name" value="@if(!empty($player->first_name)){{$player->first_name}}@endif" placeholder="First Name" required>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                          <div class="form-group">
                              <label class="">Last Name</label>
                                <input type="text" class="form-control" maxlength="20" name="last_name" value="@if(!empty($player->last_name)){{$player->last_name}}@endif" placeholder="Last Name" required>
                          </div>

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Jersey Number</label>
                            <input type="number" min="1" maxlength="3" class="form-control" name="jersey_number" value="@if(!empty($player->jersey_number)){{$player->jersey_number}}@endif"placeholder="Jersey Number" required>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Profile Picture</label>
                            <input type="text" class="form-control" name="profile_pic" value="@if(!empty($player->profile_pic)){{$player->profile_pic}}@endif" placeholder="Profile pic url" required>
                        </div>

                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                          <label>Team </label>
                          <select name="team_id" class="form-control" required>
                            <option value="">Select type</option>
                              @foreach ($teams as $key => $team)
                                <option value="{{ $team['id'] }}" @if(!empty($player['team_id']) && $team['id'] == $player['team_id']){{ "selected" }}@endif>{{ $team['name'] }}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>


                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                          <label>Country </label>
                          <select name="country_id" class="form-control" required>
                            <option value="">Select country</option>
                              @foreach ($countries as $key => $country)
                                <option value="{{ $country['id'] }}" @if(!empty($player['country_id']) && $country['id'] == $player['country_id']){{ "selected" }}@endif>{{ $country['name'] }}</option>
                              @endforeach
                            </select>
                        </div>

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                          <label>Role Type </label>
                          <select name="role_type" class="form-control" required>
                            <option value="">Select role type</option>
                            <?php $roleTypes = ['1'=>'BATSMEN','2'=>'ALL ROUNDER','3'=>'WICKET KEEPER','4'=>'BOWLER'];?>
                              @foreach ($roleTypes as $key => $types)
                                <option value="{{ $key }}" @if(!empty($player['role_type']) && $key == $player['role_type']){{ "selected" }}@endif>{{ $types }}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>
                    </div>

                  <input type="button" value="Submit" class="btn btn-gradient-danger mr-2">
                  <a href="{{ route('players') }}" class="btn btn-gradient-info">Back</a>
                </form>
              </div>
            </div>
        </div>
        </div>

  </section>
@endsection
@section('scripts')
<script type="text/javascript">
   $("input[value=Submit]").click(function(event) {
     if($("#playerform").parsley().validate()){
        $(this).attr("disabled",true);
       $('#playerform').submit();
    }
   });
</script>
@endsection
