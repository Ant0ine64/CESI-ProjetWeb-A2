<!DOCTYPE html>
<html lang="fr">
<head>
        <link href="/css/login.css" rel="stylesheet">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="theme-color" content="#000000">
        <title>Login</title>
        <link rel="manifest" href="manifest.json">
        <link rel="apple-touch-icon" href="img/cesinkdin">
    </head>
    <body>
            <div id="log_form_div">
                <img src="img/cesinkdin.png" alt="Logo" id="logo">
                <form id="login_form" action="{{route('user.login')}}" method="POST">
                    @csrf
                    <label for="login">Login:</label><br>
                    <input type="text" name="login" id="login"><br><br>
                    <label for="pwd">Password:</label><br>
                    <input type="password" name="password" id="pwd"><br><br>
                    <p>@isset($status)@endisset</p>
                    <button type="submit" value="Submit" form="login_form">Submit</button>
                    <a href="ask_account">No account yet ?</a>
                </form>
            </div>
            <script src="index.js"></script>
    </body>
</html>
