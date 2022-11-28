<!DOCTYPE html>
<html>
    <head>
        <title>loginEmployee</title>
    </head>
    <body>
        <h3>signUp employee</h3>
        <form action="{{ route('saveEmp') }}" method="POST">
            @csrf
            <label for="fname">employeeName:</label>
            <input type="text" name="employeeName"><br><br>
            <label for="fname">employeeEmail:</label>
            <input type="email" name="employeeEmail"><br><br>
            <label for="fname">employeePassword:</label>
            <input type="password" name="employeePassword"><br><br>
            <label for="fname">employeePhone:</label>
            <input type="text" name="employeePhone"><br><br>
            <label for="lname">employeeAddress:</label>
            <input type="test" name="employeeAddress"><br><br>
            <input type="submit" name="save" value="signUp">
        </form>

    </body>
</html>
