<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalaryPayment;
use App\Employee;
use App\Budget;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
class SalaryPaymentController extends Controller
{
    public function salaryPaymentShow()
    {
        $salaryPaymentList=DB::table('SalaryPayment')
                        ->join('Employee', 'Employee.ID', '=', 'SalaryPayment.Employee')
                        ->select('SalaryPayment.ID', 'Employee.FIO','SalaryPayment.Salary','SalaryPayment.Bonus','SalaryPayment.Date')
                        ->get();
        return view('salaryPaymentShow')->with('salaries',$salaryPaymentList);
    }
    public function salaryPaymentAdd(){
        $salary= new SalaryPayment;
        $employee = new Employee;
        $employees= $employee->all();
        return view('salaryPaymentAdd')->with('employees',$employees);
    }
    public function salaryPaymentAddSubmit(Request $request){

        try{
        $employee= $request['Employee'];
        $employees= (int) $employee;
        $sal = $request->input('Salary');
        $salary = (int) $sal;
        $bonus= $request->input('Bonus');
        $bon=(float) $bonus;
        $date= $request->input('Date');
        DB::insert('EXEC insert_salary ?, ?, ?, ?',array($employees,$salary,$bon,$date));
        return redirect()->route('salaryPaymentAdd');
        } catch(QueryException $ex) {
            return back()->withError('Недостаточно денег в бюджете')->withInput();
        }
    }

    public function salaryPaymentUpdate($ID){
        $salary=SalaryPayment::all();
        $salaries=$salary->find($ID);
        $employees = Employee::all();
        $employeeLists=DB::table('SalaryPayment')
                        ->join('Employee', 'Employee.ID', '=', 'SalaryPayment.Employee')
                        ->select('SalaryPayment.ID','Employee.ID', 'Employee.FIO','SalaryPayment.Salary','SalaryPayment.Bonus','SalaryPayment.Date')
                        ->where('SalaryPayment.ID','=',$ID)
                        ->get();       
        return view('salaryPaymentUpdate',compact('salaries','employees','employeeLists'));
    }

    public function salaryPaymentUpdateSubmit($ID,Request $request){
        $bud=Budget::all();
        $budget=$bud->find(1);
        $budgetSum=(float) $budget->Sum;
        try{
        $employee= $request['Employee'];
        $employees= (int) $employee;
        $sal =  $request->input('Salary');
        $salary = (float) $sal;
        $bonus= $request->input('Bonus');
        $bon=(float) $bonus;
        $date= $request->input('Date');
        if($budgetSum<$salary+$bon){
            return back()->withError('Недостаточно денег в бюджете')->withInput();
        }else{
        DB::insert('EXEC update_salary ?, ?, ?, ?, ?',array($ID,$employees,$salary,$bon,$date));
        return redirect()->route('salaryPaymentShow');
        }
        } catch(QueryException $ex){
            return back()->withError('Недостаточно денег в бюджете')->withInput();
        }
    }
    public function salaryPaymentDelete($ID){
        $salary = DB::delete('EXEC delete_salary ?',array($ID));
        return redirect()->route('salaryPaymentShow');
    }

}
