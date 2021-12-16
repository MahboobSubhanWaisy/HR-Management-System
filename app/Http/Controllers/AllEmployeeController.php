<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\position;
use App\Department;
use App\Employee;
use DB;
class AllEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::all();
        return view('allemployees', compact('data'));
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
        //
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
        // $old_data = Employee::find($id);
        // $posi = position::all();
        // $dep = Department::all();
        // return view('updateEmployee', compact('old_data','posi','dep', 'id'));
        $old_data = DB::table('employee')
        ->join('position', 'position.posi_id', '=', 'employee.position_id')
        ->join('department', 'department.dep_id', '=', 'employee.department_id')
        ->select(
            'employee.id',
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
            'position.posi_id',
            'position.position_title', 
            'department.dep_id',
            'department.dep_title'
            )
            ->where('employee.id', '=', $id)
        ->get();
        // print_r($old_data);
        return view('updateEmployee', compact('old_data'));
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
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'birthDate' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
            'salary' => 'required',
            'account_number' => 'required',
            'department' => 'required',
            'position' => 'required'
        ]);

        $new_data = Employee::find($id);
        $image_path = $new_data->image;
        if($request->file('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            unlink('Employee_Photo'.'/'.$image_path);
            $file->move('Employee_Photo', $fileName);
        }
        else
        {
            $fileName = $image_path;
        }

        $new_data->first_name = $request->input('firstname');
        $new_data->last_name = $request->input('lastname');
        $new_data->gender = $request->input('gender');
        $new_data->birth_date = $request->input('birthDate');
        $new_data->email = $request->input('email');
        $new_data->phone = $request->input('phone');
        $new_data->address = $request->input('address');
        $new_data->image = $fileName;
        $new_data->status = $request->input('status');
        $new_data->salary = $request->input('salary');
        $new_data->bank_account_number = $request->input('account_number');
        $new_data->position_id = $request->input('position');
        $new_data->department_id = $request->input('department');

        $new_data->save();
        return redirect('allemployee');
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
        $del = Employee::find($id);
        $file_path = $del->image;
        unlink('Employee_Photo'.'/'.$file_path);
        $del -> delete();
        return redirect('allemployee');
    }
}
