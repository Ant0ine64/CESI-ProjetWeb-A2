<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Délégué</title>
</head>
<body>
    <form action="{{route('delegate.read')}}" method="get">
        @csrf
        <input type="text" name="login" id="login"><br>
        <input type="submit" value="Search delegate"><br>
    </form>
    @isset($username)
        <p>Permissions de {{$username}} :</p><br>
    @isset($user_permissions)
        @php($permissions = \App\Http\Controllers\PermissionController::readAllDelegablePermissions())
        <form action="{{route('delegate.update')}}" method="post">
            @csrf
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
            <input type="submit" value="Enregistrer">
        </form>
    @endisset
    @endisset
</body>
</html>
