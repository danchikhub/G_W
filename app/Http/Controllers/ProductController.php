<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;
use App\Unit;
class ProductController extends Controller
{
    public function productShow()
    {
        $productList=DB::table('Product')
                        ->join('Units', 'Units.ID', '=', 'Product.Unit ')
                        ->select('Product.ID', 'Product.Product_name', 'Units.Unit','Product.Sum','Product.Amount','Product.ProductCostPrice')
                        ->get();
        return view('productShow')->with('products',$productList);
    }
    public function productAdd(Request $request)
    {
        $product=new Product;
        $unit=new Unit;
        $units=$unit->all();
        return view('productAdd')->with('units',$units);
    }
    public function productAddSubmit(Request $request)
    {
        $name= $request->input('name');
        $unit= $request['Unit'];
        $sum= $request->input('Sum');
        $amount= $request->input('Amount');
        DB::insert('EXEC insert_product ?, ?, ?, ? ',array($name,$unit,$sum,$amount));
        return redirect()->route('productAdd');
    }

    public function productDelete($ID){
        $product = DB::delete('EXEC delete_product ?',array($ID));
        return redirect()->route('productShow');
    }

    public function productUpdate($ID){
        $product=Product::all();
        $products=$product->find($ID);
        $units = Unit::all();
        $productLists=DB::table('Product')
                                ->join('Units', 'Units.ID', '=', 'Product.Unit ')
                                ->select('Product.ID', 'Product.Product_name','Units.ID', 'Units.Unit','Product.Sum','Product.Amount','Product.ProductCostPrice')
                                ->get();     
        return view('productUpdate',compact('products','units','productLists'));
    }

    public function productUpdateSubmit($ID,Request $request){
        $name= $request->input('name');
        $unit= $request['Unit'];
        $sum= $request->input('Sum');
        $amount= $request->input('Amount');
        DB::insert('EXEC update_product ?, ?, ?, ?, ? ',array($ID,$name,$unit,$sum,$amount));
        return redirect()->route('productShow');
    }

}