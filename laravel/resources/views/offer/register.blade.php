<!DOCTYPE html>
<html lang="fr">
<head>
    <link href="/css/register.css" rel="stylesheet">
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <title>RegisterOffer</title>
</head>
<body style="font-family: Nunito;">
    <header>
        @include ('header')
    </header>
    <form action="{{route('offer.create')}}" method="post" class="form">
        @csrf
        <label for="idCompany">Company ID : </label><br>
        <input value = "23" type="text" name="idCompany" id="idCompany"><br>
        <label for="title">Company title : </label><br>
        <input value = "defaultValue" type="text" name="title" id="title"><br>
        <label for="competences">Compétences :</label><br>
        <input value = "defaultValue"type="text" name="competences" id="competences"><br>
        <label for="date">Date 1 [A redéfinir] : </label><br>
        <input type="date" name="date" id="date" value="2021-03-22" min="2021-03-22"><br> <!--todo: faire en sorte de display a partir de la date actuelle -->
        <label for="endDate">End date : </label><br>
        <input type="date" name="endDate" id="endDate" value="2021-03-23" min="2021-03-22"><br> <!--todo: min doit etre la date de selectionnée dans date (juste au dessus) -->
        <label for="remuneration">Salary : </label><br>
        <input value = "535.6" type="text" name="remuneration" id="remuneration"><br>
        <label for="slots">Slots : </label><br>
        <input value = "12" type="text" name="slots" id="slots"><br><br>
        <input type="submit" value="RegisterOffer" style="padding: 1%; border-radius:10%; margin-left: 10px">
    </form>
    <footer>
        @include('footer')
    </footer>
</body>
</html>
