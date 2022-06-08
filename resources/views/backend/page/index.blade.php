@extends('layouts.backend')

@section('content')

<div class="card">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h6>Page</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
<div class="form-group">
    <label for="">Host</label>
    <select class="form-control input-sm" name="host" > 
         @foreach($hosts as $data)
           <option value="{{$data->id}}">{{$data->url}}</option>
         @endforeach
    </select>
</div>
</div>
<div class="card-body">
<div class="form-group">
    <label for="">User</label>
    <select class="form-control input-sm" name="name" > 
         @foreach($admins as $data)
           <option value="{{$data->id}}">{{$data->name}}    </option>
         @endforeach
    </select>
</div>
</div>
<div class="card-body">
<div class="form-group">
    <label for="">Email Template</label>
    <select class="form-control input-sm" name="body" > 
         @foreach($templates as $data)
           <option value="{{$data->id}}">{{$data->body}}   </option>
         @endforeach
    </select>
</div>
</div>
@endsection
