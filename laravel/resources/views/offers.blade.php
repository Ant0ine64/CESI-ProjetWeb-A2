<!DOCTYPE html>
<html lang="fr">
<head>
        <link href="/css/search.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Offers</title>
</head>
<body>
    <header id="header">
        @include ('header')
    </header>
    <main id="main">
        <div class="form_div">
                <form action="{{route('offer.filter')}}" method="POST" class="form">
                    <input type="text" placeholder="Your search..." id="searchbar" name="searchbar"><br><br>
                    <input type="submit" value="Filter" name="result">
                </form>
        </div><br>
        @if(\App\Http\Controllers\PermissionController::can('offer.create'))
        <a href="/offer/register" class="clickme wish">Add an offer</a>
        @endif
        <div id="table_div"><br>
                <table class="center">
                <tr>
                    <th>Title</th>
                    <th>Company</th>
                    <th>Comptences</th>
                    <th>Start date</th>
                    <th>Duration</th>
                    <th>Contact email</th>
                    <th>Number of slots</th>
                    <th>Actions</th>
                </tr>
                @foreach ($offers as $offer)
                <tr>
                    <td>{{$offer->title}}</td>
                    <td>{{$offer->name}}</td>
                    <td>{{$offer->competences}}</td>
                    <td>{{$offer->date}}</td>
                    <td>{{$offer->duration}}</td>
                    <td>{{$offer->contact_email}}</td>
                    <td>{{$offer->slots}}</td>
                    <td>
                    @if (\App\Http\Controllers\PermissionController::can('offer.update'))
                    <a href="/offer/update/{{$offer->id}}" class="clickme danger" id="edit">Edit</a>
                    @endif
                    @if (\App\Http\Controllers\PermissionController::can('offer.delete'))
                    &emsp;<a href="/offer/delete/{{$offer->id}}" class="clickme critical" id="delete">Delete</a>
                    @endif
                    @if (\App\Http\Controllers\PermissionController::can('wishlist.add'))
                        @if(\App\Http\Controllers\WishListController::isInWishList($offer->id))
                            &emsp;<a href="/wishlist/remove/{{$offer->id}}" class="clickme danger" id="remove">Remove from wishlist</a>
                        @else
                            &emsp;<a href="/wishlist/add/{{$offer->id}}" class="clickme wish" id="addWish">Add to wishlist</a>
                        @endif
                    @endif
                    </td>
                </tr>
                @endforeach
                </table><br>
                <div class="container">
                    <a href="/offer/register" class="clickme wish child">Add an offer</a>
                </div>
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
