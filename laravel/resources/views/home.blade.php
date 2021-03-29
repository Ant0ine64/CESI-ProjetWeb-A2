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
                <section id="middle">
                    <p>
                        
                    </p>
                </section>
                <section id="sect-right">
                    <table class="center">
                    <tr>
                        <th>Company name</th>
                        <th>Offer name</th>
                        <th>Start date</th>
                        <th>Duration</th>
                        <th>State</th>
                        <th>Actions</th>
                    </tr>
                @foreach ($wishes as $wish)
                    <tr>
                        <td>{{$wish->name}}</td>
                        <td>{{$wish->title}}</td>
                        <td>{{$wish->date}}</td>
                        <td>{{$wish->duration}}</td>
                        <td>{{$wish->state}}</td>
                        <td>
                        @if (\App\Http\Controllers\PermissionController::can('wishtlist.remove'))
                            <a href="#" class="clickme danger">Delete</a>
                        @endif
                        </td>
                    </tr>
                @endforeach
                </table>   
                </section>
            </main>
        <footer>
            @include ('footer')
        </footer>
    </body>
</html>
