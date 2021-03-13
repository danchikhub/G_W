<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Employee;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
class SaleController extends Controller
{
    public function saleShow(){
        $saleList=DB::table('SaleOfProducts')
                        ->join('Product', 'Product.ID', '=', 'SaleOfProducts.Product')
                        ->join('Employee', 'Employee.ID', '=', 'SaleOfProducts.Employee')
                        ->select('SaleOfProducts.ID', 'Product.Product_name', 'SaleOfProducts.Amount','SaleOfProducts.Sum','SaleOfProducts.Date','Employee.FIO')
                        ->get();
        return view('saleShow')->with('salees',$saleList);
    }
    public function saleAdd(Request $request)
    {
        $sale=new Sale;
        $product=new Product;
        $products=$product->all();
        $employee=new Employee;
        $employees=$employee->all();
        return view('saleAdd', compact('products','employees','sale'));
    }

    public function saleAddSubmit(Request $request)
    {
                try{
                $product= $request['Product'];
                $amount= $request->input('Amount');
                $sum= $request->input('Sum');
                $date= $request->input('Date');
                $employee= $request['Employee'];
                DB::insert('EXEC insert_sale ?, ?, ?, ?, ?', array($product,$sum,$amount,$date,$employee));
                return redirect()->route('alertShow')->with('success','Успешно продано')->withInput();
                 } catch(QueryException $ex) {
                return redirect()->route('alertShow')->withError('Не достаточно продуктов для продажи')->withInput();
                }
    }

    public function saleDelete($ID){
        $sale = DB::delete('EXEC delete_sale ?',array($ID));
        return redirect()->route('saleShow');
    }

    public function saleUpdate($ID){
        $sale=Sale::all();
        $salees=$sale->find($ID);
        $employees = Employee::all();
        $products = Product::all();
        $saleProducts = DB::table('SaleOfProducts')
                        ->join('Product', 'Product.ID', '=', 'SaleOfProducts.Product')
                        ->select('SaleOfProducts.ID','Product.ID', 'Product.Product_name')
                        ->where('SaleOfProducts.ID','=',$ID)
                        ->get(); 
        $saleEmployees = DB::table('SaleOfProducts')
                        ->join('Employee', 'Employee.ID', '=', 'SaleOfProducts.Employee')
                        ->select('SaleOfProducts.ID','Employee.ID', 'Employee.FIO')
                        ->where('SaleOfProducts.ID','=',$ID)
                        ->get();   
        return view('saleUpdate',compact('sale','salees','employees','products','saleProducts','saleEmployees'));
    }
    public function saleUpdateSubmit($ID,Request $request){

        $products = Product::all();
        try{
        $product= (int) $request['Product'];
        $prod=$products->find($product);
        $sum= $request->input('Sum');
        $amount= $request->input('Amount');
        $date= $request->input('Date');
        $employee=$request['Employee'];
        if((float) $prod->Amount < $amount){
            return back()->withError('Не достаточно продуктов для продажи')->withInput();
        }
        DB::insert('EXEC update_sale ?, ?, ?, ?, ?, ?',array($ID,$product,$sum,$amount,$date,$employee,));
        return redirect()->route('saleShow');
        } catch(QueryException $ex) {
            return back()->withError('Не достаточно продуктов для продажи')->withInput();
            }
    }
}
