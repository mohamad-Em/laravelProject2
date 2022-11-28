<!DOCTYPE html>
<html>
    <head>
        <title>loginAdmin</title>
    </head>
    <body>
        <form action="{{ route('loginAdmin') }}" method="POST">
            @csrf
            <label for="fname">E-Mail:</label>
            <input type="email" name="adminEmail"><br><br>
            <label for="lname">Password:</label>
            <input type="password" name="adminPassword"><br><br>
            <input type="submit" name="save" value="login">
        </form>
    </body>
</html>
