<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>UserPromotionAdd</title>
</head>
<body>
    <form action="{{route('userPromotion.add')}}" method="post">
        @csrf
        <input type="text" name="idUser" id="idUser"><br>
        <input type="text" name="idPromo" id="idPromo"><br>
        <input type="submit" value="UserPromotionAdd">
    </form>
</body>
</html>
