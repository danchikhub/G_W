<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Employee;
use App\Production;
use Illuminate\Support\Facades\DB;
class ProductionController extends Controller
{
    public function productionShow(){
        $productionList=DB::table('Production')
                        ->join('Employee', 'Employee.ID', '=', 'Production.Employee')
                        ->join('Product', 'Product.ID', '=', 'Production.Product')
                        ->select('Production.ID','Product.Product_name','Production.Amount','Production.Data', 'Employee.FIO')
                        ->get();
        return view('productionShow')->with('productions',$productionList);
    }
    public function productionAdd(Request $request)
    {
        $production=new Production;
        $product=new Product;
        $products=$product->all();
        $employee=new Employee;
        $employees=$employee->all();
        return view('productionAdd', compact('products','employees','production'));
    }
    public function productionAddSubmit(Request $request)
    {
        $product= $request['Product'];
        $amount= $request->input('Amount');
        $date= $request->input('Date');
        $employee= $request['Employee'];
        DB::insert('EXEC insert_production ?, ?, ?, ?', array($product,$amount,$date,$employee));
        return redirect()->route('productionAdd');
    }
    public function saleUpdate($ID){
        $production=Production::all();
        $productions=$production->find($ID);
        $employees = Employee::all();
        $products = Product::all();
        $productionProducts = DB::table('Production')
                        ->join('Product', 'Product.ID', '=', 'Production.Product')
                        ->select('Production.ID','Product.ID', 'Product_name')
                        ->where('Production.ID','=',$ID)
                        ->get(); 
        $productionEmployees = DB::table('Production')
                        ->join('Employee', 'Employee.ID', '=', 'Production.Employee')
                        ->select('Production.ID','Employee.ID', 'Employee.FIO')
                        ->where('Production.ID','=',$ID)
                        ->get();   
        return view('productionUpdate',compact('production','productions','employees','products','productionProducts','productionEmployees'));
    }
    public function saleUpdateSubmit($ID,Request $request){
        $product= $request['Product'];
        $amount= $request->input('Amount');
        $date= $request->input('Date');
        $employee= $request['Employee'];
        DB::insert('EXEC update_production ?, ?, ?, ?, ?', array($ID,$product,$amount,$date,$employee));
        return redirect()->route('productionShow');
    }
    public function productionDelete($ID){
        $production = DB::delete('EXEC delete_production ?',array($ID));
        return redirect()->route('productionShow');
    }
}
