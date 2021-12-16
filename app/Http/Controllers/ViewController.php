<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Attachement;
class ViewController extends Controller
{
    public function show($id)
    {
        // $data = Employee::find($id);
        // return view('viewEmployee', compact('data'));

        $data = DB::table('employee')
        ->join('position', 'position.posi_id', '=', 'employee.position_id')
        ->join('department', 'department.dep_id', '=', 'employee.department_id')
        ->select(
            'employee.first_name',
            'employee.last_name',
            'employee.gender',
            'employee.birth_date',
            'employee.email',
            'employee.phone',
            'employee.address',
            'employee.image',
            'employee.status',
            'employee.salary',
            'employee.bank_account_number',
            'position.position_title', 
            'department.dep_title'
            )
            ->where('employee.id', '=', $id)
        ->get();
        // print_r($data);
        $data2 = DB::table('employee')
        ->join('employee_attachment', 'employee_attachment.emp_id', '=', 'employee.id')
        ->select('employee_attachment.*')
        ->where('employee_attachment.emp_id', '=', $id)
        ->get();
        return view('viewEmployee', compact('data','data2'));
    }
}
