<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>deleteOffer</title>
</head>
<body>
    <form action="{{route('submit')}}" method="post">
        @csrf
        <input value = "23" type="text" name="idOffer" id="idOffer"><br>
        <input type="submit" value="deleteOffer">
    </form>
</body>
</html>
