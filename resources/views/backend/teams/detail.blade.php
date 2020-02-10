@extends('layouts.backend')
@section('content')
  <section class="content">
      <div class="card">
        <div class="card-body">
      <div class="row">
        <div class="col-lg-12">
            <div class="box-body">
              <table class="table table-striped table-hover">
              <tr>
                <th>Team Name</th>
                <td>{{ $team['name'] }}</td>
                <th>Logo</th>
                <td><img src="{{ $team['logo'] }}" class="img img-rounded"></td>
              </tr>

              <tr>
                <th>Active Status</th>
                <td> @if($team->is_active ==1)
                  <label class="badge badge-gradient-success">Active</label>
                @elseif($team->is_active == 2)
                  <label class="badge badge-gradient-danger">Suspended</label>
                  @elseif($team->is_active == 0)
                        <label class="badge badge-gradient-info">Inactive</label>
                  @endif</td>
                  <th>Number of players</th>
                  <td>{{ count($team['player']) }}</td>
              </tr>
                  <tr style="background-color:black";>

                <th>S.N</th>
                <th>Player Name</th>
                <th>Image</th>
                <th></th>

              </tr>

              @foreach ($team['player'] as $key => $player)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td><a href="{{Route('playerdetails',$player['id'])}}">{{ $player['first_name'].' '.$player['last_name'] }}</a></td>
                  <td><img src="{{ $player['profile_pic'] }}" class="img img-rounded"></td>
                  <td></td>
                </tr>
              @endforeach
              <tr>

              </tr>
            </table><br>
            <input type="button" class="btn btn-gradient-danger" onclick="window.history.back()" value="Back">
            {{-- <a href="{{ route('teams') }}" class="btn btn-gradient-danger">Back</a> --}}
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          </div>
      <!-- /.box -->
</div>
</section>
@endsection
