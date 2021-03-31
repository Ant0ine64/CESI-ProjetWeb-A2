<!DOCTYPE html>
<html lang="fr">
<head>
    <link href="/css/search.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Delegue</title>
</head>
<body>
<header id="header">
    @include ('header')
</header>
    <form action="{{route('delegate.read')}}" method="get">
        <input type="text" name="login" id="login"><br>
        <input type="submit" value="Search delegate"><br>
    </form>
    @isset($username)
        <p>Permission of : {{$username}} :</p><br>
    @isset($user_permissions)
        @php($permissions = \App\Http\Controllers\PermissionController::readAllDelegablePermissions())
        <form action="{{route('delegate.update')}}" method="post">
            <table>
                <thead>
                <tr>
                    <th colspan="3">Permissions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $permission => $title)
                <tr>
                    <td>{{$permission}}</td>
                    <td>{{$title}}</td>
                    @if(in_array($permission, $user_permissions))
                        <td><input type="checkbox" checked="enabled" name="{{$permission}}"></td>
                    @else
                        <td><input type="checkbox" name="{{$permission}}"></td>
                    @endif
                </tr>
                @endforeach
                </tbody>
            </table>
            <input type="hidden" name="login" value="{{$username}}">
            <input type="submit" value="Save">
        </form>
    @endisset
    @endisset
<footer>
    @include('footer')
</footer>
</body>
</html>
