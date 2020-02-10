@extends('layouts.backend')
@section('content')
  <section class="content">
      <div class="card">
        <div class="card-body">
      <div class="row">
        <div class="col-lg-12">
            <div class="box-body">
              <table class="table table-striped table-hover">
                <tr><th><h4> Player Details</h4></th></tr>
              <tr>
                <th>First Name</th>
                <td>{{ $player->first_name }}</td>
                <th>Last Name</th>
                <td>{{ $player->last_name }}</td>
              </tr>
              <tr>

                  <th>Role</th>
                    <td> @if($player->role_type ==1)
                      <label class="badge badge-gradient-success">BATSMEN</label>
                    @elseif($player->role_type == 2)
                      <label class="badge badge-gradient-success">ALL ROUNDER</label>
                    @elseif($player->role_type == 3)
                            <label class="badge badge-gradient-success">WICKET KEEPER</label>
                    @elseif($player->role_type == 4)
                          <label class="badge badge-gradient-success">BOWLER</label>
                      @endif</td>
                      <th>Profile Pic</th>
                      <td> @if($player->profile_pic !='')
                        <img src="{{ $player->profile_pic }}" class="im img-rounded">
                        @endif</td>
              </tr>
              <tr><th><h4> Batting Career Summary</h4></th></tr>
              <tr style="background-color:black">
                  <th>Match</th>
                  <th>Runs</th>
                  <th>Fifty</th>
                  <th>Hundred</th>
              </tr>
              <tr>
                <th>{{ count($player['matches']) }}</th>
                <td>{{ $totalrun }}</td>
                <td>{{ $totalfifties }}</td>
                <td>{{ $totalhundreds }}</td>
              </tr>
              <tr><th><h4> Bowling Career Summary</h4></th></tr>
              <tr style="background-color:black">
                  <th>Match</th>
                  <th>Runs</th>
                  <th>Wickets</th>
                  <th>Wickets (5)</th>
                  <th>Wickets (10)</th>
                  <th>Hat Trick</th>
              </tr>
              <tr>
                  <th>{{ count($player['matches']) }}</th>
                  <th>{{ $totalrungiven }}</th>
                  <th>{{ $totalwickets }}</th>
                  <th>{{ $wicket5w }}</th>
                  <th>{{ $wicket10w }}</th>
                  <th>{{ $totlaHattric }}</th>
              </tr>
            </table><br>
              <input type="button" class="btn btn-gradient-danger" onclick="window.history.back()" value="Back">
            {{-- <a href="{{ route('players') }}" class="btn btn-gradient-danger">Back</a> --}}
            </div>
            <!-- /.box-body -->
          </div>
          </div>
      </div>                    <!-- /.box -->
</div>
</section>
@endsection
