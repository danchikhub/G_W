<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchas;
use App\Employee;
use App\Raw;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Budget;
class PurchasController extends Controller
{
    public function purchasShow(){
        $purchasList=DB::table('PurchasOfRawMaterials')
                        ->join('Raws', 'Raws.ID', '=', 'PurchasOfRawMaterials.Raw')
                        ->join('Employee', 'Employee.ID', '=', 'PurchasOfRawMaterials.Employee')
                        ->select('PurchasOfRawMaterials.ID', 'Raws.Raw_name', 'PurchasOfRawMaterials.Amount','PurchasOfRawMaterials.Sum','PurchasOfRawMaterials.Date','Employee.FIO')
                        ->get();
        return view('purchasShow')->with('purchases',$purchasList);
    }
    public function purchasAdd(Request $request)
    {
        $purchas=new Purchas;
        $raw=new Raw;
        $raws=$raw->all();
        $employee=new Employee;
        $employees=$employee->all();
        return view('purchasAdd', compact('raws','employees','purchas'));
    }

    public function purchasAddSubmit(Request $request)
    {
        try{
        $raw= $request['Raw'];
        $amount= $request->input('Amount');
        $sum= $request->input('Sum');
        $date= $request->input('Date');
        $employee= $request['Employee'];
        DB::insert('EXEC insert_push ?, ?, ?, ?, ?',array($raw,$amount,$sum,$date,$employee));
        return redirect()->route('purchasAdd');
        } catch(QueryException $ex) {
            return back()->withError('Недостаточно денег в бюджете')->withInput();
        }

    }

    public function purchasDelete($ID){
        $purchas = DB::delete('EXEC delete_push ?',array($ID));
        return redirect()->route('purchasShow');
    }

    public function purchasUpdate($ID){
        $purchas=Purchas::all();
        $purchases=$purchas->find($ID);
        $employees = Employee::all();
        $raws = Raw::all();
        $purchasRaws = DB::table('PurchasOfRawMaterials')
                        ->join('Raws', 'Raws.ID', '=', 'PurchasOfRawMaterials.Raw')
                        ->select('PurchasOfRawMaterials.ID','Raws.ID', 'Raws.Raw_name')
                        ->where('PurchasOfRawMaterials.ID','=',$ID)
                        ->get();
        $purchasEmployees = DB::table('PurchasOfRawMaterials')
                        ->join('Employee', 'Employee.ID', '=', 'PurchasOfRawMaterials.Employee')
                        ->select('PurchasOfRawMaterials.ID','Employee.ID', 'Employee.FIO')
                        ->where('PurchasOfRawMaterials.ID','=',$ID)
                        ->get();
        return view('purchasUpdate',compact('purchas','purchases','employees','raws','purchasRaws','purchasEmployees'));
    }
    public function purchasUpdateSubmit($ID,Request $request){
        $bud=Budget::all();
        $budget=$bud->find(1);
        $budgetSum=(float) $budget->Sum;
        try{
        $raw= $request['Raw'];
        $sum= (float) $request->input('Sum');
        $amount= (float) $request->input('Amount');
        $total=$sum*$amount;
        if($total > $budgetSum){
            return back()->withError('Недостаточно денег в бюджете')->withInput();
        }else{


        $date= $request->input('Date');
        $employee=$request['Employee'];
        DB::insert('EXEC update_push ?, ?, ?, ?, ?, ?',array($ID,$raw,$amount,$sum,$date,$employee,));
        return redirect()->route('purchasShow');}
    } catch(QueryException $ex) {
        return back()->withError('Недостаточно денег в бюджете')->withInput();
    }
    }
}
