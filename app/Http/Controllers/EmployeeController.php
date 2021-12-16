<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\position;
use App\Department;
use App\Employee;
use App\Attachement;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posi = position::all();
        $dep = Department::all();
        return view('employees', compact('posi','dep'));
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
            'position' => 'required',
            'department' => 'required'
        ]);
        
        

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . '.' . $extension;
        $file->move('Employee_Photo', $fileName);
        

        $emp = new Employee;
        $emp->first_name = $request->input('firstname');
        $emp->last_name = $request->input('lastname');
        $emp->gender = $request->input('gender');
        $emp->birth_date = $request->input('birthDate');
        $emp->email = $request->input('email');
        $emp->phone = $request->input('phone');
        $emp->address = $request->input('address');
        $emp->image = $fileName;
        $emp->status = $request->input('status');
        $emp->salary = $request->input('salary');
        $emp->bank_account_number = $request->input('account_number');
        $emp->position_id = $request->input('position');
        $emp->department_id = $request->input('department');
        
        $emp->save();
        $emp_id = $emp->id;

        if($request->hasFile('file'))
        {
            $image_array = $request->file('file');
            $array_len = count($image_array);

            for($i=0; $i < $array_len; $i++)
            {
                $image_name = $image_array[$i]->getClientOriginalExtension();
                $fileName = rand(123456, 999999) . '.' . $image_name;
                $image_array[$i]->move('Employee_Attachment', $fileName);
                
                $attach = new Attachement;
                $attach->file_name = $fileName;
                $attach->emp_id = $emp_id;
                $attach->save();
            }
        }
        return redirect('allemployee');
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
