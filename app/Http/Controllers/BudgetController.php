<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Budget;
class BudgetController extends Controller
{
    public function budgetShow(){
        $budget = new Budget;
        $budgets = $budget->all();
        return view('budgetShow')->with('budgets',$budgets);
    }
}
