<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Attendance;
class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::select('id','first_name','last_name')->get();
        return view('attendancepage', compact('data'));
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
            'date' => 'required|date|',
            'status' => 'required',
        ]);
        
        $now = $request->input('date');
        $data = Attendance::all()->where('date', '=', $now);
        $number = count($data);
        if($number>0)
        {
            session()->flash('sameDate','Attendance already taken');
        }
        else{
            $employee_id = $request->input('status');
            foreach($employee_id as $key => $value)
            {
                $att = new Attendance;
                $att->status = $value;
                $att->date = $request->input('date');
                $att->emp_id = $key;
                $att->save();
            }
            session()->flash('success', 'Attendance Saved Successfully');          
        }    
        return redirect('attendance');    
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
