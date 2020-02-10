@extends('layouts.backend')
@section('content')
  <section class="content">
        <!-- Content Header (Page header) -->
        <div class="page-header">
          <h3 class="page-title">@if(!empty($schedule->id)){{"Update Match schedule"}}@else{{ "Create Match schedule" }}@endif</h3>
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
      if(!empty($schedule->id)){
       $id =$schedule->id;
       }else{
         $id =0;
       }
     ?>
              <form class="forms-sample" id="scheduleform" action="{{route('schedulecreate',$id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf

                  <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                          <label>Team 1</label>
                          <select name="first_team_id" class="form-control" required>
                            <option value="">Select team</option>
                              @foreach ($teams as $key => $team)
                                <option value="{{ $team['id'] }}" @if(!empty($schedule['first_team_id']) && $team['id'] == $schedule['first_team_id']){{ "selected" }}@endif>{{ $team['name'] }}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                          <label>Team 2</label>
                          <select name="second_team_id" class="form-control" required>
                            <option value="">Select team</option>
                              @foreach ($teams as $key => $team)
                                <option value="{{ $team['id'] }}" @if(!empty($schedule['second_team_id']) && $team['id'] == $schedule['second_team_id']){{ "selected" }}@endif>{{ $team['name'] }}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Match Date</label>
                                  <input type="date" class="form-control" name="match_date" value="@if(!empty($schedule->match_date)){{$schedule->match_date}}@endif" placeholder="Match date" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <label class="">Match Time</label>
                                  <input type="time" class="form-control" maxlength="20" name="match_time" value="@if(!empty($schedule->match_time)){{$schedule->match_time}}@endif" placeholder="Match Time" required>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-6">
                              <div class="form-group">
                                  <label>Venue Details</label>
                                    <input type="text" class="form-control" name="venue_details" value="@if(!empty($schedule->venue_details)){{$schedule->venue_details}}@endif" placeholder="Venue Details" required>
                              </div>
                          </div>

                          <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                              <label>Series</label>
                              <select name="series_id" class="form-control" required>
                                <option value="">Select series</option>
                                  @foreach ($series as $seriesdata)
                                    <option value="{{ $seriesdata['id'] }}" @if(!empty($schedule['series_id']) && $seriesdata['id'] == $schedule['series_id']){{ "selected" }}@endif>{{ $seriesdata['name'] }}</option>
                                  @endforeach
                                </select>
                            </div>
                          </div>
                      </div>
                  <input type="button" value="Submit" class="btn btn-gradient-danger mr-2">
                  <a href="{{ route('schedule') }}" class="btn btn-gradient-info">Back</a>
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
     if($("#scheduleform").parsley().validate()){
        $(this).attr("disabled",true);
       $('#scheduleform').submit();
    }
   });
</script>
@endsection
