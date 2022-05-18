{{--@extends('app')

@push('css')

@endpush

@section('content')

@endsection


@push('js')

@endpush--}}

<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css" integrity="sha512-1k7mWiTNoyx2XtmI96o+hdjP8nn0f3Z2N4oF/9ZZRgijyV4omsKOXEnqL1gKQNPy2MTSP9rIEWGcH/CInulptA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
</head>

<body>
    <table class="table table-bordered" id="car-table">
        <thead class="thead-dark">
            <tr>
                <th>Model</th>
                <th>Color</th>
                <th>Code</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $item)
            <tr>
                <td>{{ $item->model }}</td>
                <td>{{ $item->color }}</td>
                <td>{{ $item->code }}</td>
                <td>
                    <a class="btn btn-sm btn-warning" href="{{ route('cars.edit', ['car' => $item ]) }}">
                        Edit
                    </a>
                    <!-- <a class="btn btn-sm btn-danger" href="{{ route('cars.delete', ['car' => $item ]) }}"> -->
                    <a class="btn btn-sm btn-danger btn-delete" data-car="{{ $item }}">
                        Delete
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#car-table').DataTable();

            $('.btn-delete').click(function() {
                var item = $(this).data('car');
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
                    if (result.isConfirmed) {
                        //console.log(item.id);

                        $.ajax({
                            url: "/cars/delete",
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
                                    }, 3000);
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.log(textStatus, errorThrown);
                            }
                        });
                    }
                })
                //alert('delete');
            });


            // Swal.fire({
            //     title: 'Are you sure?',
            //     text: "You won't be able to edit this!",
            //     icon: 'warning',
            //     showCancelButton: true,
            //     confirmButtonColor: '#3085d6',
            //     cancelButtonColor: '#d33',
            //     confirmButtonText: 'Yes, delete it!'
            // }).then((result) => {
            //     if (result.isConfirmed) {
            //         Swal.fire(
            //             'Deleted!',
            //             'Your file has been deleted.',
            //             'success'
            //         )
            //     }
            // })
        });
    </script>
    @if(Session::has('message'))
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
</body>

</html>