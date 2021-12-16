@extends('layouts.admin')

@section('content')
<style>
    .cap {
        text-transform: capitalize;
    }

    .up {
        text-transform: uppercase;
    }
</style>
<div class="col-md-12">
    <div class="row user-profile">
        <div class="col-lg-4 side-left d-flex align-items-stretch">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body avatar">
                            <h4 class="card-title">Info</h4>
                            @foreach($data as $row2)
                            <img src="{{ asset('Employee_Photo/' . $row2->image)}}" alt="">
                            <p class="name cap">{{$row2->first_name}} {{$row2->last_name}}</p>
                            <p class="designation">{{$row2->position_title}}</p>
                            <a class="d-block text-center text-dark" href="#">{{$row2->email}}</a>
                            <a class="d-block text-center text-dark" href="#">(0)+93-{{$row2->phone}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 stretch-card">
                    <div class="card">
                        <div class="card-body overview">
                            <ul class="achivements">
                                <li>
                                    <p>34</p>
                                    <p>Projects</p>
                                </li>
                                <li>
                                    <p>23</p>
                                    <p>Task</p>
                                </li>
                                <li>
                                    <p>29</p>
                                    <p>Completed</p>
                                </li>
                            </ul>
                            <div class="wrapper about-user">
                                <h4 class="card-title mt-4 mb-3">About</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam consectetur ex quod.</p>
                            </div>
                            <div class="info-links">
                                <a class="website" href="http://urbanui.com/">
                                    <i class="mdi mdi-earth text-gray"></i>
                                    <span>http://urbanui.com/</span>
                                </a>
                                <a class="social-link" href="#">
                                    <i class="mdi mdi-facebook text-gray"></i>
                                    <span>https://www.facebook.com/johndoe</span>
                                </a>
                                <a class="social-link" href="#">
                                    <i class="mdi mdi-linkedin text-gray"></i>
                                    <span>https://www.linkedin.com/johndoe</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 side-right stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="ml-3">Details</h4>
                    <div class="mt-5">
                        <table class="table">
                            <thead>
                                @foreach($data as $row)
                                <tr>
                                    <th>
                                        Full Name
                                    </th>
                                    <th class="cap">
                                        {{$row->first_name}} {{$row->last_name}}
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        E-Mail
                                    </th>
                                    <th>
                                        {{$row->email}}
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        Gender
                                    </th>
                                    <th class="cap">
                                        {{$row->gender}}
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        Birth-Date
                                    </th>
                                    <th>
                                        {{$row->birth_date}}
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        Address
                                    </th>
                                    <th>
                                        {{$row->address}}
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        Phone
                                    </th>
                                    <th>
                                        {{$row->phone}}
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        Department
                                    </th>
                                    <th>
                                        {{$row->dep_title}}
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        Position
                                    </th>
                                    <th>
                                        {{$row->position_title}}
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        @if(($row->status)=="active") <span class="badge badge-pill badge-success p-2 status up">{{$row->status}}</span> @endif
                                        @if(($row->status)=="leave") <span class="badge badge-pill badge-danger p-2 status up">{{$row->status}}</span> @endif
                                        @if(($row->status)=="busy") <span class="badge badge-pill badge-warning p-2 status up">{{$row->status}}</span> @endif
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        Salary
                                    </th>
                                    <th>
                                        {{$row->salary}}
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        Account-Number
                                    </th>
                                    <th>
                                        {{$row->bank_account_number}}
                                    </th>
                                </tr>
                                @foreach($data2 as $row2)
                                <tr>
                                    <th>
                                        Attachments
                                    </th>
                                    <th>
                                        <a href="/download/{{$row2->id}}" class="btn btn-primary"><i class="fa fa-download"></i>Download</a>
                                    </th>
                                </tr>
                                @endforeach
                                @endforeach
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection