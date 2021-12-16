@extends('layouts.admin')
@section('content')
<div class="col-md-12 bg-white p-4">
    <div>
        <h4>Update Attendance</h4>
    </div>
        @if(session()->has('Update'))
        <div class="alert alert-success mb-1 mt-3">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session()->get('Update')}}
        </div>
        @endif
        <form action="{{action('AttendanceUpdateController@store')}}" method="POST">
        @csrf
            <div class="row mt-5">
                <div class="col-md-2">
                    <label for="">Select Date Here</label>
                </div>
                <div class="col-md-4">
                    <input type="date" name="date" class="form-control" min="2020-06-01" id="today">
                </div>
                <div class="col-md-4">
                    <input type="submit" value="Show Attendance" class="btn btn-primary col-md-6">
                </div>
            </div>
        </form>
        <div class="mt-5">
        @if(isset($data))
            @if(count($data) == 0)
                <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    No records yet..!
                </div>
        @else
            <form action="{{action('attupdateController@update')}}" method="POST">
                @csrf
                @method('PUT')
                <table id="order-listing" class="table">
                    <thead>
                        <tr>
                            <th>EMPLOYEE</th>
                            <th>PRESENT</th>
                            <th>ABSENT</th>
                            <th>OFF</th>
                            <th>LEAVE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                        <tr>
                            <td style="text-transform:capitalize;">
                                {{$row->first_name}} {{$row->last_name}}
                            </td>
                            <td>
                                <div class="form-radio form-radio-flat mt-0 ml-2 pb-2">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status[{{$row->id}}]"  value="present" @if($row->status=='present') checked @endif>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-radio form-radio-flat mt-0 ml-2 pb-2">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status[{{$row->id}}]" value="absent" @if($row->status=='absent') checked @endif>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-radio form-radio-flat mt-0 ml-2 pb-2">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status[{{$row->id}}]" value="off" @if($row->status=='off') checked @endif>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-radio form-radio-flat mt-0 ml-2 pb-2">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status[{{$row->id}}]" value="leave" @if($row->status=='leave') checked @endif>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                <div class="form-group mt-5 col-md-12">
                    <input type="submit" value="Update Attendance" class="btn btn-primary col-md-3">
                </div>
                @endif
                @endif
        </div>
</div>

<script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd;
    }
    if(mm<10){
        mm='0'+mm;
    }
    today = yyyy+'-'+mm+'-'+dd;
    document.getElementById('today').setAttribute("max", today);
</script>
@endsection