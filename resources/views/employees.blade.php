@extends('layouts.admin')

@section('content')

<div class="col-md-12 bg-white p-4">
    <h4>Add Employee</h4>
    <br><br>
    <form action="{{ action('EmployeeController@store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label for="">First Name</label>
                <input type="text" name="firstname" class="form-control" placeholder="Enter here...">
            </div>
            <div class="form-group col-md-6">
                <label for="">Last Name</label>
                <input type="text" name="lastname" class="form-control" placeholder="Enter here...">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="">Birth Date</label>
                <input type="text" name="birthDate" class="form-control" placeholder="Enter here...">
            </div>
            <div class="form-group col-md-6">
                <label for="">Gender</label>
                <select name="gender" class="form-control">
                    <option hidden>Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="">E-Mail Address</label>
                <input type="text" name="email" class="form-control" placeholder="Enter here...">
            </div>
            <div class="form-group col-md-6">
                <label for="">Phone_No</label>
                <input type="text" name="phone" class="form-control" placeholder="Enter here...">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control" placeholder="Enter here...">
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
                    <option value="active">Active</option>
                    <option value="busy">Busy</option>
                    <option value="leave">Leave</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="">Department</label>
                <select name="department" class="form-control">
                @foreach($dep as $department)
                    <option selected hidden>Select Employee Department</option>
                    <option value="{{ $department->dep_id }}">{{ $department->dep_title }}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="row">
        <div class="form-group col-md-6">
            <label for="">Position</label>
                <select name="position" class="form-control">
                    @foreach($posi as $position)
                    <option selected hidden>Select Employee Position</option>
                    <option value="{{ $position->posi_id }}"> {{$position->position_title}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="">Salary</label>
                <input type="text" name="salary" class="form-control" placeholder="Enter here...">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="">Account-Number</label>
                <input type="text" name="account_number" class="form-control" placeholder="Enter here...">
            </div>
        </div>
        <div class="col-md-12 p-0">
            <table class="table" id="table_feild">
                <tr>
                    <td colspan="2">Attachments</td>
                </tr>
                <tr>
                    <td>
                        <input type="file" name="file[]" class="form-control">
                    </td>
                    <td class="text-center">
                        <input type="button" name="add" value="Add More" id="add" class="btn btn-primary">
                    </td>
                </tr>
            </table>
        </div>
        <div class="form-group">
            <input type="submit" value="Add Employee" class="btn btn-primary sub">
        </div>
    </form>
</div>


<script text="text/javascript" src="{{asset('data/jquery-3.4.1.js')}}"></script>

<script>
    $(document).ready(function(){
        var y = '<tr><td><input type="file" name="file[]" class="form-control"></td><td class="text-center"><input type="button" name="remove" value="Remove" id="remove" class="btn btn-danger"></td></tr>'
        
        var x = 1;
        $('#add').click(function(){
            $('#table_feild').append(y);
        });

        $('#table_feild').on('click', '#remove', function(){
            $(this).closest('tr').remove();
        });
    
    });
</script>
@endsection