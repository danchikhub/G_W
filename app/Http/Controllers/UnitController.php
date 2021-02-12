<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use Illuminate\Support\Facades\DB;
class UnitController extends Controller
{
    public function unitShow(){
        $unit = new Unit;
        $units = $unit->all();
        return view('unitShow')->with('units',$units);
    }
    public function unitAdd(){
        $unit = new Unit;
        $units = $unit->all();
        return view('unitAdd')->with('units',$units);
    }

    public function unitAddSubmit(Request $request)
    {
        $name= $request->input('name');
        // var_dump($unit);
        // die();
        DB::insert('EXEC insert_unit ? ',array($name));
        return redirect()->route('unitShow');
    }
    public function unitDelete($ID){
        $unit = DB::delete('EXEC delete_unit ?',array($ID));
        return redirect()->route('unitShow');
    }

    public function unitUpdate($ID){
        $units=Unit::all();
        $unit=$units->find($ID);    
        return view('unitUpdate',compact('unit'));
    }
    public function unitUpdateSubmit($ID,Request $request){
        $name= $request->input('name');
        DB::insert('EXEC update_unit ?, ? ',array($ID,$name));
        return redirect()->route('unitShow');
    }
}
