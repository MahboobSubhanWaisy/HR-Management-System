@extends('layouts.admin')

@section('content')
<style>
    .divs {
        width: 25%;
        height: 265px;
        margin-top: 15px;
        margin-left: 30px;
        margin-right: 30px;
        float: left;
        border: 5px solid rgba(0, 0, 0, 0.2);
    }

    img {
        border-radius: 50%;
    }

    .img-div {
        height: 55%;
    }

    h5 {
        font-family: Tahoma;
        padding-top: 15px;
        font-weight: bold;
        text-transform: capitalize;
    }

    .names {
        text-align: center;
        height: 45%;
    }

    .posi {
        padding-top: 15px;
        padding-bottom: 5px;
    }

    .size {
        font-size: 17px;
    }

    .status {
        text-transform: uppercase;
    }
</style>

<div class="col-md-12 bg-white">
    @foreach($data as $row)


    <div class="divs p-0">
        <div class="col-md-12 p-0 bg-primary">
            <div class="posi img-div">
                <img src="{{ asset('Employee_Photo/' . $row->image)}}" alt="" class="mx-auto d-block" />
            </div>
        </div>
        <div class="names bg-light">
            <h5>{{ $row->first_name }} {{ $row->last_name }}</h5>

            @if(($row->status)=="active") <span class="badge badge-pill badge-success p-2 status">{{$row->status}}</span> @endif
            @if(($row->status)=="leave") <span class="badge badge-pill badge-danger p-2 status">{{$row->status}}</span> @endif
            @if(($row->status)=="busy") <span class="badge badge-pill badge-warning p-2 status">{{$row->status}}</span> @endif
            <div class="mt-3">
                <a href="/show/{{$row->id}}" class="mr-3" title="View Employee"><span class="badge badge-pill badge-primary p-2"><i class="icon-eye size"></i></span></a>
                <a href="{{ action('AllEmployeeController@edit', $row->id )}}" class="size" title="Update Employee"><span class="badge badge-pill badge-success p-2"><i class="icon-pencil size"></i></span></a>
                <a href="#" class="ml-3 size delete" id-data="{{ $row->id }}" title="Delete Employee"><span class="badge badge-pill badge-danger p-2"><i class="icon-close size"></i></span></a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<script text="text/javascript" src="{{asset('data/jquery-3.4.1.js')}}"></script>
<script text="text/javascript" src="{{asset('data/Ajax-jquery.min.js')}}"></script>
<script text="text/javascript" src="{{asset('data/sweetalert2.all.min.js')}}"></script>

<script>
    $(document).ready(function() {
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
                    var del_id = $(this).attr('id-data');

                    var token = $("meta[name='csrf-token']").attr("content");

                    $.ajax({
                        url: "/delete/" + del_id,
                        data: {
                            "id": del_id,
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