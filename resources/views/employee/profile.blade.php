<!DOCTYPE html>
<html>
    <head>
        <title>myProfile</title>
    </head>
    <body>
            <p>{{ Session::get('employeeID') }}</p>
            <p>{{ Session::get('employeeName') }}</p>
            <p>{{ Session::get('employeeEmail') }}</p>
            @if(Session::get('sectionID') == null)
            <p>Null</p>
            @else

            @endif
            <p>{{ Session::get('sectionID') }}</p>
            <a href="{{ url('editEmp/'.Session::get('employeeID')) }}">Edit</a>

    </body>
</html>
