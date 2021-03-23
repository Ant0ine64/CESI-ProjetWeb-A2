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
                <form id="login_form" method="POST">
                    @csrf
                    <label for="email">Email:</label><br>
                    <input type="email" value="Email" id="email"><br><br>
                    <label for="pwd">Password:</label><br>
                    <input type="password" value="Password" id="pwd"><br><br>
                    <button type="submit" value="Submit" form="login_form">Submit</button>
                    <a href="ask_account">No account yet ?</a>
                </form>
            </div>
    </body>
</html>