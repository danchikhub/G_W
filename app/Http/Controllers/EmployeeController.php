<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Post;
use Illuminate\Support\Facades\DB;
class EmployeeController extends Controller
{
    public function employeeShow()
    {
        $employeeList=DB::table('Employee')
                        ->join('Posts', 'Posts.ID', '=', 'Employee.Post ')
                        ->select('Employee.ID', 'Employee.FIO', 'Posts.Post','Employee.Salary','Employee.Address','Employee.Telephone','Employee.Bonus')
                        ->get();
        return view('employeeview')->with('employees',$employeeList);
    }

    public function employeeAdd(Request $request)
    {
        $employee=new Employee;
        $post=new Post;
        $posts=$post->all();
        return view('employeeAddView')->with('posts',$posts);
    }

    public function employeeAddSubmit(Request $request)
    {
        $name= $request->input('FIO');
        $post= $request['Post'];
        $salary= $request->input('Salary');
        $address= $request->input('Address');
        $phone= $request->input('Phone');
        DB::insert('EXEC insert_employee ?, ?, ?, ?, ?',array($name,$post,$salary,$address,$phone,));
        return redirect()->route('employeeAdd');
    }

    public function employeeDelete($ID){
        $employee = DB::delete('EXEC delete_employee ?',array($ID));
        return redirect()->route('employeeShow');
    }

    public function employeeUpdate($ID){
        $employee=Employee::all();
        $employees=$employee->find($ID);
        $posts = Post::all();
        $employeeLists=DB::table('Employee')
                        ->join('Posts', 'Posts.ID', '=', 'Employee.Post ')
                        ->select('Employee.ID', 'Employee.FIO', 'Posts.ID', 'Posts.Post','Employee.Salary','Employee.Address','Employee.Telephone')
                        ->where('Employee.ID','=',$ID)
                        ->get();       
        return view('employeeUpdate',compact('employees','posts','employeeLists'));
    }

    public function employeeUpdateSubmit($ID,Request $request){
        $name= $request->input('FIO');
        $post= $request['Post'];
        $salary= $request->input('Salary');
        $address= $request->input('Address');
        $phone= $request->input('Phone');
        DB::insert('EXEC update_employee ?, ?, ?, ?, ?, ?',array($ID,$name,$post,$salary,$address,$phone,));
        return redirect()->route('employeeShow');
    }

    public function findSalary(Request $request){
            //$id=34;
            $emp = Employee::select('Salary')->where('ID',$request->id)->first();
            // var_dump($emp);
            // die();
            return response()->json($emp);
    }
    public function findBonus(Request $request){
        //$id=34;
        $empl = Employee::select('Bonus')->where('ID',$request->id)->first();
        // var_dump($emp);
        // die();
        return response()->json($empl);
}
}
