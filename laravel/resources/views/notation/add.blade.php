<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <title>NotationAdd</title>
</head>
<body>
<header>
    @include ('header')
</header>
<main>
    <form action="{{route('notation.add')}}" method="post"  class="form">
        CompanyId : <input value = "{{$companyId}}" type="text" name="idCompany" id="idCompany" readonly><br>
        Your grade (0-5) : <input value = "5" type="text" name="grade" id="grade"><br>
        <input type="submit" value="NotationAdd">
    </form>
</main>
<footer>
    @include('footer')
</footer>
</body>
</html>
