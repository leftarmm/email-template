@extends('layouts.backend')

@section('content')
<div class="card">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h6>Users</h6>
            </div>
            <div class="col-lg-6 col-5 my-auto text-end">
                <a href="{{ route('users.create') }}" class="btn btn-sm btn-info">Add</a>
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
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-items-center mb-0" id="user-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Updated</th>
                        <!-- <th>Actions</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            @foreach($item->addresses as $data)
                            <p>{{ $data->address }}</p>
                            @endforeach
                        </td>
                        <td>{{ $item->updated_at }}</td>
                        <!-- <td>Edit Delete</td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection