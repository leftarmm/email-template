<html>

<body>
    @for($i = 0; $i < count($dogs); $i++) 
    <p>{{ $dogs[$i]['name'] }} {{ $dogs[$i]['age'] }}</p>
    @endfor
</body>

</html>