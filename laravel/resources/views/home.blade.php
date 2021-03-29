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
                <section id="right">
                <table class="center">
                <tr>
                    <th>Title</th>
                    <th>Company</th>
                    <th>Start date</th>
                    <th>Duration</th>
                    <th>State</th>
                    <th>Actions</th>
                </tr>
                @foreach ($wishes as $wish)
                <tr>
                    <td><a href="#">{{$wish->title}}</a></td>
                    <td>{{$wish->name}}</td>
                    <td>{{$offer->date}}</td>
                    <td>{{$offer->duration}}</td>
                    <td>{{$offer->state}}</td>
                    <td>
                    @if (\App\Http\Controllers\PermissionController::can('offer.delete'))
                    <a href="#" class="clickme critical">Delete</a>
                    @endif
                    </td>
                </tr>
                @endforeach
                </table>   
                <span id="paginate-offer">
                {{$offers->links()}}
                </span>
                </section>
            </main>
        <footer>
            @include ('footer')
        </footer>
    </body>
</html>
