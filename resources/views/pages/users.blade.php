<!doctype html>
<html>

<head><title>Document</title></head>
<body>
<h1>Users</h1>
@foreach($user as $use)
<h2>{{$use->first_name}}</h2>

@endforeach

</body>


</html>