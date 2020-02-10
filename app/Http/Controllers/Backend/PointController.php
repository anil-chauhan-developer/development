<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Series;
use Session;

class PointController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index(Request $request)
  {
    $series = Series::get();
    $sql= "SELECT teams.id,teams.name,point_table.* FROM teams JOIN (SELECT SUM(points) as points, team_id,count(team_id) as number_of_match, SUM(CASE WHEN is_result = 1 THEN 1 ELSE 0 END) AS win, SUM(CASE WHEN is_result = 2 THEN 1 ELSE 0 END) AS lost, SUM(CASE WHEN is_result = 3 THEN 1 ELSE 0 END) AS ties FROM match_point_table GROUP BY team_id) as point_table ON point_table.team_id = teams.id";
    $points = DB::select($sql);
    return view('backend.schedule.detail',compact('points'));
  }

  public function pointtable(Request $request){
      $seriesId = $request->id;
      $sql= "SELECT teams.id,teams.name,point_table.* FROM teams JOIN (SELECT SUM(points) as points, team_id,count(team_id) as number_of_match, SUM(CASE WHEN is_result = 1 THEN 1 ELSE 0 END) AS win, SUM(CASE WHEN is_result = 2 THEN 1 ELSE 0 END) AS lost, SUM(CASE WHEN is_result = 3 THEN 1 ELSE 0 END) AS ties FROM match_point_table GROUP BY team_id) as point_table ON point_table.team_id = teams.id";
      $points = DB::select($sql);
      return  response()->json(['Result' => 'OK','TotalRecordCount' => $count,'Records' =>$points],200);
  }
}
