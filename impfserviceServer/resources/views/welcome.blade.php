<!DOCTYPE html>
<html>
<head>
    <title>Impfservice Test</title>
</head>
<body>
<ul>
    @foreach($vacevents as $vacevent)
        <li>{{$vacevent->id}}</li>
    @endforeach
</ul>
</body>
</html>
