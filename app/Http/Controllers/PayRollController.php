<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\PayRoll;
use App\Employee;

class PayRollController extends Controller
{
    public function index()
    {
        $emp = Employee::select('first_name','last_name','bank_account_number')->get();
        $payroll = PayRoll::all();
        return view('payRoll', compact('payroll','emp'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'empName' => 'required',
            'monthly' => 'required'
        ]);
        
        $name = $request->input('empName');
        $sala = DB::table('employee')->where('first_name', '=', $name)->pluck('salary');
        
        foreach($sala as $salary_tax){
            if($salary_tax == 5000){
                $salary_after_tax = $salary_tax;
            }
            else if($salary_tax >= 5001 && $salary_tax <= 12500){
                $tax = $salary_tax * 0.02;
                $salary_after_tax = $salary_tax - $tax;
            }
            else if($salary_tax >= 12501 && $salary_tax <= 100000){
                $tax = $salary_tax * 0.1;
                $salary_after_tax = $salary_tax - $tax;
            }
            else if($salary_tax >= 100001){
                $tax = $salary_tax * 0.2;
                $salary_after_tax = $salary_tax - $tax;
            }
        }
        
        $payroll = new PayRoll;
        $payroll->employee_name = $name;
        $account = DB::table('employee')->where('first_name', '=', $name)->pluck('bank_account_number');
        foreach($account as $number){
            $payroll->account_number = $number;
        }
        $payroll->salary = $salary_after_tax;
        $payroll->month = $request->input('monthly');

        $payroll->save();
        return redirect('/pay');
    }
}
