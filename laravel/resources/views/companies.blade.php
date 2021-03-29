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
        <div class="form_div">
                <form action="{{route('comp.filter')}}" method="POST" class="form">
                    <input type="text" placeholder="Your search..." id="searchbar" name="searchbar"><br><br>
                    <input type="submit" value="Filter" name="result">
                </form>
        </div>
        <div id="table_div">
                <table class="center">
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Activity sector</th>
                    <th>Actions</th>
                    <th>Notation</th>
                </tr>
                @foreach ($comps as $comp)
                <tr>
                    <td>{{$comp->name}}</td>
                    <td>{{$comp->address}}</td>
                    <td>{{$comp->activity_sector}}</td>
                    <td>
                    @if (\App\Http\Controllers\PermissionController::can('company.update'))
                    <a href="company/update?id={{$comp->id}}" class="clickme danger">Edit</a>
                    @endif
                    </td>
                    <td>
                        @include ('notation')
                    </td>
                </tr>
                @endforeach
                </table><br>
                <div class="container">
                    <a href="/company/register" class="clickme wish child1">Add a company</a>
                </div>
                <span id="paginate-comp" class="child2">
                    {{$comps->links()}}
                    </span>
        </div>
    </main>
    <footer>
            @include('footer')
    </footer>
</body>
</html>
