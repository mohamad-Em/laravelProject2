<!DOCTYPE html>
<html>
    <head>
        <title>loginEmployee</title>
    </head>
    <body>
        <h3>experience</h3>
        <form action="{{ route('saveExperience') }}" method="POST">
            @csrf
            <label for="fname">experience:</label>
            <input type="text" name="experience"><br><br>
            <label for="lname">experienceDate:</label>
            <input type="text" name="experienceDate"><br><br>
            <input type="submit" name="save" value="save">
        </form>
    </body>
</html>
