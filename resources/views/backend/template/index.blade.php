@extends('layouts.backend')

@section('content')

<div class="card">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h6>Templates</h6>
            </div>
            <div class="col-lg-6 col-5 my-auto text-end">
                <a href="{{ route('templates.create') }}" class="btn btn-sm btn-info">Add</a>
            </div>
        </div>
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
                            <a class="btn btn-sm btn-warning" href="{{ route('templates.edit', ['template' => $item]) }}">
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
        </div>
    </div>
</div>
@endsection

@push('custom-scripts')
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
@endpush