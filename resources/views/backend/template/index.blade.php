@extends('layouts.backend')

@section('content')
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css" integrity="sha512-1k7mWiTNoyx2XtmI96o+hdjP8nn0f3Z2N4oF/9ZZRgijyV4omsKOXEnqL1gKQNPy2MTSP9rIEWGcH/CInulptA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
</head>
<div class="card">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h3>Template</h3>
            </div>
            {{-- <div class="col-lg-6 col-5 my-auto text-end">
                <a href="{{ route('users.create') }}" class="btn btn-sm btn-info">Add</a> --}}
                <!-- <div class="dropdown float-lg-end pe-4">
                    <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-ellipsis-v text-secondary"></i>
                    </a>
                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                    </ul>
                </div> -->
            {{-- </div> --}}
        </div>
            <div class="cmy-auto text-end">
                <a href="{{ route('templates.create') }}" class="btn btn-sm btn-info">Add</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-items-center mb-0" id="user-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Actions</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($templates as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->body }}</td>
                            <td>
                                <a class="btn btn-xs btn-warning" href="{{ route('templates.edit', ['template' => $item]) }}">
                                    Edit
                                </a>
                                {{-- <a class="btn btn-sm btn-danger" href="{{ route('templates'.delete', ['template' => $item]) }}"> --}}
                                <a class="btn btn-sm btn-danger btn-delete" data-template="{{ $item }}">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
                    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
                    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            
                <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"
                    integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg=="
                    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            
                <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
            
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                {{-- <script>
                    $('.btn-delete').on('click',function(){
                        if(comfirm("คุณต้องการที่จะลบข้อมูลนี้หรือไม่ ?")){
                            var url = "{{URL::to('template/delete')}}"+'/'+$(this).attr('id-delete');
                            window.locationhref = url;
                        }
                        })

                </script> --}}
            <script>
                    $(document).ready(function() {
                        $('#template-table').DataTable();
                        $('.btn-delete').click(function() {
                            var item = $(this).data('template');
                            //console.log(item);
                            Swal.fire({
                                title: 'Are you sure?',
                                text: "You want to delete this?",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, delete it!'
                            }).then((result) => {
                                if (result.isConfirmed) {}
                                //console.log(item.id);
            
                                $.ajax({
                                    url: "/backend/templates/deleteByAjax",
                                    type: "post",
                                    data: {
                                        '_token': '{{ Session::token() }}',
                                        'id': item.id
                                    },
                                    success: function(response) {
                                        //console.log(response);
                                        if (response != true) {
                                            toastr.error('fail');
                                        } else {
                                            toastr.success('success');
                                            setInterval(function() {
                                                location.reload();
                                            }, 1000);
                                        }
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                        console.log(textStatus, errorThrown);
                                    }
            
                                });
                            })
        
            
                        });
                    });
                </script>
                @if (Session::has('message'))
                    <script>
                        var type = "{{ Session::get('alert-type', 'info') }}";
                        switch (type) {
                            case 'info':
                                toastr.info("{{ Session::get('message') }}");
                                break;
                            case 'warning':
                                toastr.warning("{{ Session::get('message') }}");
                                break;
                            case 'success':
                                toastr.success("{{ Session::get('message') }}");
                                break;
                            case 'error':
                                toastr.error("{{ Session::get('message') }}");
                                break;
                        }
                    </script>
                @endif
                </table>
            </div>
</div>
@endsection