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
                <form action="{{route('search.filter')}}" method="GET">
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
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->firstname}}</td>
                    <td>{{$user->lastname}}</td>
                    <td><a href="profile?id={{$user->id}}">{{$user->login}}</a></td>
                    <td>{{$user->type}}</td>
                    <td>{{$user->city}}</td>
                    <td>
                    @switch($user->id_type)
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
                <span id="paginate-user">
                {{$users->appends($radio)->links()}}
                </span>
            @elseif (request()->input('filter')=='companies')
                <table class="center">
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Activity sector</th>
                    <th>Actions</th>
                </tr>
                @foreach ($comps as $comp)
                <tr>
                    <td><a href="#">{{$comp->name}}</a></td>
                    <td>{{$comp->address}}</td>
                    <td>{{$comp->activity_sector}}</td>
                    <td>
                    @if (\App\Http\Controllers\PermissionController::can('company.update'))
                    <a href="company/update?id={{$comp->id}}" class="clickme danger">Edit</a>
                    @endif
                    </td>    
                </tr>
                @endforeach
                </table>  
                <span id="paginate-comp">
                {{$comps->links()}}
                </span>
            @elseif (request()->input('filter')=='offers')
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
            @endif
        </div>  
    </main>
    <footer>
            @include('footer')
    </footer>
</body>
</html>