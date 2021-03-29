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
                    @if ($radio == 'users')
                    <input type="radio" id="users" name="filter" value="users" checked>
                    <label for="users">Users</label>
                    <input type="radio" id="company" name="filter" value="companies">
                    <label for="company">Companies </label>
                    <input type="radio" id="offers" name="filter" value="offers">
                    <label for="offers">Offers</label>
                    @elseif ($radio == 'companies')
                    <input type="radio" id="users" name="filter" value="users">
                    <label for="users">Users</label>
                    <input type="radio" id="company" name="filter" value="companies" checked>
                    <label for="company">Companies </label>
                    <input type="radio" id="offers" name="filter" value="offers">
                    <label for="offers">Offers</label>
                    @elseif ($radio == 'offers')
                    <input type="radio" id="users" name="filter" value="users">
                    <label for="users">Users</label>
                    <input type="radio" id="company" name="filter" value="companies">
                    <label for="company">Companies </label>
                    <input type="radio" id="offers" name="filter" value="offers" checked>
                    <label for="offers">Offers</label>
                    @else
                    <input type="radio" id="users" name="filter" value="users" checked>
                    <label for="users">Users</label>
                    <input type="radio" id="company" name="filter" value="companies">
                    <label for="company">Companies </label>
                    <input type="radio" id="offers" name="filter" value="offers">
                    <label for="offers">Offers</label>
                    @endif
                    <input type="submit" value="Filter" name="result">
                </form>
        </div>
        <div id="table_div"><br>
            @if(request()->input('filter')=='users')
                <table class="center">
                <tr>
                    <th>Name</th>
                    <th>Sirname</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Center</th>
                    <th>Actions</th>
                </tr>
                @foreach ($users as $users)
                <tr>
                    <td>{{$users->firstname}}</td>
                    <td>{{$users->lastname}}</td>
                    <td><a href="profile?id={{$users->id}}">{{$users->login}}</a></td>
                    <td>{{$users->type}}</td>
                    <td>{{$users->city}}</td>
                    <td>
                    @switch($users->id_type)
                    @case ('1')
                        @php ($prefix = "dummy")
                        @break
                    @case ('2')
                        @php ($prefix = "pilote")
                        @break
                    @case ('3')
                        @php ($prefix = "student")
                        @break
                    @case ('4')
                        @php ($prefix = "delegue")
                        @break
                    @endswitch
                    @if (\App\Http\Controllers\PermissionController::can($prefix.".update"))
                    <a href="#" class="clickme danger">Edit</a>
                    @endif
                    @if (\App\Http\Controllers\PermissionController::can($prefix.".delete"))
                    &emsp;<a href="#" class="clickme critical">Delete</a>
                    @endif
                    </td>
                </tr>
                @endforeach
                </table>
            @elseif (request()->input('filter')=='companies')
                <table class="center">
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Activity sector</th>
                    <th>Actions</th>
                </tr>
                @foreach ($comps as $comps)
                <tr>
                    <td><a href="#">{{$comps->name}}</a></td>
                    <td>{{$comps->address}}</td>
                    <td>{{$comps->activity_sector}}</td>
                    <td>
                    @if (\App\Http\Controllers\PermissionController::can('company.update'))
                    <a href="company/update?id={{$comps->id}}" class="clickme danger">Edit</a>
                    @endif
                    </td>
                </tr>
                @endforeach
                </table>
            @elseif (request()->input('filter')=='offers')
                <a href="offer/register" class="clickme wish center">Add an offer</a><br>
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
                @foreach ($offers as $offers)
                <tr>
                    <td><a href="#">{{$offers->title}}</a></td>
                    <td>{{$offers->name}}</td>
                    <td>{{$offers->competences}}</td>
                    <td>{{$offers->date}}</td>
                    <td>{{$offers->duration}}</td>
                    <td>{{$offers->slots}}</td>
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
            @endif
        </div>
    </main>
    <footer>
            @include('footer')
    </footer>
</body>
</html>
