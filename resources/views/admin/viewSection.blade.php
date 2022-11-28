<!DOCTYPE html>
<html>
    <head>
        <title>viewSection</title>
    </head>
    <body>
        <h1>SectionInformation:</h1>
        <h2>sectionName:{{ $section[0]->sectionName }}</h2>
        <h2>sectionDescription:{{ $section[0]->sectionDescription }}</h2>
        <h1>All Employees:</h1>
        <table class="w3-table">
            <tr>
                <th>Number</th>
                <th>employeeName</th>
                <th>employeeEmail</th>
                <th>employeePhone</th>
                <th>employeeAddress</th>
                <th>employeeExperience</th>
                <th>employeeStats</th>
                <th colspan="2">control</th>
            </tr>
            <?php
            $number = 0;
            ?>
    @foreach ($allEmployees as $allEmployee )
        <?php
        $number++;
        ?>
            <tr>
                <td>{{ $number }}</td>
                <td>{{ $allEmployee->employeeName }}</td>
                <td>{{ $allEmployee->employeeEmail }}</td>
                <td>{{ $allEmployee->employeePhone }}</td>
                <td>{{ $allEmployee->employeeAddress }}</td>
                <td><a href="{{ url('viewExperience/'.$allEmployee->employeeID) }}">viewExperience</a></td>
                @if($allEmployee->employeeStats == 1)
                    <td><a href="{{ url('acvtive/'.$allEmployee->employeeID) }}">Active</a></td>
                @elseif ($allEmployee->employeeStats == 2)
                <td><a href="{{ url('unActive/'.$allEmployee->employeeID) }}">unActive</a></td>

                @endif

                <td><a href="{{ url('message/'.$allEmployee->employeeID) }}">message</a>||</td>
                <td><a href="{{ url('deleteEmployee/'.$allEmployee->employeeID) }}">delete</a></td>

            </tr>
    @endforeach

            </table>
    </body>
