<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>UserPromotionAdd</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="/css/promotionAddUser.css" rel="stylesheet">
</head>
<body style="font-family: 'Nunito'">
<header>
    @include ('header')
</header>
    <form action="{{route('userPromotion.add')}}" method="post" class="form">
        @csrf
        <label for="idUser">ID user : </label><br/>
        <input type="text" name="idUser" id="idUser"><br>
        <label for="idPromo">ID Promotion : </label><br/>
        <input type="text" name="idPromo" id="idPromo"><br>
        <input type="submit" value="UserPromotionAdd">
    </form>
<footer>
    @include('footer')
</footer>
</body>
</html>
