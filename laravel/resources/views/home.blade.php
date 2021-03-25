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
                        Welcome <?php use Illuminate\Support\Facades\Auth;echo Auth::user()->firstname; ?>
                    </p>
                </section>

            </main>
        <footer>
            @include ('footer')
        </footer>
    </body>
</html>
