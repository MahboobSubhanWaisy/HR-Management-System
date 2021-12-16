@extends('layouts.admin')
@section('content')

<div class="col-md-12 bg-white p-4">
    <h3 class="bg-primary p-2 text-white text-center">Deposit Page</h3>
    <br>
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal"><span class="icon-plus">&nbsp;</span>Add Deposit</button>
    <br><br>
    <div class="modal fade" id="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-white">
                    <h3 class="text-primary">Add Deposit</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addform">
                    @csrf
                    <div class="modal-body bg-white">
                        <div class="form-group">
                            <label for="">Account-Name</label>
                            <select name="account_name" class="form-control">
                                @foreach($account_name as $names)
                                <option value="{{$names->name}}">{{$names->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Deposit Amount</label>
                            <input type="text" name="amount" class="form-control" placeholder="Enter Here...">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" name="description" class="form-control" placeholder="Enter Here...">
                        </div>
                    </div>
                    <div class="modal-footer bg-white">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    
    <div class="col-md-12 p-0" id="table">
        <table id="order-listing" class="table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Account Name</th>
                    <th class="text-center">Deposit Amount</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=0; ?>
                @foreach($data as $row)
                <?php $i++; ?>
                <tr>
                    <td class="text-center"><?php echo $i; ?></td>
                    <td class="text-center" style="text-transform:capitalize;">{{ $row->account_name }}</td>
                    <td class="text-center">{{ $row->deposit_amount }}</td>
                    <td class="text-center">{{ $row->description }}</td>
                    <td class="text-center">
                        <a href="#" class="edit" id="{{ $row->id }}"><span class="icon-note text-primary" style="font-size: 17px;"></span></a>
                    </td>
                    <td class="text-center">
                        <a href="#" class="delete" data-id="{{ $row->id }}"><span class="icon-close text-danger" style="font-size: 18px;"></span></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!--------------- Edit Model -------------->

        <div class="modal fade" id="editmodal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-white">
                        <h3 class="text-success">Update Department</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="editform">
                        @csrf
                        @method('PUT')
                        <div class="modal-body bg-white">
                            <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="">Account Name</label>
                            <input type="text" name="account_name" id="account_name" class="form-control" placeholder="Enter Here...">
                        </div>
                        <div class="form-group">
                            <label for="">Deposit Amount</label>
                            <input type="text" name="amount" id="amount" class="form-control" placeholder="Enter Here...">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" name="description" id="description" class="form-control" placeholder="Enter Here...">
                        </div>
                        </div>
                        <div class="modal-footer bg-white">
                            <button type="submit" class="btn btn-success button">Update</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script text="text/javascript" src="{{asset('data/jquery-3.4.1.js')}}"></script>
    <script text="text/javascript" src="{{asset('data/Ajax-jquery.min.js')}}"></script>
    <script text="text/javascript" src="{{asset('data/sweetalert2.all.min.js')}}"></script>

    <script>
        $(document).ready(function() {
            // ---------  Add Section  -----------
            $('#addform').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/addDeposit",
                    data: $('#addform').serialize(),
                    success: function(response) {
                        // console.log(response);
                        $('#modal').modal('hide');
                        swal.fire(
                            'Successfull',
                            'Department Saved',
                            'success'
                        )
                        // alert("Data Saved");
                        location.reload();

                    },
                    error: function(error) {
                        console.log(error);
                        alert("Data NOt Saved");
                    }
                });
            });


                // -------  Update Section  -----------
                $('.edit').click(function() {
                id = $(this).attr('id');
                var url = "http://127.0.0.1:8000/editDeposit" + "/" + id;
                $.get(url, function(data) {
                    // console.log(data);
                    $('#account_name').val(data['account_name']);
                    $('#amount').val(data['deposit_amount']);
                    $('#description').val(data['description']);
                    $('#id').val(data['id']);
                });
                $('#editmodal').modal('show');
            });

            $('#editform').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "/updateDeposit",
                    data: $('#editform').serialize(),
                    success: function(response) {
                        // console.log(response);
                        $('#editmodal').modal('hide');
                        swal.fire(
                            'Successfull',
                            'Department Updated',
                            'success'
                        )
                        // alert("Data Saved");
                        location.reload();
                    },
                    error: function(error) {
                        console.log(error);
                        alert("Data NOt Saved");
                    }
                });
            });
            // -------- End Update  --------

            // -------- Delete Section  --------
            $('.delete').click(function(e) {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success ml-3',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        e.preventDefault();
                        var del_id = $(this).attr('data-id');

                        var token = $("meta[name='csrf-token']").attr("content");

                        $.ajax({
                            url: "/deleteDeposit/" + del_id,
                            data: {
                                "posi_id": del_id,
                                "_token": token
                            },
                            success: function(response) {
                                swalWithBootstrapButtons.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                location.reload();
                            }
                        });

                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your imaginary file is safe :)',
                            'error'
                        )
                    }
                });
            });
        });
    </script>
@endsection