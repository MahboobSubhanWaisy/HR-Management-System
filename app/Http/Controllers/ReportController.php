<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Attendance;
use DB;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::select('id','first_name','last_name')->get();
        return view('attendanceReport', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'emp_id' => 'required',
            'from' => 'required|date|',
            'to' => 'required|date|'
        ]);

        $emp_id = $request->input('emp_id');
        $from = $request->input('from');
        $to = $request->input('to');
        $report = DB::table('attendance')
        ->join('employee','employee.id','=','attendance.emp_id')
        ->select(
            'employee.first_name',
            'employee.last_name',
            'attendance.date',
            'attendance.status'
        )
        ->where('employee.id','=',$emp_id)->where('attendance.date','>=',$from)->where('attendance.date','<=',$to)
        ->get();
        return view('attendanceReport', compact('report'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
