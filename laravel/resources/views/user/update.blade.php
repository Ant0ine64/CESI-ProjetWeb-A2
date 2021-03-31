<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>UserUpdate</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
</head>
<body style="font-family: 'Nunito'">
<header>
    @include ('header')
</header>
<main>
    <form action="{{route('user.update')}}" method="post" class="form">
        <label for="firstname">First Name :</label><br>
        <input value= "{{$user->firstname}}" type="text" name="firstname" id="firstname"><br>
        <label for="lastname">Last Name :</label><br>
        <input value= "{{$user->lastname}}" type="text" name="lastname" id="lastname"><br>
        <label for="login">Login :</label><br>
        <input value= "{{$user->login}}" type="text" name="login" id="login" readonly><br>
        <label for="type">Type name :</label><br>
        <input value= "{{$user->type}}" type="text" name="type" id="type"><br>
        <label for="city">City name :</label><br>
        <input value= "{{$user->city}}" type="text" name="city" id="city"><br>
        <input type="submit" value="Update">
    </form>
</main>
<footer>
    @include('footer')
</footer>
</body>
</html>
