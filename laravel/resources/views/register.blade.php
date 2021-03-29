<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="/css/Register.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Nunito'">
    <header id="header">
        @include ('header')
    </header>
    <main>
        <form action="{{route('user.create')}}" method="post" >
            @csrf
            <label for="firstname">Firstname : </label><br/>
            <input type="text" name="firstname" id="firstname"><br>
            <label for="lastname">Lastname : </label><br/>
            <input type="text" name="lastname" id="lastname"><br>
            <label for="login">Login : </label><br/>
            <input type="text" name="login" id="login"><br>
            <label for="type">Type : </label><br/>
            <input type="text" name="type" id="type"><br>
            <label for="city">City : </label><br/>
            <input type="text" name="city" id="city"><br>
            <label for="password">Password : </label><br/>
            <input type="password" name="password" id="password"><br><br/>
            <input type="submit" value="Register">
        </form>
    </main>
    <footer>
        @include('footer')
    </footer>
</body>
</html>
