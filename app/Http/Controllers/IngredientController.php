<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredient;
use App\Product;
use App\Raw;
use Illuminate\Support\Facades\DB;
class IngredientController extends Controller
{
    public function ingredientShow(){
        $ingredients = DB::table('Ingredient')
                        ->join('Product', 'Product.ID', '=', 'Ingredient.Product ')
                        ->join('Raws', 'Raws.ID', '=', 'Ingredient.Raw ')
                        ->select('Ingredient.ID', 'Product.Product_name', 'Raws.Raw_name', 'Ingredient.Amount')
                        ->get();
        return view('ingredientShow')->with('ingredients',$ingredients);
    }
    public function ingredientAdd(Request $request)
    {
        $ingredinet=new Ingredient;
        $raw=new Raw;
        $raws=$raw->all();
        $product=new Product;
        $products=$product->all();
        return view('ingredientAdd', compact('raws','products'));
    }
    public function ingredientAddSubmit(Request $request)
    {
        
        $product= $request['Product'];
        $raw= $request['Raw'];
        $amount= $request->input('Amount');
        DB::insert('EXEC insert_ingredient ?, ?, ? ',array($product,$raw,$amount));
        return redirect()->route('ingredientAdd');
    }

    public function ingredientDelete($ID){
        $ingredinet = DB::delete('EXEC delete_ingredeint ?',array($ID));
        return redirect()->route('ingredientShow');
    }

    public function ingredientUpdate($ID){
        $ingredient=Ingredient::all();
        $ingredients=$ingredient->find($ID);
        $products = Raw::all();
        $raws = Raw::all();
        $ingredientProducts = DB::table('Ingredient')
                        ->join('Product', 'Product.ID', '=', 'Ingredient.Product ')
                        ->select('Ingredient.ID','Product.ID', 'Product.Product_name', 'Ingredient.Amount')
                        ->where('Ingredient.ID','=',$ID)
                        ->get(); 
        $ingredientRaws = DB::table('Ingredient')
                        ->join('Raws', 'Raws.ID', '=', 'Ingredient.Raw ')
                        ->select('Ingredient.ID','Raws.ID', 'Raws.Raw_name', 'Ingredient.Amount')
                        ->where('Ingredient.ID','=',$ID)
                        ->get();   
        return view('ingredientUpdate',compact('ingredients','products','raws','ingredientProducts','ingredientRaws'));
    }

    public function ingredientUpdateSubmit($ID,Request $request){
        $product= $request['Product'];
        $raw= $request['Raw'];
        $amount= $request->input('Amount');
        DB::insert('EXEC update_ingredient ?, ?, ?, ?',array($ID,$product,$raw,$amount));
        return redirect()->route('ingredientShow');
    }
}
