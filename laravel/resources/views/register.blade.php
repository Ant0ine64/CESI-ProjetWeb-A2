<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <form action="{{route('submit')}}" method="post">
        @csrf
        <input type="text" name="Prénom" id="firstname"><br>
        <input type="text" name="Nom" id="lastname"><br>
        <input type="text" name="identifiant" id="login"><br>
        <input type="text" name="Type" id="type"><br>
        <input type="text" name="Center" id="city"><br>
        <input type="password" name="Password" id="password"><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
