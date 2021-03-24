<!DOCTYPE html>
<html lang="fr">
<head>
        <link href="/css/home.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Home</title>
</head>
    <body>
        <header>
            @include ('header')
        </header>
            <main>
                <section id="left">
                    <p>
                    t login pélo :
                    @if(\App\Http\Controllers\PermissionController::can('offer.delete'))
                        ok mon gars
                    @else
                        pas ok ici
                    @endif 
                    </p>
                </section>
                <section id="center">
                    <p>
                    t login pélo :
                    @if(\App\Http\Controllers\PermissionController::can('offer.delete'))
                        ok mon gars
                    @else
                        pas ok ici
                    @endif 
                    </p>
                </section>
                <section id="right">
                    <p>
                    t login pélo :
                    @if(\App\Http\Controllers\PermissionController::can('offer.delete'))
                        ok mon gars
                    @else
                        pas ok ici
                    @endif 
                    </p>
                </section>
            </main>
        <footer>
            @include ('footer')
        </footer>
    </body>
</html>
