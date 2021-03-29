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
        <div id="form_div" style="text-align: center">
                <form action="{{route('comp.filter')}}" method="POST">
                @csrf
                    <input type="text" placeholder="Your search..." id="searchbar" name="searchbar"><br><br>
                    <input type="submit" value="Filter" name="result">
                </form>
        </div><br>
        <a href="/company/register" class="clickme wish">Add a company</a>
        <div id="table_div"><br>
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
                    <td>
                        @include ('notation')
                    </td>
                </tr>
                @endforeach
                </table>
                <span id="paginate-comp">
                {{$comps->links()}}
                </span>
        </div>
    </main>
    <footer>
            @include('footer')
    </footer>
</body>
</html>
