<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <form action="{{route('user.create')}}" method="post">
        @csrf
        <input type="text" name="firstname" id="firstname"><br>
        <input type="text" name="lastname" id="lastname"><br>
        <input type="text" name="login" id="login"><br>
        <input type="text" name="type" id="type"><br>
        <input type="text" name="city" id="city"><br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
