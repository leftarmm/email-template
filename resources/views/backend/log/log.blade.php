@extends('layouts.backend')

@section('content')
    <div class="card">
        <div class="card-header pb-0">
            <div class="row">
                <div class="col-lg-6 col-7">
                    <h6>Logs</h6>
                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-items-center mb-0" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>reciever</th>
                            <th>status</th>
                            <th>detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->reciever }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->detail }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
