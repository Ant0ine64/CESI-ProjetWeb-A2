<!DOCTYPE html>
<html lang="fr">
<head>
        <link href="/css/login.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Login</title>
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
    </body>
</html>
