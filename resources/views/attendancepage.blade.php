@extends('layouts.admin')
@section('content')
<div class="col-md-12 bg-white p-4">
    <div>
        <div>
            <h4>Attendance</h4>
        </div>
        @if(session()->has('sameDate'))
        <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session()->get('sameDate')}}
        </div>
        @endif
        @if(session()->has('success'))
        <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session()->get('success')}}
        </div>
        @endif
        <!-- <div class="bg-dark col-md-12">
        <div class="float-right">
            <input type="date" class="form-control">
        </div>
    </div> -->
        <div class="mt-5">
            <form action="{{action('AttendanceController@store')}}" method="POST">
                @csrf
                <div class="col-md-4 p-0 float-right">
                    <input type="date" name="date" class="form-control" min="2020-01-01" id="today">
                </div>
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
                            <td style="text-transform: capitalize;">
                                {{$row->first_name}} {{$row->last_name}}
                            </td>
                            <td>
                                <div class="form-radio form-radio-flat mt-0 ml-2 pb-2">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status[{{$row->id}}]" value="present">
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-radio form-radio-flat mt-0 ml-2 pb-2">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status[{{$row->id}}]" value="absent">
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-radio form-radio-flat mt-0 ml-2 pb-2">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status[{{$row->id}}]" value="off">
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-radio form-radio-flat mt-0 ml-2 pb-2">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status[{{$row->id}}]" value="leave">
                                    </label>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-md-4 p-0 mt-4 offset-4">
                    <input type="submit" class="btn btn-primary col-md-12">
                </div>
            </form>
        </div>
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