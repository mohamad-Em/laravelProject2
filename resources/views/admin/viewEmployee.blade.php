<!DOCTYPE html>
<html>
    <head>
        <title>viewSection</title>
    </head>
    <body>

        <h1>{{ $view[0]->employeeName }}Employee:</h1>
        <h2>{{ $view[0]->employeeName }}</h2>
        <h2>{{ $view[0]->employeeEmail }}</h2>
        <h2>{{ $view[0]->employeePhone }}</h2>
        <h2>{{ $view[0]->employeeAddress }}</h2>
        @if($view[0]->employeeStats == 1)
            <h2>unActive</h2>
        @elseif ($view[0]->employeeStats == 2)
            <h2>Active</h2>
        @endif

    </body>
</html>
