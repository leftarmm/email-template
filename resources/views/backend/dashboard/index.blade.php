@extends('layouts.backend')

@section('content')
<h1>hello world</h1>
{{ Auth::id() }}
{{ Auth::user()->name }}
{{ Auth::user()->email }}
@endsection
