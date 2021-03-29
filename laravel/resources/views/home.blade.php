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
<<<<<<< HEAD
                <section class="sect-left">
                    
=======
                <section id="sect-left">
                    <p>

                    </p>
                </section>
                <section id="sect-mid">

>>>>>>> 0891dd0cf01eb344c090abcb3d7d112aa69bdf70
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
<<<<<<< HEAD
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
=======
                    <tr>
                        <td>{{$wish->name}}</td>
                        <td>{{$wish->title}}</td>
                        <td>{{$wish->date}}</td>
                        <td>{{$wish->duration}}</td>
                        <td>{{$wish->state}}</td>
                        <td>
                        @if (\App\Http\Controllers\PermissionController::can('wishlist.remove'))
                            <a href="#" class="clickme danger">Delete</a>
                        @endif
                        </td>
                    </tr>
>>>>>>> 0891dd0cf01eb344c090abcb3d7d112aa69bdf70
                @endforeach
                </table>
                </section>
            </main>
        <footer>
            @include ('footer')
        </footer>
    </body>
</html>
