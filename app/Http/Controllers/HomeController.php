<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hour_work_info;
use App\time_table;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $colom_data = hour_work_info::select('id')->where('id')->get();
   
        return view('home');
    }

  /**
     * inserting the info in hour_work_infos .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function insert(Request $request)
    {
       // dd($request);
         $hour_work =  hour_work_info::create([
            'work_day' => $request['w_day'],
            'work_hour' => $request['w_h'],
            'total_sub' => $request['t_s'],
            'sub_p_day' => $request['s_p_d'],
            'total_h_w' => $request['totle_h_p'],
        ]);
        $hwi_id =  $hour_work->id;
        $total_sub =$request['t_s'];
        $totle_h_p =$request['totle_h_p'];
        $work_day =$request['w_day'];

        return view('second_form',compact('totle_h_p','total_sub','hwi_id','work_day'));
   //     return  redirect()->route('second_form', ['total_sub' => $total_sub, 'totle_h_p' => $totle_h_p]);
    }

    public function insert_timetable(Request $request)
    {
    //    dd($request);

       for($i=0 ; $i < sizeof($request['sub_name']) ; $i++)
       {
           $time_table =  time_table::create([
            'week_id' => $request['hwi_id'],
          //  'week_id' => 1,
            'subject' => $request['sub_name'][$i],
            'hour' => $request['sub_hour'][$i],
        ]);
  
       }

       $id = $request['hwi_id'];
       return  redirect()->route('final_form',[ 'id' => $id ]);
  //     $this->final_form($hwi_id);
    }

    public function final_form(Request $request)
    {
     $hwi_id = $request['id'];
     $data = time_table::where('week_id',$hwi_id)->get();
     $colom_data = hour_work_info::select('work_day')->where('id',$data[0]['week_id'])->first();
     return view('final_form', ['table_data' => $data ,'colom_data' => $colom_data]);
    }






}
