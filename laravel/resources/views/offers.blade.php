<!DOCTYPE html>
<html lang="fr">
<head>
        <link href="/css/search.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Search</title>
</head>
<body>
    <header id="header">
        @include ('header')
    </header>
    <main id="main">
        <div id="form_div">
                <form action="{{route('offer.filter')}}" method="GET">
                @csrf
                    <input type="text" placeholder="Your search..." id="searchbar" name="searchbar"><br><br>
                    <input type="submit" value="Filter" name="result">
                </form>
        </div>
        <div id="table_div"><br>
                <table class="center">
                <tr>
                    <th>Title</th>
                    <th>Company</th>
                    <th>Comptences</th>
                    <th>Start date</th>
                    <th>Duration</th>
                    <th>Number of slots</th>
                    <th>Actions</th>
                </tr>
                @foreach ($offers as $offer)
                <tr>
                    <td><a href="#">{{$offer->title}}</a></td>
                    <td>{{$offer->name}}</td>
                    <td>{{$offer->competences}}</td>
                    <td>{{$offer->date}}</td>
                    <td>{{$offer->duration}}</td>
                    <td>{{$offer->slots}}</td>
                    <td>
                    @if (\App\Http\Controllers\PermissionController::can('offer.update'))
                    <a href="#" class="clickme danger">Edit</a>
                    @endif
                    @if (\App\Http\Controllers\PermissionController::can('offer.delete'))
                    &emsp;<a href="#" class="clickme critical">Delete</a>
                    @endif
                    @if (\App\Http\Controllers\PermissionController::can('wishlist.add'))
                    &emsp;<a href="#" class="clickme wish">Add to wishlist</a>
                    @endif
                    </td>
                </tr>
                @endforeach
                </table>   
                <span id="paginate-offer">
                {{$offers->links()}}
                </span>
        </div>
    </main>
    <footer>
            @include('footer')
    </footer>
</body>
</html>
