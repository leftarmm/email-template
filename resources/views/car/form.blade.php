{{--@extends('app')

@push('css')

@endpush

@section('content')

@endsection


@push('js')

@endpush --}}

<html>

<body>
    <form method="post" action="{{ route('cars.store') }}">
    @csrf
    
    @if(isset($car->id))
    <input type="hidden" name="id" value="{{ $car->id }}">
    @endif

    <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> -->
    <!-- <form action="{{ action('App\Http\Controllers\CarController@store') }}"> -->
        <label>Model:</label><br>
        <input type="text" name="model" value="{{ $car->model ?? '' }}"><br>
        <label>Color:</label><br>
        <input type="text" name="color" value="{{ $car->color ?? '' }}"><br>
        <label>Code:</label><br>
        <input type="text" name="code" value="{{ $car->code ?? '' }}"><br>

        <button type="submit">Submit</button>
    </form>
</body>

</html>