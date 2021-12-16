@extends('layouts.admin')

@section('content')

<div class="col-md-12 bg-white p-3">
<h3 class="bg-primary p-2 text-white text-center">Users Page</h3>
<br>
    <table id="order-listing" class="table">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Name</th>
                <th class="text-center">E-Mail Address</th>
                <th class="text-center">User_Type</th>
                <th class="text-center">Created-At</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0; ?>
            @foreach($data as $key)
            <?php $i++; ?>
            <tr>
                <td class="text-center"><?php echo $i; ?></td>
                <td class="text-center">{{ $key->name }}</td>
                <td class="text-center">{{ $key->email }}</td>
                <td class="text-center">{{ $key->role }}</td>
                <td class="text-center">{{ $key->created_at }}</td>
                <td class="text-center">
                    <a href=""><span class="fa fa-trash"></span></a>
                    <a href="" style="font-size: 17px;" data-toggle="modal" data-target="#exampleModal"><span class="fa fa-edit"></span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>



    <div class="col-12 grid-margin">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                        <form action="" method="">
                            @csrf
                            <div class="row">
                                <div class="form-group row col-md-6">
                                    <label for="" class="col-form-label col-md-3">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row col-md-6">
                                    <label for="" class="col-form-label col-md-3">E-Mail Address</label>
                                    <div class="col-md-9">
                                        <input type="text" name="email" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row col-md-6">
                                    <label for="" class="col-form-label col-md-3">Password</label>
                                    <div class="col-md-9">
                                        <input type="text" name="password" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row col-md-6">
                                    <label for="" class="col-form-label col-md-3">Confirm Password</label>
                                    <div class="col-md-9">
                                        <input type="text" name="confPassword" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-left: 150px;">
                                    <div class="form-radio form-radio-flat">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="role" value="admin" checked>
                                            ADMIN
                                        </label>
                                    </div>
                                    <div class="form-radio form-radio-flat ml-3">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="role" value="supervisor">
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
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Ends -->
    </div>
</div>
</div>
</div>
@endsection