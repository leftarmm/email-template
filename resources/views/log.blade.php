@extends('layouts.backend')

@section('content')
<div class="card-body">
        <div class="table-responsive">
            <table class="table align-items-center mb-0" id="user-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>reciever</th>
                        <th>status</th>
                        <th>detail</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->reciever }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->detail }}</td>
                        </tr>
                    @endforeach
                </tbody>
                @endsection