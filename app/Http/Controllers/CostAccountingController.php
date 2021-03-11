<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Expenses;
use Illuminate\Support\Facades\DB;
use App\Budget;
use App\CostAccounting;
use App\Sale;
class CostAccountingController extends Controller
{
    public function costAccountingShow(){
        $costAccountingList=DB::table('costAccounting')
                        ->join('Expenses', 'Expenses.ID', '=', 'costAccounting.expenses')
                        ->join('Employee', 'Employee.ID', '=', 'costAccounting.employee')
                        ->select('costAccounting.ID', 'Expenses.nameExpense', 'costAccounting.expensesSum','costAccounting.Date','Employee.FIO')
                        ->get();
        return view('expensesShow')->with('expenses',$costAccountingList);
    }
    public function costAccountingAdd(Request $request)
    {
        $costAccounting=new CostAccounting;
        $expense=new Expenses;
        $expenses=$expense->all();
        $employee=new Employee;
        $employees=$employee->all();
        return view('expensesAdd', compact('expenses','employees','costAccounting'));
    }
    public function costAccountingAddSubmit(Request $request)
    {
        try{
        $expense= $request['Expense'];
        $sum= $request->input('Sum');
        $date= $request->input('Date');
        $employee= $request['Employee'];
        DB::insert('EXEC insert_expense ?, ?, ?, ?',array($expense,$sum,$date,$employee));
        return redirect()->route('expensesAdd')->with('success','Success');
        } catch(QueryException $ex) {
            return back()->withError('Недостаточно денег в бюджете')->withInput();
        }
        
    }

    public function costAccountingDelete($ID){
        $expenses = DB::delete('EXEC delete_expense ?',array($ID));
        return redirect()->route('expensesShow');
    }


    public function findSum(Request $request ){
        
        if($request->id == 2){
        $emp = DB::table('Employee')
                    ->select(DB::raw('count(Employee.FIO) * 30 as Sum'))
                    ->get()->first();
        //  var_dump($emp);
        //  die();
        return response()->json($emp);
        }else if($request->id == 1){
            $emp = DB::table('SaleOfProducts')
                    ->select(DB::raw('SUM(SaleOfProducts.Sum) * 13 / 100 as Sum'))
                    ->get()->first();
                    return response()->json($emp);
        }

    }

    public function costAccountingUpdate($ID){
        $exp=CostAccounting::all();
        $exps=$exp->find($ID);
        $employees = Employee::all();
        $expenses = Expenses::all();
        $expExpenses = DB::table('costAccounting')
                            ->join('Expenses', 'Expenses.ID', '=', 'costAccounting.expenses')
                             ->select('costAccounting.ID','Expenses.ID', 'Expenses.nameExpense')
                            ->where('costAccounting.ID','=',$ID)
                            ->get(); 
        $expEmployees = DB::table('costAccounting')
                        ->join('Employee', 'Employee.ID', '=', 'costAccounting.employee')
                        ->select('costAccounting.ID','Employee.ID', 'Employee.FIO')
                        ->where('costAccounting.ID','=',$ID)
                        ->get();   
        return view('expenseUpdate',compact('exps','exp','expenses','employees','expExpenses','expEmployees'));
    }
    public function costAccountingUpdateSubmit($ID,Request $request){
        $bud=Budget::all();
        $budget=$bud->find(1);
        $budgetSum=(float) $budget->Sum;
        
            $expense= $request['Expense'];
            $sum= $request->input('Sum');
            $date= $request->input('Date');
            $employee= $request['Employee'];

        DB::insert('EXEC update_expense ?, ?, ?, ?, ?',array($ID,$expense,$sum,$date,$employee,));
        return redirect()->route('expensesShow');
    
   
    }
}
