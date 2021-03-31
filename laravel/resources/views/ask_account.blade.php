<!DOCTYPE html>
<html lang="fr">
<head>
        <link href="/css/ask.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
        <title>Account demands</title>
    </head>
    <body style="font-family: 'Nunito'">
            <div id="ask_form_div">
                <img src="img/cesinkdin.png" alt="Logo" id="logo">
                <form id="ask_acc_form" method="POST">
                    <label for="email">Email:</label><br>
                    <input type="email" placeholder="Email" id="email"><br><br>
                    <label for="pwd">Password:</label><br>
                    <input type="password" placeholder="Password" id="pwd"><br><br>
                    <label for="demand">Demand:</label><br>
                    <textarea name="demand" id="demand" placeholder="Ask the administrator here..." cols="20" rows="10" form="ask_acc_form"></textarea><br><br>
                    <a href="login">Back</a>
                    <button type="submit" value="Submit" form="ask_acc_form">Submit</button>
                </form>
            </div>
    </body>
</html>
