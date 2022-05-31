@extends('layouts.backend')

@section('content')
<div class="card">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h3>Admin</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('admins.store') }}">
            @csrf

            @if(isset($admin->id))
            <input type="hidden" name="id" value="{{ $admin->id }}">
            @endif
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Name</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="name" name="name" value="" placeholder="Your name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label">Email</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="email" name="email" value="" placeholder="Enter email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-2 col-form-label">Password</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="password" name="password" value="" placeholder="Enter Password">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-success">Submit</button>
            </div> 
            </form>
    </div>
</div>
@endsection