<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>NotationAdd</title>
</head>
<body>
    <form action="{{route('notation.add')}}" method="post">
        <input type="text" name="idCompany" id="idCompany"><br>
        <input type="text" name="grade" id="grade"><br>
        <input type="submit" value="NotationAdd">
    </form>
</body>
</html>
