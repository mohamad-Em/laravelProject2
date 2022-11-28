<!DOCTYPE html>
<html>
    <head>
        <title>myProfile</title>
    </head>
    <body>
        <p>{{ Session::get('ID') }}</p>
        <p>{{ Session::get('Name') }}</p>
        <p>{{ Session::get('Email') }}</p>
        <p>{{ Session::get('Fullname') }}</p>
        <a href="{{ url('edit/'.Session::get('ID')) }}">Edit</a>
    </body>
</html>
