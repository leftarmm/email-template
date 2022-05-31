@extends('layouts.backend')

@section('content')
<div class="card">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h3>Template</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('templates.store') }}">
            @csrf

            @if(isset($template->id))
            <input type="hidden" name="id" value="{{ $template->id }}">
            @endif

            <div class="form-group row">
                <label for="title" class="col-md-2 col-form-label">Title</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="title" name="title" value="" placeholder = "Your Title" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="address1" class="col-md-2 col-form-label">Body</label>
                <div class="col-md-10">
                    <textarea name="body" id="body" cols="30" rows="10"></textarea>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block btn-success">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection