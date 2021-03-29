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
                <section class="sect-left">
                    
                </section>
                <section class="sect-middle">

                </section>
                <section class="sect-right">
                <table class="center">
                <tr>
                    <th>Company</th>
                    <th>Internship title</th>
                    <th>Start</th>
                    <th>Duration</th>
                    <th>State</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                @foreach ($wishes as $wish)
                <tr>
                    <td>{{$wish->Name}}</td>
                    <td>{{$wish->title}}</td>
                    <td>{{$wish->date}}</td>
                    <td>{{$wish->duration}}</td>
                    <td>{{$wish->state}}</td>
                    <td>{{$wish->contact_email}}</td>
                    <td>
                    @if (\App\Http\Controllers\PermissionController::can('wishlist.remove'))
                    &emsp;<a href="" class="clickme critical">Delete</a>
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
