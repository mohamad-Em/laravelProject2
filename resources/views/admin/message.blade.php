<!DOCTYPE html>
<html>
    <head>
        <title>loginAdmin</title>
    </head>
    <body>
        <form action="{{ route('saveMessage') }}" method="POST">
            @csrf

            <label for="fname">messageText:</label>
            <textarea name="messageText" rows="2" cols="20"></textarea><br><br>
            <input type="text" hidden name="employeeID" value="{{ $employeeID[0]->employeeID }}">
            <input type="submit" name="save" value="send">
        </form>
    </body>
</html>
