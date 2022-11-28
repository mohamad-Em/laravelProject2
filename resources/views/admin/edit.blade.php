<!DOCTYPE html>
<html>
    <head>
        <title>loginAdmin</title>
    </head>
    <body>
        <form action="{{ route('update',$edit[0]->adminID) }}" method="POST">
            @csrf
            <label for="fname">Name:</label>
            <input type="test" name="adminName" value="{{ $edit[0]->adminName }}"><br><br>
            <label for="fname">E-Mail:</label>
            <input type="email" name="adminEmail" value="{{ $edit[0]->adminEmail }}"><br><br>
            <label for="lname">Password:</label>
            <input type="password" name="adminPassword" value="{{ $edit[0]->adminPassword }}"><br><br>
            <label for="fname">Fullname:</label>
            <input type="test" name="adminFullname" value="{{ $edit[0]->adminFullname }}"><br><br>
            <input type="submit" name="save" value="update">
        </form>
    </body>
</html>
