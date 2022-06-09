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
                <label for="">List</label>
                <div class="col-lg-11 col-5 my-auto text-end">
                    <a class="btn btn-sm btn-info">Upload File</a>
                </div>
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Time</th>
                            <th>Room</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Test Email</th>
                            <th>Reciever</th>
                            <th>Reciever 2</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Log</label><br>
                <div class="col-lg-11 col-5 my-auto text-end">
                    <a style="background-color:yellow; color:black;" class="btn btn-sm btn-info">Send All</a>
                </div>
                <textarea id="w3review" name="w3review" rows="20" cols="185"></textarea>
            </div>
        </div>
    @endsection
