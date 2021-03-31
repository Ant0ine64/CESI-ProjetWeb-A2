<!DOCTYPE html>
<html lang="fr">
<head>
        <link href="/css/main.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Offers</title>
</head>
<body>
    <header id="header">
        @include ('header')
    </header>
    <main id="main">
        <div class="form_div">
                <form action="{{route('user.filter')}}" method="POST" class="form">
                    <input type="text" placeholder="Your search..." id="searchbar" name="searchbar"><br><br>
                    <input type="submit" value="Filter" name="result">
                </form>
        </div><br>
        @if(\App\Http\Controllers\PermissionController::can('user.create'))
        <a href="/register" class="clickme wish">Add a user</a>
        @endif
        <div id="table_div"><br>
                <table class="center">
                <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Center</th>
                    <th>Actions</th>
                </tr>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->firstname}}</td>
                    <td>{{$user->lastname}}</td>
                    <td><a href="profile?id={{$user->id}}" style="color: blue">{{$user->login}}</a></td>
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
                    <a href="/user/update?id={{$user->id}}" class="clickme danger">Edit</a>
                    @endif
                    @if (\App\Http\Controllers\PermissionController::can($prefix.".delete"))
                    &emsp;<a href="/user/delete/{{$user->id}}" class="clickme critical">Delete</a>
                    @endif
                    @if (\App\Http\Controllers\PermissionController::can('delegue.addPermissions') && $prefix == 'delegue')
                    &emsp;<a href="/delegate?login={{$user->login}}" class="clickme danger">Edit permissions</a>
                    @endif
                    </td>
                </tr>
                @endforeach
                </table><br>
                <div class="container">
                    <a href="/register" class="clickme wish child">Add a user</a>
                </div>
                <span id="paginate-user">
                {{$users->links()}}
                </span>
        </div>
    </main>
    <footer>
            @include('footer')
    </footer>
</body>
</html>
