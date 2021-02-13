<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Raw;
use Illuminate\Support\Facades\DB;
use App\Unit;
class RawController extends Controller
{
    public function rawShow()
    {
        $rawList=DB::table('Raws')
                        ->join('Units', 'Units.ID', '=', 'Raws.Unit ')
                        ->select('Raws.ID', 'Raws.Raw_name', 'Units.Unit','Raws.Sum','Raws.Amount','Raws.RawCostPrice')
                        ->get();
        return view('rawShow')->with('raws',$rawList);
    }
    public function rawAdd(Request $request)
    {
        $raw=new Raw;
        $unit=new Unit;
        $units=$unit->all();
        return view('rawAdd')->with('units',$units);
    }
    public function rawAddSubmit(Request $request)
    {
        $name= $request->input('name');
        $unit= $request['Unit'];
        $sum= $request->input('Sum');
        $amount= $request->input('Amount');
        DB::insert('EXEC insert_date_about_raws ?, ?, ?, ? ',array($name,$unit,$sum,$amount));
        return redirect()->route('rawAdd');
    }

    public function rawDelete($ID){
        $raw = DB::delete('EXEC delete_date_info_raws ?',array($ID));
        return redirect()->route('rawShow');
    }

    public function rawUpdate($ID){
        $raw=Raw::all();
        $raws=$raw->find($ID);
        $units = Unit::all();
        $rawLists=DB::table('Raws')
                            ->join('Units', 'Units.ID', '=', 'Raws.Unit ')
                            ->select('Raws.ID', 'Raws.Raw_name', 'Units.ID', 'Units.Unit','Raws.Sum','Raws.Amount','Raws.RawCostPrice')
                            ->get();   
        return view('rawUpdate',compact('raws','units','rawLists'));
    }

    public function rawUpdateSubmit($ID,Request $request){
        $name= $request->input('name');
        $unit= $request['Unit'];
        $sum= $request->input('Sum');
        $amount= $request->input('Amount');
        DB::insert('EXEC update_date_about_raws ?, ?, ?, ?, ? ',array($ID,$name,$unit,$sum,$amount));
        return redirect()->route('rawShow');
    }
}
