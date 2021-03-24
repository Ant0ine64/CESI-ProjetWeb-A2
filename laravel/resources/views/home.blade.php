<!DOCTYPE html>
<html lang="fr">
<head>
        <link href="/css/login.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Home</title>
    </head>
    <body>
        <header>

        </header>
        <main>
           t login pélo :
            @if(\App\Http\Controllers\PermissionController::can('offer.delete'))
                ok mon gars
            @else
                pas ok ici
                @endif
        </main>
        <footer>

        </footer>
    </body>
</html>
