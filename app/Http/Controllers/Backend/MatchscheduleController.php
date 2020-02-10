<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teams;
use App\Models\Matchchedule;
use App\Models\Series;
use Session;
use Validator;
use Illuminate\Support\Facades\DB;

class MatchscheduleController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index(Request $request)
    {
      return view('backend.schedule.view');
    }

    /******This function is used to get team records********/
    public function schedulelist(Request $request)
    {
        $orderby = "id DESC";
        $schedules   = new Matchchedule();
        $schedules = $schedules->newQuery();
        $orderby = isset($request->jtSorting)?$request->jtSorting:$orderby;
        $limit = isset($request->jtPageSize)?$request->jtPageSize:10;
        $offset= isset($request->jtStartIndex)?$request->jtStartIndex:0;
        $schedules->with('teamone');
        $schedules->with('teamtwo');
        if ($request->isMethod('post')) {
          if ($request->has('keyword')) {
            if($request->input('keyword') !=''){
              $schedules->where(function($q) use ($request){
               // $q->orWhere('first_name','like', '%'.$request->input('keyword').'%');
               // $q->orWhere('last_name','like', '%'.$request->input('keyword').'%');
               // $q->orWhere('jersey_number','like', '%'.$request->input('keyword').'%');
             });
            }
         }
         $count = $schedules->count();
        }else{
          $count = $schedules->count();
        }
       $schedules->orderByRaw($orderby);
       $schedules->offset($offset);
       $schedules->limit($limit);
       $schedule = $schedules->get();
       return  response()->json(['Result' => 'OK','TotalRecordCount' => $count,'Records' =>$schedule],200);
    }

    /******This function is used to create and update players********/
    public function create(Request $request,$scheduleid)
    {
      $schedule='';
      if($scheduleid !=0){
        $schedule                 = Matchchedule::find($scheduleid);
        $msg                      ='Match schedule has been updated succesfully!';
      }
      if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                  'first_team_id'   =>'required',
                  'second_team_id'  => 'required',
                  'match_date'      => 'required|date',
                  'match_time'      => 'required',
                  'venue_details'   => 'required',
            ]);
          if ($validator->fails()) {
              return redirect()->back()->withErrors($validator)->withInput();
          }
          if(empty($schedule->id)){
              $schedule             = new Matchchedule;
              $msg                  ='Match schedule has been created succesfully!';
          }
          $schedule->first_team_id  = $request->first_team_id;
          $schedule->second_team_id = $request->second_team_id;
          $schedule->match_date     = $request->match_date;
          $schedule->match_time     = $request->match_time;
          $schedule->venue_details  = $request->venue_details;
          $schedule->series_id      = $request->series_id;
          $schedule->save();
          $message = array('message' => $msg,'alert-type' => 'success');
          return redirect('schedule')->with($message);
        }
        $series =  Series::get();
        $teams =  Teams::where(['is_active'=>'1','is_delete'=>'0'])->get();
        return view('backend.schedule.create',compact('teams','schedule','series'));
    }

    /******This function is used to get point two team between match******/
    public function points($id){
      $sql= "SELECT teams.id,teams.name,point_table.* FROM teams JOIN (SELECT SUM(points) as points, team_id,count(team_id) as number_of_match, SUM(CASE WHEN is_result = 1 THEN 1 ELSE 0 END) AS win, SUM(CASE WHEN is_result = 2 THEN 1 ELSE 0 END) AS lost, SUM(CASE WHEN is_result = 3 THEN 1 ELSE 0 END) AS ties FROM match_point_table GROUP BY team_id) as point_table ON point_table.team_id = teams.id";
      $points = DB::select($sql);
      return view('backend.schedule.detail',compact('points'));
    }
}
