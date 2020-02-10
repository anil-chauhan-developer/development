@extends('layouts.backend')
@section('content')
        @if (session()->has('success'))
            <h1>{{ session('success') }}</h1>
        @endif
        <div class="card">
          <div class="card-body">
            <form id="search" onSubmit="return false">
            <div class="row">

              <div class="col-md-3">
                  <input type="text" placeholder="keyword" id="keyword" class="form-control"/>
                  <div class="search_bar">
                    <span id="reset_button" class="btn btn-sm"><i class="fa fa-times" aria-hidden="true"></i></span>
                    <button type="submit" id="filter" class="btn btn-gradient-danger btn btn-sm "><i class="fa fa-search"></i></button>
                  </div>
              </div>
              <div class="col-md-5"></div>
              <div class="col-md-4 text-right">
                <a href="{{route('playercreate',0)}}" class="btn btn-sm btn-success">Add New Player +</a>
                {{-- <button class="btn btn-gradient-danger btn-md btn-fill dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                    Action
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" name="Unblock" id="unblock" href="#"><span onclick="updateRecords(event,1);">Active</span></a>
                      <a class="dropdown-item" name="Block"  id="block" href="#"><span onclick="updateRecords(event,0);">Inactive</span></a>
                  </div> --}}
              </div>
            </div>
            <br>
          </form>
            <div class="row">
              <div class="col-12">
                <div id="PlayerTable" ></div>
              </div>
            </div>
          </div>
        </div>

@endsection
@section('scripts')
  <script>
		$(document).ready(function () {
		    //Prepare jTable
			$('#PlayerTable').jtable({
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
				listAction: '{{route('playerlist')}}',
				},
				fields: {
          // id:{
          //   key: true,
          //   create: false,
          //   edit: false,
          //   list: false
          // },
					first_name: {
						title: 'First Name',
              width: '10%',
					},
          last_name: {
						title: 'Last Name',
              width: '10%',
					},
          team_id: {
						title: 'Team',
              width: '10%',
              display:function(data){
                if (data.record.team.name != null) {
                  return  data.record.team.name;
                }
              },
					},
          profile_pic: {
            title: 'Photo',
              width: '10%',
              display:function(data){
                if (data.record.profile_pic != null) {
                  //return  "<a href='teams/teamdetails/"+data.record.id+"' title='view details'><img class='tableimage' src='"+data.record.logo+"'/></a>";

                  return  "<img class='tableimage' src='"+data.record.profile_pic+"'/>";
                }
              },
          },
          jersey_number: {
            title: 'Jersey Number',
              width: '10%',
          },
        	role_type: {
          	title: 'Team Type',
            display:function(data){
              if (data.record.role_type == 1) {
                return '<span class="label label-success">BATSMEN</span>';
              }else if (data.record.role_type == 2){
                  return '<span class="label label-danger">ALL ROUNDER</span>';
              }else if (data.record.role_type == 3){
                  return '<span class="label label-danger">WICKET KEEPER</span>';
              }else if (data.record.role_type == 4){
                  return '<span class="label label-danger">BOWLER</span>';
              }
            },
					},
					action: {
						title: 'Action',
            sorting: false,
            display:function(data){
                return "<a href='players/playercreate/"+data.record.id+"' class='btn btn-sm btn-gradient-success' title='Edit'><i class='fa fa-pencil' aria-hidden='true'></i></a> <a href='players/playerdetails/"+data.record.id+"' class='btn btn-sm btn-gradient-success' title='view details'><i class='fa fa-eye' aria-hidden='true'></i></a>";
            }
					},
				}
			});
			//Load person list from server
			$('#PlayerTable').jtable('load');
      $('#filter').click(function (e) {
          e.preventDefault();
          $('#PlayerTable').jtable('load', {
              keyword: $('#keyword').val(),
              status: $('#status').val(),
          });
      });
        $('#reset_button').click(function (e) {
         $('#PlayerTable').jtable('load');
         $('#search')[0].reset();
     });
		});
	</script>
@endsection
