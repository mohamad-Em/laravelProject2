<!DOCTYPE html>
<html>
    <head>
        <title>loginEmployee</title>
    </head>
    <body>
        <h3>login employee</h3>
        <form action="{{ route('loginEmployee') }}" method="POST">
            @csrf
            <label for="fname">E-Mail:</label>
            <input type="email" name="employeeEmail"><br><br>
            <label for="lname">Password:</label>
            <input type="password" name="employeePassword"><br><br>
            <input type="submit" name="save" value="login">
        </form>
        <a href="{{ route('sign-up') }}">إنشاء الحساب</a>
    </body>
</html>
