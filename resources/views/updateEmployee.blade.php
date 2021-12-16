@extends('layouts.admin')

@section('content')

<div class="col-md-12 bg-white p-4">
    <h4>Add Employee</h4>
    <br><br>
    @foreach($old_data as $old_data)
    <form action="{{action('AllEmployeeController@update', $old_data->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col-md-6">
                <label for="">First Name</label>
                <input type="text" name="firstname" class="form-control" value="{{$old_data->first_name}}">
            </div>
            <div class="form-group col-md-6">
                <label for="">Last Name</label>
                <input type="text" name="lastname" class="form-control" value="{{$old_data->last_name}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="">Birth Date</label>
                <input type="text" name="birthDate" class="form-control" value="{{$old_data->birth_date}}">
            </div>
            <div class="form-group col-md-6">
                <label for="">Gender</label>
                <select name="gender" class="form-control">
                    <option hidden>Select your gender</option>
                    <option value="male" @if(($old_data->gender)=="male") selected @endif >Male</option>
                    <option value="female" @if(($old_data->gender)=="female") selected @endif>Female</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="">E-Mail Address</label>
                <input type="text" name="email" class="form-control" value="{{$old_data->email}}">
            </div>
            <div class="form-group col-md-6">
                <label for="">Phone_No</label>
                <input type="text" name="phone" class="form-control" value="{{$old_data->phone}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control" value="{{$old_data->address}}">
            </div>
            <div class="form-group col-md-6">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
            <label for="">Status</label>
                <select name="status" class="form-control">
                    <option selected hidden>Select Employee Status</option>
                    <option value="active" @if(($old_data->status)=="active") selected @endif>Active</option>
                    <option value="busy" @if(($old_data->status)=="busy") selected @endif>Busy</option>
                    <option value="leave" @if(($old_data->status)=="leave") selected @endif>Leave</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="">Department</label>
                <select name="department" class="form-control">
                    <option value="{{ $old_data->dep_id }}" selected>{{ $old_data->dep_title }}</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
            <label for="">Position</label>
                <select name="position" class="form-control">
                    <option value="{{ $old_data->posi_id }}" selected> {{$old_data->position_title}} </option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="">Salary</label>
                <input type="text" name="salary" class="form-control" value="{{$old_data->salary}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="">Account_Number</label>
                <input type="text" name="account_number" class="form-control" value="{{$old_data->bank_account_number}}">
            </div>
        </div>
        @endforeach
        <div class="form-group">
            <input type="submit" value="Update" class="btn btn-success col-md-2 btn-lg">
        </div>
    </form>
</div>

@endsection