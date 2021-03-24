<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Délégué</title>
</head>
<body>
    <form action="{{route('delegate.read')}}" method="post">
        @csrf
        <input type="text" name="login" id="login"><br>
        <input type="submit" value="Search delegate"><br>
        @isset($permissions)
        @json($permissions)
        @endisset
    </form>
</body>
</html>
