<!DOCTYPE html>
<html>
    <head>
        <title>loginAdmin</title>
    </head>
    <body>
        <form action="{{ route('updateEmp',$editEmp[0]->employeeID) }}" method="POST">
            @csrf
            <label for="fname">Name:</label>
            <input type="test" name="employeeName" value="{{ $editEmp[0]->employeeName }}"><br><br>
            <label for="fname">E-Mail:</label>
            <input type="email" name="employeeEmail" value="{{ $editEmp[0]->employeeEmail }}"><br><br>

            <label for="fname">employeePhone:</label>
            <input type="test" name="employeePhone" value="{{ $editEmp[0]->employeePhone }}"><br><br>
            <label for="fname">employeeAddress:</label>
            <input type="test" name="employeeAddress" value="{{ $editEmp[0]->employeeAddress }}"><br><br>
            <input type="submit" name="save" value="update">
        </form>
    </body>
</html>
