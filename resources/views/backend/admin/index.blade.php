@extends('layouts.backend')

@section('content')
<div class="card">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h6>Admins</h6>
            </div>
            <div class="col-lg-6 col-5 my-auto text-end">
                <a href="{{ route('admins.create') }}" class="btn btn-sm btn-info">Add</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-items-center mb-0" id="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ "*****" . substr(decrypt($item->password), 5) }}</td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="{{ route('admins.edit', ['admin' => $item ]) }}">
                                Edit
                            </a>

                            <a class="btn btn-sm btn-danger btn-delete" data-admin="{{ $item }}">
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('custom-scripts')
<script>
    $(document).ready(function() {
        $('#admin-table').DataTable();

        $('.btn-delete').click(function() {
            var item = $(this).data('admin');

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

                    $.ajax({
                        url: "/backend/admins/deleteByAjax",
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
                                }, 2000);
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });
                }
            })
        });
    });
</script>
@endpush