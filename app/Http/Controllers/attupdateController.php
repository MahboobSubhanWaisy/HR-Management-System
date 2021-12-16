<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
class attupdateController extends Controller
{
    public function update(Request $request)
    {
        $att_id = $request->input('status');
        foreach($att_id as $key => $value)
        {
            $att = Attendance::find($key);
            $att->status = $value;
            $att->save();
        }
        session()->flash('Update','Attendance Updated Successfully');
        return redirect('updateAttendance');
    }
}
