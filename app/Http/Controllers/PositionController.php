<?php

namespace App\Http\Controllers;
use App\position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $data = position::all();
        return view('positions', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $pos = new position;
        $pos->position_title = $request->input('title');
        $pos->position_description = $request->input('description');

        $pos->save();
        return redirect('position');
    }

    public function edit($id)
    {
        $old_data = position::find($id);
        return $old_data;
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $id = $request->input('id');
        $posUpdate = position::find($id);
        
        $posUpdate->position_title = $request->input('title');
        $posUpdate->position_description = $request->input('description');

        $posUpdate->save();
        return redirect('position');

    }

    public function destroy($id)
    {
        $posDelete = position::find($id);
        $posDelete->delete();
        return redirect('position');
    }
}
