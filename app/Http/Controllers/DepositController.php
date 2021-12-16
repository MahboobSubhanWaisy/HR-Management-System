<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Deposit;
class DepositController extends Controller
{
    public function index()
    {
        $account_name = Account::select('name')->get();
        $data = Deposit::all();  
        return view('deposit',compact('account_name', 'data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'account_name' => 'required',
            'amount' => 'required',
            'description' => 'required'
        ]);

        $new = new Deposit;
        $new->account_name = $request->input('account_name');
        $new->deposit_amount = $request->input('amount');
        $new->description = $request->input('description');

        $new->save();
        return redirect('deposit');
    }

    public function edit($id)
    {
        $old_data = Deposit::find($id);
        return $old_data;
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'account_name' => 'required',
            'amount' => 'required',
            'description' => 'required'
        ]);

        $id = $request->input('id');
        $depositUpdate = Deposit::find($id);
        
        $depositUpdate->account_name = $request->input('account_name');
        $depositUpdate->deposit_amount = $request->input('amount');
        $depositUpdate->description = $request->input('description');

        $depositUpdate->save();
        return redirect('deposit');

    }

    public function destroy($id)
    {
        $depositDelete = Deposit::find($id);
        $depositDelete->delete();
        return redirect('deposit');
    }
}
