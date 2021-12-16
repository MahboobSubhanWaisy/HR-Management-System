<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
class AccountController extends Controller
{
    public function index()
    {
        $data = Account::all();
        return view('accountpage', compact('data'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'accountNumber' => 'required',
            'description' => 'required'
        ]);

        $account = new Account;
        $account->name = $request->input('name');
        $account->account_number = $request->input('accountNumber');
        $account->description = $request->input('description');

        $account->save();
        return redirect('account');
    }

    public function edit($id)
    {
        $old_data = Account::find($id);
        return $old_data;
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'accountNumber' => 'required',
            'description' => 'required'
        ]);

        $id = $request->input('id');
        $accountUpdate = Account::find($id);
        
        $accountUpdate->name = $request->input('name');
        $accountUpdate->account_number = $request->input('accountNumber');
        $accountUpdate->description = $request->input('description');

        $accountUpdate->save();
        return redirect('account');

    }

    public function destroy($id)
    {
        $accountDelete = Account::find($id);
        $accountDelete->delete();
        return redirect('account');
    }
}
