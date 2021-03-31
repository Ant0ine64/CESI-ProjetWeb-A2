<!DOCTYPE html>
<html lang="fr">
<head>
    <link href="/css/search.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Companies</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <meta charset="UTF-8">
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
        </div><br>
        @if(\App\Http\Controllers\PermissionController::can('company.create'))
        <a href="/company/register" class="clickme wish">Add a company</a>
        @endif
        <div id="table_div"><br>
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
                    <a href="companies/update/{{$comp->id}}" class="clickme danger">Edit</a>
                    @endif
                    </td>
                    <td>
                        @for ($i = 0; $i < 5; ++$i)
                            <i class="fa fa-star{{ \App\Http\Controllers\NotationController::getNotationsByCompanyId($comp->id) <= $i ? '-o' : '' }}" aria-hidden="true"></i>
                        @endfor
                            <a href="notation/add/{{$comp->id}}" class="clickme info">Evaluate Company</a>
                    </td>
                </tr>
                @endforeach
                </table><br>
                <div class="container">
                    <a href="/companies/register" class="clickme wish child1">Add a company</a>
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
