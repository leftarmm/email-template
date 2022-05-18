@extends('layouts.backend')

@section('content')
<div class="card">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h6>Create User</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('users.store') }}">
            @csrf

            @if(isset($user->id))
            <input type="hidden" name="id" value="{{ $user->id }}">
            @endif
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Name</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="name" name="name" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label">Email</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="email" name="email" value="email@example.com">
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-2 col-form-label">Password</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="password" name="password" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="address1" class="col-md-2 col-form-label">Address 1</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="address1" name="address[]" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="address2" class="col-md-2 col-form-label">Address 2</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="address2" name="address[]" value="">
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block btn-success">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection