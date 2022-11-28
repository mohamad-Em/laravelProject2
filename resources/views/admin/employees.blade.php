<!DOCTYPE html>
<html>
    <head>
        <title>viewSection</title>
    </head>
    <body>

        <h1>All Employees:</h1>
        <table class="w3-table">
            <tr>
                <th>Number</th>
                <th>employeeName</th>
                <th>employeeEmail</th>
                <th>employeePhone</th>
                <th>employeeAddress</th>
                <th>sectionName</th>
                <th>employeeExperience</th>
                <th colspan="2">control</th>
            </tr>
            <?php
            $number = 0;
            ?>
    @foreach ($employees as $employee)
        <?php
        $number++;
        ?>
            <tr>
                <td>{{ $number }}</td>
                <td>{{ $employee->employeeName }}</td>
                <td>{{ $employee->employeeEmail }}</td>
                <td>{{ $employee->employeePhone }}</td>
                <td>{{ $employee->employeeAddress }}</td>
                <td>{{ $employee->sectionName }}</td>
                <td><a href="{{ url('viewExperience/'.$employee->employeeID) }}">viewExperience</a></td>
                <td><a href="{{ url('viewEmployee/'.$employee->employeeID) }}">view</a>||</td>
                <td><a href="{{ url('DeleEmployee/'.$employee->employeeID) }}">delete</a></td>

            </tr>
    @endforeach

            </table>
    </body>
</html>
