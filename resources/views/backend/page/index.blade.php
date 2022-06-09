@extends('layouts.backend')

@section('content')
    <div class="card">
        <div class="card-header pb-0">
            <div class="row">
                <div class="col-lg-6 col-7">
                    <h6>Send Emails</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Host</label>
                <select class="form-control border border-grey" name="host">
                    @foreach ($hosts as $data)
                        <option value="{{ $data->id }}">{{ $data->url }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">User</label>
                <select class="form-control border border-grey" name="name">
                    @foreach ($admins as $data)
                        <option value="{{ $data->id }}">{{ $data->name }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Email Template</label>
                <select class="form-control border border-grey" name="body">
                    @foreach ($templates as $data)
                        <option value="{{ $data->id }}">{{ $data->title }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <label for="">Logs</label>
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Reciever</th>
                            <th>Status</th>
                            <th>Detail</th>
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
    @endsection
    