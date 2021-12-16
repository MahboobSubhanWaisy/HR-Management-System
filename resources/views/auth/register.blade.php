@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-body">
        <h3 class="card-title">User Registration</h3>
        <form class="forms-sample mt-4" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group mb-4">
                <label for="exampleInputName1">Name</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="exampleInputEmail1">E-Mail address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail Address">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="form-group mb-4">
                <label for="exampleInputPassword1">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
            </div>

            <div class="form-group row ml-1">
                <div class="form-radio form-radio-flat">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="role" value="admin"  checked>
                        ADMIN
                    </label>
                </div>
                <div class="form-radio form-radio-flat ml-3">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="role" value="supervisor" >
                        SUPERVISOR
                    </label>
                </div>
                <div class="form-radio form-radio-flat ml-3">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="role" value="user">
                        USER
                    </label>
                </div>
            </div>
            <div class="p-0 col-md-2 mt-3">
                <button type="submit" class="btn btn-block btn-success btn-lg font-weight-medium">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection