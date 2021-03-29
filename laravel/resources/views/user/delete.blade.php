<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>UserUpdate</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="/css/userUpdate.css" rel="stylesheet">
</head>
<body style="font-family: Nunito;">
<header id="header">
    @include ('header')
</header>
<form action="{{route('user.delete')}}" method="post" class="form">
    Are you sure you want to delete this user :
    <input value = "{{$userId}}" type="text" name="idUser" id="idUser" readonly><br>
    <input type="submit" value="deleteUser">
</form>
<footer>
    @include('footer')
</footer>
</body>
</html>
