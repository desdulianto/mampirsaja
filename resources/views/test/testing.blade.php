<html>
    <head>
        <title>Testing</title>
    </head>
    <body>
        <ul>
        @foreach ($data as $d)
            <li>{{$d->nama}}</li>
        @endforeach
        </ul>
    </body>
</html>
