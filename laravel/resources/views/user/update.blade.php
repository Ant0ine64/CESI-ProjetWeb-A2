<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>UserUpdate</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="/css/update.css" rel="stylesheet">
</head>
<body style="font-family: 'Nunito'">
<header>
    @include ('header')
</header>
    <form action="{{route('user.update')}}" method="post" class="form">
        First Name :
        <input value= "{{$user->firstname}}" type="text" name="firstname" id="firstname"><br>
        Last Name :
        <input value= "{{$user->lastname}}" type="text" name="lastname" id="lastname"><br>
        Login :
        <input value= "{{$user->login}}" type="text" name="login" id="login" readonly><br>
        Type name :
        <input value= "{{$user->type}}" type="text" name="type" id="type"><br>
        City name :
        <input value= "{{$user->city}}" type="text" name="city" id="city"><br>
        <input type="submit" value="Update">
    </form>
<footer>
    @include('footer')
</footer>
</body>
</html>
