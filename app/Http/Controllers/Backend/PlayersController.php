<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teams;
use App\Models\Players;
use App\Models\Country;
use Session;
use Validator;
use Illuminate\Validation\Rule;

class PlayersController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');

  }


    public function index(Request $request)
    {
      return view('backend.players.view');
    }

    /******This function is used to get team records********/
    public function playerlist(Request $request)
    {
        $orderby = "id DESC";
        $players   = new Players();
        $players = $players->newQuery();
        $orderby = isset($request->jtSorting)?$request->jtSorting:$orderby;
        $limit = isset($request->jtPageSize)?$request->jtPageSize:10;
        $offset= isset($request->jtStartIndex)?$request->jtStartIndex:0;
        $players->where('is_delete','0');
        $players->with('team');
        if ($request->isMethod('post')) {
          if ($request->has('keyword')) {
            if($request->input('keyword') !=''){
              $players->where(function($q) use ($request){
               $q->orWhere('first_name','like', '%'.$request->input('keyword').'%');
               $q->orWhere('last_name','like', '%'.$request->input('keyword').'%');
               $q->orWhere('jersey_number','like', '%'.$request->input('keyword').'%');
             });
            }
         }
         $count = $players->count();
        }else{
          $count = $players->count();
        }
       $players->orderByRaw($orderby);
       $players->offset($offset);
       $players->limit($limit);
       $player = $players->get();
       return  response()->json(['Result' => 'OK','TotalRecordCount' => $count,'Records' =>$player],200);
    }

    /******This function is used to create and update players********/
    public function create(Request $request,$playerid)
    {
      $player='';
      if($playerid !=0){
        $player = Players::find($playerid);
        $msg ='Player has been updated succesfully!';
      }
      if ($request->isMethod('post')) {
            $team_id = $request->team_id;
            $jersey_number = $request->jersey_number;
            $validator = Validator::make($request->all(), [
              'first_name'    =>'required',
              'last_name'     => 'required',
              'jersey_number' => 'required|numeric|unique:players,jersey_number,'.$playerid,
              'team_id'       => 'required',
              'country_id'    => 'required',
              'profile_pic'   => 'required',
              // 'jersey_number' => [
              //             'required',
              //             Rule::unique('players')->where(function ($query) use($jersey_number,$team_id) {
              //             return $query->where('jersey_number', $jersey_number)
              //             ->where('team_id', $team_id);
              //             }),
              //           ],
            ]);
          if ($validator->fails()) {
              return redirect()->back()->withErrors($validator)->withInput();
          }
          if(empty($player->id)){
              $player   = new Players;
              $msg    ='Player has been created succesfully!';
          }
          $player->first_name=$request->first_name;
          $player->last_name=$request->last_name;
          $player->team_id=$request->team_id;
          $player->country_id=$request->country_id;
          $player->profile_pic=$request->profile_pic;
          $player->role_type=$request->role_type;
          $player->jersey_number=$request->jersey_number;
          $player->save();
          $message = array('message' => $msg,'alert-type' => 'success');
          return redirect('players')->with($message);
        }
        $teams =  Teams::where(['is_active'=>'1','is_delete'=>'0'])->get();
        $countries =  Country::get();
        return view('backend.players.create',compact('player','teams','countries'));
    }

    /****This function is used to get player name and player history****/
    public function details($id){
      $player = Players::with(['matches'])->find($id);
      $totalrun = 0;
      $totalhundreds=0;
      $totalfifties=0;
      $wicket5w=0;
      $wicket10w=0;
      $totalwickets=0;
      $totlaHattric=0;
      $totalrungiven=0;
      foreach ($player['matches'] as $match) {

        $fifties = collect($match)->sum('fifties');
        $hundreds = collect($match)->sum('hundreds');
        $wickets = collect($match)->sum('wickets');
        if($match['runhistory']['wickets'] >=5 && $match['runhistory']['wickets'] <=10){
          $wicket5w = $wicket5w + 1;
        }
        if($match['runhistory']['wickets'] >=10){
          $wicket10w = $wicket10w + 1;
        }
        if($match['runhistory']['is_play']== '1'){
          $run = collect($match)->sum('runs');
          $totalrun =$totalrun+$run;
        }else if($match['runhistory']['is_play']== '2'){
          $rungiven = collect($match)->sum('runs');
          $totalrungiven =$totalrungiven+$rungiven;
        }
        $hat_trick = collect($match)->sum('hat_trick');
        $totlaHattric = $totlaHattric+$hat_trick;

        $totalfifties =$totalfifties+$fifties;
        $totalhundreds =$totalhundreds+$hundreds;
        $totalwickets = $totalwickets+$wickets;
      }
      return view('backend.players.detail',compact('player','totalrun','totalhundreds','totalfifties','totalwickets','wicket10w','wicket5w','totlaHattric','totalrungiven'));
    }


}
