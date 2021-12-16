<?php

namespace App\Http\Controllers;
use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $data = Department::all();
        return view('departments', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $dep = new Department;
        $dep->dep_title = $request->input('title');
        $dep->dep_description = $request->input('description');

        $dep->save();
        return redirect('department');
    }

    public function edit($id)
    {
        $old_data = Department::find($id);
        return $old_data;
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $id = $request->input('id');
        $depUpdate = Department::find($id);
        
        $depUpdate->dep_title = $request->input('title');
        $depUpdate->dep_description = $request->input('description');

        $depUpdate->save();
        return redirect('department');

    }

    public function destroy($id)
    {
        $depDelete = Department::find($id);
        $depDelete->delete();
        return redirect('department');
    }
}
