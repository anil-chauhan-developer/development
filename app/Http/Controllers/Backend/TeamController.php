<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teams;
use Session;
use Validator;

class TeamController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');

  }


    public function index(Request $request)
    {
      return view('backend.teams.view');
    }

    /******This function is used to get team records********/
    public function teamlist(Request $request)
    {
        $orderby = "id DESC";
        $teams   = new Teams();
        $teams = $teams->newQuery();
        $orderby = isset($request->jtSorting)?$request->jtSorting:$orderby;
        $limit = isset($request->jtPageSize)?$request->jtPageSize:10;
        $offset= isset($request->jtStartIndex)?$request->jtStartIndex:0;
        $teams->with('player');
        $teams->where('is_delete','0');
        if ($request->isMethod('post')) {
          if ($request->has('keyword')) {
            if($request->input('keyword') !=''){
              $teams->where(function($q) use ($request){
               $q->orWhere('name','like', '%'.$request->input('keyword').'%');
               $q->orWhere('club','like', '%'.$request->input('keyword').'%');
               $q->orWhere('state','like', '%'.$request->input('keyword').'%');
             });
            }
         }
         $count = $teams->count();
        }else{
          $count = $teams->count();
        }
       $teams->orderByRaw($orderby);
       $teams->offset($offset);
       $teams->limit($limit);
       $team = $teams->get();
       return  response()->json(['Result' => 'OK','TotalRecordCount' => $count,'Records' => $team],200);
    }

    /******This function is used to create and update team name********/
    public function create(Request $request,$teamid)
    {
      $team='';
      if($teamid !=0){
        $team = Teams::find($teamid);
        $msg ='Team has been updated succesfully!';
      }
      if ($request->isMethod('post')) {
           $validator = Validator::make($request->all(), [
              'name'=>'required|unique:teams,name,'.$teamid,
              'logo' => 'required|unique:teams,name,'.$teamid,
              'club' => 'required',
          ]);
          if ($validator->fails()) {
              return redirect()->back()->withErrors($validator)->withInput();
          }
          if(empty($team->id)){
              $team   = new Teams;
              $msg    ='Team has been created succesfully!';
          }
          $team->name=$request->name;
          $team->club=$request->club;
          $team->state=($request->state)?$request->state:'';
          $team->logo=$request->logo;
          $team->team_type=$request->team_type;
          $team->save();
          $message = array('message' => $msg,'alert-type' => 'success');
          return redirect('teams')->with($message);
        }
        return view('backend.teams.create',compact('team'));
    }
    /****This function is used to get team and players****/
    public function details($id){
      $team = Teams::with('player')->find($id);
      return view('backend.teams.detail',compact('team'));
    }

}
