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
                    <button type="submit" id="filter" class="btn btn-gradient-danger btn btn-sm"><i class="fa fa-search"></i></button>
                  </div>
              </div>
              <div class="col-md-5"></div>
              <div class="col-md-4 text-right">
                <a href="{{route('teamcreate',0)}}" class="btn btn-sm btn-success">Add New Team +</a>
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
                <div id="TeamTable" ></div>
              </div>
            </div>
          </div>
        </div>

@endsection
@section('scripts')
  <script>
		$(document).ready(function () {
		    //Prepare jTable
			$('#TeamTable').jtable({
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
          logo: {
            title: 'Logo',
              width: '10%',
              display:function(data){
                if (data.record.logo != null) {
                  return  "<a href='teams/teamdetails/"+data.record.id+"' title='view details'><img class='tableimage' src='"+data.record.logo+"'/></a>";
                }
              },
          },
        	team_type: {
          	title: 'Team Type',
            display:function(data){
              if (data.record.team_type == 1) {
                return '<span class="label label-success">International</span>';
            }else if (data.record.team_type == 2){
                return '<span class="label label-danger">Domestic</span>';
              }else if (data.record.team_type == 3){
                  return '<span class="label label-danger">League</span>';
                }else if (data.record.team_type == 4){
                    return '<span class="label label-danger">Women</span>';
                }
            },
					},
					action: {
						title: 'Action',
            sorting: false,
            display:function(data){
                return "<a href='teams/teamcreate/"+data.record.id+"' class='btn btn-sm btn-gradient-success' title='Edit'><i class='fa fa-pencil' aria-hidden='true'></i></a> <a href='teams/teamdetails/"+data.record.id+"' class='btn btn-sm btn-gradient-success' title='view details'><i class='fa fa-eye' aria-hidden='true'></i></a>";
            }
					},
				}
			});
			//Load person list from server
			$('#TeamTable').jtable('load');
      $('#filter').click(function (e) {
          e.preventDefault();
          $('#TeamTable').jtable('load', {
              keyword: $('#keyword').val(),
              status: $('#status').val(),
          });
      });
        $('#reset_button').click(function (e) {
         $('#TeamTable').jtable('load');
         $('#search')[0].reset();
     });
		});
	</script>
@endsection
