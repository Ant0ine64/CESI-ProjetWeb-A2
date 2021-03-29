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
                <form action="{{route('search.filter')}}" method="POST">
                @csrf
                    <input type="text" placeholder="Your search..." id="searchbar" name="searchbar"><br><br>
                    <input type="radio" id="users" name="filter" value="users">
                    <label for="users">Users</label>
                    <input type="radio" id="company" name="filter" value="companies">
                    <label for="company">Companies </label>
                    <input type="radio" id="offers" name="filter" value="offers">
                    <label for="offers">Offers</label>
                    <input type="submit" value="Filter" name="result">
                </form>
        </div>
        <div id="table_div"><br>
            @if(request()->input('filter')=='users')
                <table class="center">
                <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Center</th>
                </tr>
                @foreach ($users as $users)
                <tr>
                    <td>{{$users->firstname}}</td>
                    <td>{{$users->lastname}}</td>
                    <td>{{$users->login}}</td>
                    <td>{{$users->type}}</td>
                    <td>{{$users->city}}</td>
                </tr>
                @endforeach
                </table>
            @elseif (request()->input('filter')=='companies')
                <table class="center">
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Activity sector</th>
                </tr>
                @foreach ($comps as $comps)
                <tr>
                    <td>{{$comps->name}}</td>
                    <td>{{$comps->address}}</td>
                    <td>{{$comps->activity_sector}}</td>
                </tr>
                @endforeach
                </table>
            @elseif (request()->input('filter')=='offers')
                <div id="table_create">
                    <form action="{{route('offer.getCreate')}}" method="get" style>
                        <input type="submit" value="Add">
                    </form>
                </div>
                <table class="center">
                <tr>
                    <th>Title</th>
                    <th>Company</th>
                    <th>Comptences</th>
                    <th>Start date</th>
                    <th>Duration</th>
                    <th>Number of slots</th>
                </tr>


                @foreach ($offers as $offers)
                <tr>
                    <td>{{$offers->title}}</td>
                    <td>{{$offers->name}}</td>
                    <td>{{$offers->competences}}</td>
                    <td>{{$offers->date}}</td>
                    <td>{{$offers->duration}}</td>
                    <td>{{$offers->slots}}</td>
                    <td>
                        <form action="{{route('offer.getUpdate')}}" method="get" style="text-align: center">
                            <input type="submit" value="Edit">
                        </form>
                    </td>
                    <td>
                        <form action="{{route('offer.delete')}}" method="post" style="text-align: center">
                            @csrf
                            <input type="hidden" name="idOffer" value="{{$offers->id}}">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
                @endforeach
                </table>
            @endif
        </div>
    </main>
    <footer>
            @include('footer')
    </footer>
</body>
</html>
