@extends('layouts.admin')

@section('content')

<div class="col-md-12 bg-white p-4">
    <div class="col-md-12 p-0">
        <div>
            <h4>Report Page</h4>
        </div>
        <div class="col-md-12 p-0 mt-5">
            <form action="{{action('ReportController@store')}}" method="POST">
            @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-center">
                            <label>Employee Name</label>
                        </div>
                        <select name="emp_id" class="form-control mt-2" style="text-transform:capitalize;">
                        @if(isset($data))
                            @foreach($data as $row)
                                <option value="{{$row->id}}">{{$row->first_name}} {{$row->last_name}}</option>
                            @endforeach
                        @endif
                        </select>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <label>From ...</label>
                        </div>
                        <input type="date" name="from" class="form-control mt-2" min="2020-01-01">
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <label>To ...</label>
                        </div>
                        <input type="date" name="to" class="form-control mt-2" min="2020-01-01">
                    </div>
                </div>
                <div class="col-md-12 p-0 mt-4">
                    <input type="submit" value="Show Report" class="btn btn-primary col-md-4 offset-4">
                </div>
            </form>
        </div>
    </div>

    @if(isset($report))
    <div class="mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($report as $show)
                <tr>
                    <td>{{$show->first_name}} {{$show->last_name}}</td>
                    <td>{{$show->status}}</td>
                    <td>{{$show->date}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>




@endsection