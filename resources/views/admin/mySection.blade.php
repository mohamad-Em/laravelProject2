<!DOCTYPE html>
<html>
    <head>
        <title>DashBoardAdmin</title>
    </head>
    <body>
        <table class="w3-table">
            <tr>
                <th>number</th>
                <th>sectionName</th>
                <th>sectionDescription</th>
                <th>control</th>
            </tr>
            <?php
            $number = 0;
            ?>
    @foreach ($sections as $section )
        <?php
        $number++;
        ?>
            <tr>
                <td>{{ $number }}</td>
                <td>{{ $section->sectionName }}</td>
                <td>{{ $section->sectionDescription }}</td>
                <td><a href="{{ url('view/'.$section->sectionID) }}">viewSection</a>||</td>
                <td><a href="{{ url('deleteSections/'.$section->sectionID) }}">delete</a></td>
            </tr>
    @endforeach

            </table>
    </body>
</html>
