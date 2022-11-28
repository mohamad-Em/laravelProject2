<!DOCTYPE html>
<html>
    <head>
        <title>viewSection</title>
    </head>
    <body>

            @foreach ($Experiences as $Experience )
                <h2>{{ $Experience->experience }}</h2>
                <h2>{{ $Experience->experienceDate }}</h2>
            @endforeach
        <a href="{{ route('sections') }}">Back</a>
    </body>
</html>
