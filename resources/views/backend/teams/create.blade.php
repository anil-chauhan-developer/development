@extends('layouts.backend')
@section('content')
  <section class="content">
        <!-- Content Header (Page header) -->
        <div class="page-header">
          <h3 class="page-title">@if(!empty($branch->id)){{"Update Team"}}@else{{ "Create Team" }}@endif</h3>
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
      if(!empty($team->id)){
       $id =$team->id;
       }else{
         $id =0;
       }
     ?>
              <form class="forms-sample" id="teamform" action="{{route('teamcreate',$id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label >Name</label>
                                <input type="text" class="form-control" maxlength="20" name="name" value="@if(!empty($team->name)){{$team->name}}@endif" placeholder="Name" required>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="">Club</label>
                                <input type="text" class="form-control" maxlength="20" name="club" value="@if(!empty($team->club)){{$team->club}}@endif" placeholder="Club" required>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" class="form-control" name="state" value="@if(!empty($team->state)){{$team->state}}@endif"placeholder="State">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Logo</label>
                            <input type="text" class="form-control" name="logo" value="@if(!empty($team->logo)){{$team->logo}}@endif" placeholder="Logo url" required>
                        </div>

                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Team Type</label>
                          <select name="team_type" class="form-control">
                            <option value="">Select type</option>
                            <?php $teamTypes = ['1'=>'International','2'=>'Domestic','3'=>'League','4'=>'Women'];?>
                              @foreach ($teamTypes as $key => $types)
                                <option value="{{ $key }}" @if(!empty($team['team_type']) && $key == $team['team_type']){{ "selected" }}@endif>{{ $types }}</option>
                              @endforeach
                            </select>
                        </div>
                      
                      </div>
                    </div>

                  <input type="button" value="Submit" class="btn btn-gradient-danger mr-2">
                  <a href="{{ route('teams') }}" class="btn btn-gradient-info">Back</a>
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
     if($("#teamform").parsley().validate()){
        $(this).attr("disabled",true);
       $('#teamform').submit();
    }
   });
</script>
@endsection
