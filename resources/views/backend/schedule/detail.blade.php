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
                <th>Match</th>
                <th>Won</th>
                <th>Lost</th>
                <th>Tied</th>
                <th>Point</th>
              </tr>

              @foreach ($points as $key => $point)
                <tr>
                  <th>{{$point->name}}</th>
                  <th>{{$point->number_of_match}}</th>
                  <th>{{$point->win}}</th>
                  <th>{{$point->lost}}</th>
                  <th>{{$point->ties}}</th>
                  <th>{{$point->points}}</th>
                </tr>
              @endforeach
            </table><br>
            <input type="button" class="btn btn-gradient-danger" onclick="window.history.back()" value="Back">
            </div>

            <div class="row">
              <div class="col-12">
                <div id="pointsTable" ></div>
              </div>
            </div>

            <!-- /.box-body -->
          </div>
          </div>
      </div>
                    <!-- /.box -->
</div>
</section>
@endsection
@section('scripts')
  <script>
		$(document).ready(function () {
		    //Prepare jTable
			$('#pointsTable').jtable({
				title: 'Point',
			  paging: true, //Enable paging
        pageSize: 10, //Set page size (default: 10)
        sorting: true, //Enable sorting
        //selecting: true, //Enable selecting
        //multiselect: true, //Allow multiple selecting
        //selectingCheckboxes: true, //Show checkboxes on first column
        //selectOnRowClick: false, //Enable this to only select using checkboxes
        defaultSorting: 'id DESC', //Set default sorting
        actions: {
				listAction: '{{route('teamlist')}}',
				},
				fields: {
          // id:{
          //   key: true,
          //   create: false,
          //   edit: false,
          //   list: false
          // },
        	name: {
						title: 'Name',
              width: '10%',
					},
          club: {
						title: 'Club',
              width: '10%',
					},
          state: {
            title: 'State',
              width: '10%',
          },
				}
			});
			//Load person list from server
			$('#pointsTable').jtable('load');
		});
	</script>
