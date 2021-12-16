@extends('layouts.admin')

@section('content')
    <div class="col-md-12 bg-white p-4">
    <div class="mb-5">
        <h4>PayRoll Page</h4>
    </div>
        <form id="addform">
            @csrf
            <div class="row">
                    <div class="col-md-4">
                        <label for="">Employee Name</label>
                        <select name="empName" class="form-control" style="text-transform:capitalize;">
                            <option hidden selected>-- Select --</option>
                            @foreach($emp as $row)
                                <option value="{{$row->first_name}}" style="text-transform:capitalize;">{{$row->first_name}} {{$row->last_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Month</label>
                        <input type="month" name="monthly" class="form-control">
                    </div>
                    <div class="col-md-4" style="padding-top: 34px;">
                        <input type="submit" value="Pay..." class="col-md-9 btn btn-primary">
                    </div>
            </div>
        </form>


        <table id="order-listing" class="table mt-5">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Employee Name</th>
                    <th class="text-center">Account Number</th>
                    <th class="text-center">Salary</th>
                    <th class="text-center">Month</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=0; ?>
                @foreach($payroll as $roll)
                <?php $i++; ?>
                <tr>
                    <td class="text-center"><?php echo $i; ?></td>
                    <td class="text-center" style="text-transform:capitalize;">{{ $roll->employee_name }}</td>
                    <td class="text-center">{{ $roll->account_number }}</td>
                    <td class="text-center">{{ $roll->salary }}</td>
                    <td class="text-center">{{ $roll->month }}</td>
                    <td class="text-center">
                        <a href="#" class="edit" id="{{ $roll->id }}"><span class="icon-note text-primary" style="font-size: 17px;"></span></a>
                    </td>
                    <td class="text-center">
                        <a href="#" class="delete" data-id="{{ $roll->id }}"><span class="icon-close text-danger" style="font-size: 18px;"></span></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script text="text/javascript" src="{{asset('data/jquery-3.4.1.js')}}"></script>
    <script text="text/javascript" src="{{asset('data/Ajax-jquery.min.js')}}"></script>
    <script text="text/javascript" src="{{asset('data/sweetalert2.all.min.js')}}"></script>

    <script>
        $(document).ready(function(){
             // ---------  Add Section  -----------
             $('#addform').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/addPay",
                    data: $('#addform').serialize(),
                    success: function(response) {
                        // console.log(response);
                        // $('#modal').modal('hide');
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
        });
    </script>



@endsection