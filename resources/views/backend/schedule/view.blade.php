@extends('layouts.backend')
@section('content')
        @if (session()->has('success'))
            <h1>{{ session('success') }}</h1>
        @endif
        <div class="card">
          <div class="card-body">
            <form id="search" onSubmit="return false">
            <div class="row">

              {{-- <div class="col-md-3">
                  <input type="text" placeholder="keyword" id="keyword" class="form-control"/>
                  <div class="search_bar">
                    <span id="reset_button" class="btn btn-sm"><i class="fa fa-times" aria-hidden="true"></i></span>
                    <button type="submit" id="filter" class="btn btn-gradient-danger btn btn-sm "><i class="fa fa-search"></i></button>
                  </div>
              </div> --}}
              <div class="col-md-8"></div>
              <div class="col-md-4 text-right">
                <a href="{{route('schedulecreate',0)}}" class="btn btn-sm btn-success">Add New match schedule +</a>
              </div>
            </div>
            <br>
          </form>
            <div class="row">
              <div class="col-12">
                <div id="ScheduleTable" ></div>
              </div>
            </div>
          </div>
        </div>

@endsection
@section('scripts')
  <script>
		$(document).ready(function () {
		    //Prepare jTable
			$('#ScheduleTable').jtable({
				title: 'Teams',
			  paging: true, //Enable paging
        pageSize: 10, //Set page size (default: 10)
        sorting: true, //Enable sorting
        //selecting: true, //Enable selecting
        //multiselect: true, //Allow multiple selecting
        //selectingCheckboxes: true, //Show checkboxes on first column
        //selectOnRowClick: false, //Enable this to only select using checkboxes
        defaultSorting: 'id DESC', //Set default sorting
        actions: {
				listAction: '{{route('schedulelist')}}',
				},
				fields: {
          // id:{
          //   key: true,
          //   create: false,
          //   edit: false,
          //   list: false
          // },
					first_team_id: {
						title: 'Team Name 1',
            width: '10%',
            display:function(data){
              if (data.record.teamone.name != null) {
                return  data.record.teamone.name;
              }
            },
					},
          second_team_id: {
						title: 'Team Name 2',
            width: '10%',
            display:function(data){
              if (data.record.teamtwo.name != null) {
                return  data.record.teamtwo.name;
              }
            },
					},
          match_date: {
						title: 'Date',
              width: '10%',
					},
          match_time: {
            title: 'Time',
            width: '10%',
          },
          venue_details: {
            title: 'Venue Details',
            width: '10%',
          },
          is_result: {
            title: 'Match Result',
            width: '10%',
            display:function(data){
                if(data.record.id ==1){
                  return "Comming Soon";
                }else if(data.record.id ==2){
                  return "Completed";
                }else if(data.record.id ==3){
                  return "Withdrow";
                }
            }
          },
          action: {
						title: 'Action',
            sorting: false,
            display:function(data){
                return "<a href='schedule/schedulecreate/"+data.record.id+"' class='btn btn-sm btn-gradient-success' title='Edit'><i class='fa fa-pencil' aria-hidden='true'></i></a> ";
                //return "<a href='schedule/schedulecreate/"+data.record.id+"' class='btn btn-sm btn-gradient-success' title='Edit'><i class='fa fa-pencil' aria-hidden='true'></i></a> <a href='schedule/points/"+data.record.series_id+"' class='btn btn-sm btn-gradient-success' title='View Points'><i class='fa fa-eye' aria-hidden='true'></i></a>";
            }
					},
				}
			});
			$('#ScheduleTable').jtable('load');
      $('#filter').click(function (e) {
          e.preventDefault();
          $('#ScheduleTable').jtable('load', {
              keyword: $('#keyword').val(),
              status: $('#status').val(),
          });
      });
        $('#reset_button').click(function (e) {
         $('#ScheduleTable').jtable('load');
         $('#search')[0].reset();
     });
		});
	</script>
@endsection
